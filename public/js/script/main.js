let getData = (path, id_kab = 13) => {
    let url = "http://survey-in.test/api";
    let fd = new FormData();
    fd.append("id", id_kab);
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
            <button value="${element.id}" class="btn btn-pilih btn-primary m-1">${element.nama}</button>
            
        `;
            listKecamatan.appendChild(list);
        });
    };

    $("#list-kecamatan").click(async function (e) {
        e.preventDefault();
        let dataS = await getData("/data-survey", e.target.value);
        console.log(dataS);
        if (dataS.length == 0) {
            $("#jmlGang").text("Belum Di Survey");
            $("#jmlRumah").text("Belum Di Survey");
            $("#pnjJalan").text("Belum Di Survey");
            $("#lbrJalan").text("Belum Di Survey");
            $("#jlnJelek").text("Belum Di Survey");
            $("#jlnBaik").text("Belum Di Survey");
        } else {
            $("#jmlGang").text(dataS.jumlah);
            $("#jmlRumah").text(dataS.jumlahRumah);
            $("#pnjJalan").text(dataS.panjangJalan);
            $("#lbrJalan").text(dataS.lebarJalan);
            $("#jlnJelek").text(dataS.jalanJelek);
            $("#jlnBaik").text(dataS.jalanBaik);
        }
    });
    let data = await getData(`/kecamatan`);
    setKecamatan(data.data);
    $("#kabupaten").change(async function (e) {
        e.preventDefault();
        try {
            let data = await getData(`/kecamatan`, $(this).val());
            setKecamatan(data.data);
        } catch (error) {}
    });
};
export default main;
