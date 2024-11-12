// Description: JavaScript file for the projets page
// POUR AFFICHER LES MODALS (PROJECT POPUPS)
document.addEventListener("DOMContentLoaded", function () {
  const modal = document.getElementById("projectModal");
  const modalTitle = document.getElementById("modalTitle");
  const modalTeam = document.getElementById("modalTeam");
  const modalImage = document.getElementById("modalImage");
  const modalDescription = document.getElementById("modalDescription");
  const closeModal = document.querySelector(".close");

  document.querySelectorAll(".more-info").forEach(button => {
    button.addEventListener("click", function (e) {
      e.preventDefault();
      modalTitle.textContent = button.dataset.title;
      modalTeam.textContent = button.dataset.team;
      modalDescription.textContent = button.dataset.description;
      modalImage.src = button.dataset.image;
      modal.style.display = "block";
    });
  });

  closeModal.addEventListener("click", function () {
    modal.style.display = "none";
  });

  window.addEventListener("click", function (e) {
    if (e.target === modal) {
      modal.style.display = "none";
    }
  });
});
