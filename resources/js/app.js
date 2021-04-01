require('./bootstrap');

let aninav = document.querySelector(".aninav");
let aninavListItem = document.querySelectorAll(".aninav__listitem")

aninavListItem.forEach((link) => link.addEventListener("click", listActive));

function listActive() {
    aninavListItem.forEach((link) =>
        link.classList.remove("aninav__listitem-active"));

    this.classList.add("aninav__listitem-active");
}
