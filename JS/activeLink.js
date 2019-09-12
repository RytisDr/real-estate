function removeActiveClass() {
  document.querySelectorAll(".active").forEach(element => {
    element.classList.remove("active");
  });
}
