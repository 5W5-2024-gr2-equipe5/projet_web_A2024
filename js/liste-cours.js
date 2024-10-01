function toggleCollapse(id) {
  var element = document.getElementById(id);
  if (element.classList.contains("show")) {
    element.classList.remove("show");
  } else {
    element.classList.add("show");
  }
}

// baniere
document.querySelectorAll(".banner .slider .item").forEach((item) => {
  item.addEventListener("mouseenter", () => {
    item.querySelector(".popup-message").style.display = "block";
  });

  item.addEventListener("mouseleave", () => {
    item.querySelector(".popup-message").style.display = "none";
  });
});
