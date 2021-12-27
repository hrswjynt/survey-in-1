let getData = (path, id_kab = 13) => {
    let provinsi_url = "http://survey-in.test/api";
    let requestOptions = {
        method: "POST",
        redirect: "follow",
        body: {
            kabupaten_id: id_kab,
        },
    };
    return fetch(`${provinsi_url}${path}.json`, requestOptions)
        .then((response) => response.text())
        .then((result) => {
            return JSON.parse(result);
        })
        .catch((error) => console.log("error", error));
};
let main = () => {

    let kabupaten = document.querySelector("#kabupaten");

    console.log("succes");
};
export default main;
