function removeActiveClass() {
  document.querySelectorAll(".activeLink").forEach(element => {
    element.classList.remove("activeLink");
  });
}
function setActiveLink(location) {
  document.querySelector(`#${location}`).classList.add("activeLink");
}
