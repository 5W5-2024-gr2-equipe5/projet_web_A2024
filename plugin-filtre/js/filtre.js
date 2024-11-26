document.addEventListener("DOMContentLoaded", function () {
  const dropdownButton = document.querySelector(".dropbtn");
  const dropdownContent = document.getElementById("myDropdown");
  const links = dropdownContent.querySelectorAll("a");
  const items = document.querySelectorAll(".project-item"); // Les éléments à filtrer

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

  // Fonction filtrer pour appliquer les filtres sur les projets
  window.filtrer = function () {
    const filter = event.target.getAttribute("href").substring(1); // Exclure le "#"

    items.forEach((item) => {
      if (filter === "tous") {
        item.style.display = "block";
      } else {
        if (item.classList.contains(filter)) {
          item.style.display = "block";
        } else {
          item.style.display = "none";
        }
      }
    });

    dropdownContent.classList.remove("show"); // Fermer le menu après clic
  };

  // Ajouter l'événement de filtrage à chaque lien dans le menu déroulant
  links.forEach((link) => {
    link.addEventListener("click", function (e) {
      e.preventDefault(); // Empêche le défilement de la page
      filtrer(); // Appeler la fonction filtrer directement ici
    });
  });
});
