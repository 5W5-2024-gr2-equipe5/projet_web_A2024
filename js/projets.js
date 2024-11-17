document.addEventListener('DOMContentLoaded', function() {
  const modal = document.getElementById('projectModal');
  const closeModal = modal.querySelector('.close');
  const modalTitle = document.getElementById('modalTitle');
  const modalTeam = document.getElementById('modalTeam');
  const modalDescription = document.getElementById('modalDescription');
  const carouselImages = modal.querySelector('.carousel-images');
  const prevButton = modal.querySelector('.prev');
  const nextButton = modal.querySelector('.next');
  let currentImageIndex = 0;
  let images = [];

  document.querySelectorAll('.more-info').forEach(button => {
    button.addEventListener('click', function(event) {
      event.preventDefault();
      modalTitle.textContent = this.dataset.title;
      modalTeam.textContent = this.dataset.team;
      modalDescription.textContent = this.dataset.description;
      images = JSON.parse(this.dataset.images);
      currentImageIndex = 0;
      updateCarousel();
      modal.style.display = 'block';
    });
  });

  closeModal.addEventListener('click', function() {
    modal.style.display = 'none';
  });

  prevButton.addEventListener('click', function() {
    currentImageIndex = (currentImageIndex > 0) ? currentImageIndex - 1 : images.length - 1;
    updateCarousel();
  });

  nextButton.addEventListener('click', function() {
    currentImageIndex = (currentImageIndex < images.length - 1) ? currentImageIndex + 1 : 0;
    updateCarousel();
  });

  function updateCarousel() {
    carouselImages.innerHTML = '';
    const img = document.createElement('img');
    img.src = images[currentImageIndex];
    img.alt = 'Project Image';
    img.style.width = '100%';
    img.style.height = 'auto';
    carouselImages.appendChild(img);
  }
});