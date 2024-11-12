// Description : Javascript du chck_burger pour le menu

document.addEventListener("DOMContentLoaded", function () {
  // Burger icon functionality
  const burger = document.getElementById("chk_burger");
  const menu = document.querySelector("nav.menu-principal-container"); 

  if (burger && menu) {
    // Ensures both elements are found
    burger.addEventListener("click", function () {
      menu.classList.toggle("active");
      burger.classList.toggle("open");
    });
  }
});
