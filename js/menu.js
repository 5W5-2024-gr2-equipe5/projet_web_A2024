document.addEventListener("DOMContentLoaded", function () {
  // Select the burger icon and menu container
  const burger = document.getElementById("burger");
  const menuContainer = document.querySelector(".menu-principal-container");

  // Toggle the active class for opening/closing the menu
  burger.addEventListener("click", function () {
    menuContainer.classList.toggle("active");
    burger.classList.toggle("open");
  });

  // Handle submenu toggle on hover
  document.querySelectorAll(".menu-item-has-children").forEach((menuItem) => {
    menuItem.addEventListener("mouseenter", () => {
      const subMenu = menuItem.querySelector(".sub-menu");
      if (subMenu) {
        subMenu.style.display = "flex";
      }
    });

    menuItem.addEventListener("mouseleave", () => {
      const subMenu = menuItem.querySelector(".sub-menu");
      if (subMenu) {
        subMenu.style.display = "none";
      }
    });
  });

  /******** Hover Effects on Buttons *******/
  document.querySelectorAll(".test").forEach((button) => {
    const div = document.createElement("div");
    const letters = button.textContent.trim().split("");

    letters.forEach((letter, index) => {
      const element = document.createElement("span");
      const part = index >= letters.length / 2 ? -1 : 1;
      const position =
        index >= letters.length / 2
          ? letters.length / 2 - index + (letters.length / 2 - 1)
          : index;
      const move = position / (letters.length / 2);
      const rotate = 1 - move;

      element.innerHTML = letter.trim() ? letter : "&nbsp;";
      element.style.setProperty("--move", move);
      element.style.setProperty("--rotate", rotate);
      element.style.setProperty("--part", part);

      div.appendChild(element);
    });

    button.innerHTML = div.outerHTML;

    button.addEventListener("mouseenter", () => {
      if (!button.classList.contains("out")) {
        button.classList.add("in");
      }
    });

    button.addEventListener("mouseleave", () => {
      if (button.classList.contains("in")) {
        button.classList.add("out");
        setTimeout(() => button.classList.remove("in", "out"), 950);
      }
    });
  });
});
