document.addEventListener("DOMContentLoaded", function () {
  const dropdownButton = document.querySelector(".dropbtn");
  const dropdownContent = document.getElementById("myDropdown");
  const links = dropdownContent.querySelectorAll("a");
  const items = document.querySelectorAll(".project-item");

  // Ouvrir/fermer le menu déroulant
  dropdownButton.addEventListener("click", function () {
    dropdownContent.classList.toggle("show");
  });

  // Fermer le dropdown si on clique ailleurs
  window.addEventListener("click", function (event) {
    if (!event.target.matches(".dropbtn")) {
      dropdownContent.classList.remove("show");
    }
  });

  // Fonction filtrer
  links.forEach((link) => {
    link.addEventListener("click", function (event) {
      event.preventDefault(); // Empêche le défilement de la page
      const filter = event.target.getAttribute("href").substring(1); // Exclure le #

      items.forEach((item) => {
        // Si la catégorie "tous" est sélectionnée ou si l'élément correspond au filtre
        if (filter === "tous" || item.classList.contains(filter)) {
          item.style.display = "block";
        } else {
          item.style.display = "none";
        }
      });

      dropdownContent.classList.remove("show"); // Fermer le menu après clic
    });
  });
});
