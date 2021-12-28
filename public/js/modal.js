const opens = document.getElementById("open");
const closee = document.getElementById("close");
const cancel = document.getElementById("cancel");
const modal_container = await document.getElementById("modal_container");
let menu_btn = document.querySelector("#menu-btn");
let sidebar = document.querySelector("#sidebar");
let container = document.querySelector(".my-container");
opens.addEventListener("click", () => {
    modal_container.classList.add("show");
});

closee.addEventListener("click", () => {
    modal_container.classList.remove("show");
});

cancel.addEventListener("click", () => {
    modal_container.classList.remove("show");
});

menu_btn.addEventListener("click", () => {
    sidebar.classList.toggle("active-nav");
    container.classList.toggle("active-cont");
});
