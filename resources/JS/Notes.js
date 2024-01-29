const items = document.querySelectorAll(".item"); // all item class element array
items.forEach((item) => {
  const plusIcon = item.children[0].children[1].children[1]; // all plusIcons are selected
  plusIcon.addEventListener("click", () => {
    plusIcon.classList.toggle("active");
    item.children[1].children[0].classList.toggle("display");
  });
});
