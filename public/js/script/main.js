let getData = (path, id_kab = 13) => {
    let url = "http://survey-in.test/api";
    let fd = new FormData();
    fd.append("kabupaten_id", id_kab);
    let requestOptions = {
        method: "POST",
        Headers: {
            "Content-Type": "application/json",
        },
        body: fd,
    };
    return fetch(`${url}${path}`, requestOptions)
        .then((response) => response.text())
        .then((result) => {
            return JSON.parse(result);
        })
        .catch((error) => console.log("error", error));
};
let main = async () => {
    let listKecamatan = document.querySelector("#list-kecamatan");
    let setKecamatan = (data) => {
        listKecamatan.innerHTML = "";
        data.forEach((element) => {
            let list = document.createElement("li");
            list.innerHTML = `
            <button value="${element.id}" class="btn btn-primary m-1">${element.nama}</button>
        `;
            listKecamatan.appendChild(list);
        });
    };
    let data = await getData(`/kecamatan`);
    setKecamatan(data.data);
    $("#kabupaten").change(async function (e) {
        e.preventDefault();

        let id = $(this).val();
        try {
            let data = await getData(`/kecamatan`, id);
            setKecamatan(data.data);
        } catch (error) {}
    });
};
export default main;
