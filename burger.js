document.addEventListener("DOMContentLoaded", () => {
  const openBtn = document.getElementById("openBtn");
  const closeBtn = document.getElementById("closeBtn");
  const menu = document.querySelector(".menu");

  openBtn.addEventListener("click", (event) => {
    event.preventDefault();
    menu.classList.add("active");
  });

  closeBtn.addEventListener("click", (event) => {
    event.preventDefault();
    menu.classList.remove("active");
  });
});
