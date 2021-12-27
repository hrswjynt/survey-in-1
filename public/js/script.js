let menuToggle = document.querySelector(".span input");
let nav = document.querySelector(".sidebar");
menuToggle.addEventListener("click", function () {
    nav.classList.toggle("slide");
});
