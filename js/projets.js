// Fonctionnalité: Gestion de l'affichage des modales de projets
document.addEventListener('DOMContentLoaded', (event) => {
  const modal = document.getElementById("projectModal");
  const modalTitle = document.getElementById("modalTitle");
  const modalTeam = document.getElementById("modalTeam");
  const modalImage = document.getElementById("modalImage");
  const modalDescription = document.getElementById("modalDescription");
  const span = document.getElementsByClassName("close")[0];

  document.querySelectorAll('.more-info').forEach(item => {
    item.addEventListener('click', event => {
      event.preventDefault();
      modalTitle.textContent = item.getAttribute('data-title');
      modalTeam.textContent = item.getAttribute('data-team');
      modalImage.src = item.getAttribute('data-image');
      modalDescription.textContent = item.getAttribute('data-description');
      modal.style.display = "block";
    });
  });

  span.onclick = function() {
    modal.style.display = "none";
  }

  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
});