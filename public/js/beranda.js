$(document).ready(async function () {
    let getData = async (path, id) => {
        let url = "http://survey-in.test/api";
        let fd = new FormData();
        fd.append("id", id);
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
    let setKecamatan = async (idKab = 13) => {
        let data;
        try {
            data = await getData(`/kecamatan`, idKab);
        } catch (error) {}
        $("#list-kecamatan").html("");
        data.data.forEach((element) => {
            let list = document.createElement("li");
            list.innerHTML = `
            <button value="${element.id}" class="btn btn-pilih btn-primary m-1">${element.nama}</button>
            
        `;
            $("#list-kecamatan").append(list);
        });
    };
    $("#list-kecamatan").click(async function (e) {
        e.preventDefault();
        let dataS = await getData("/data-survey", e.target.value);
        if (dataS.length == 0) {
            $("#jmlGang").text("0");
            $("#jmlRumah").text("0");
            $("#pnjJalan").text("0");
            $("#lbrJalan").text("0");
            $("#jlnJelek").text("0");
            $("#jlnBaik").text("0");
        } else {
            $("#jmlGang").text(dataS.jumlah);
            $("#jmlRumah").text(dataS.jumlahRumah);
            $("#pnjJalan").text(dataS.panjangJalan);
            $("#lbrJalan").text(dataS.lebarJalan);
            $("#jlnJelek").text(dataS.jalanJelek);
            $("#jlnBaik").text(dataS.jalanBaik);
        }
    });
    $("#kabupaten").change(function (e) {
        e.preventDefault();
        setKecamatan($(this).val());
    });
    setKecamatan();
});
