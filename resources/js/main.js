document.addEventListener("DOMContentLoaded", function () {
    let kabupaten = document.querySelector("#kabupaten");
    kabupaten.addEventListener("change",async function () {
        try {
            let kecamatan=await getData(`/kecamatan/${kabupaten.value}`)
            console.log(kecamatan);
        } catch (message) {
            console.log(message);
        }
    });
    
});
