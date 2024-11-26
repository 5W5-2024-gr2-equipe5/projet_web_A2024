document.addEventListener('DOMContentLoaded', function() {
  const modal = document.getElementById('projectModal');
  const modalTitle = document.getElementById('modalTitle');
  const modalTeam = document.getElementById('modalTeam');
  const modalDescription = document.getElementById('modalDescription');
  const carouselImages = document.querySelector('.carousel-images');
  const prevButton = document.querySelector('.prev');
  const nextButton = document.querySelector('.next');
  const closeModal = document.querySelector('.close');
  let items = [];
  let currentImageIndex = 0;

  // Ouvrir le modal pour afficher plus d'informations sur le projet
  document.querySelectorAll('.more-info').forEach(function(button) {
    button.addEventListener('click', function(event) {
      event.preventDefault();
      modalTitle.textContent = this.dataset.title;
      modalTeam.textContent = this.dataset.team;
      modalDescription.textContent = this.dataset.description;
      items = JSON.parse(this.dataset.items);
      currentImageIndex = 0;
      updateCarousel();
      modal.style.display = 'block';
    });
  });

  // Fermer le modal
  closeModal.addEventListener('click', function() {
    modal.style.display = 'none';
  });

  // Button précédent et suivant pour le carousel
  prevButton.addEventListener('click', function() {
    currentImageIndex = (currentImageIndex > 0) ? currentImageIndex - 1 : items.length - 1;
    updateCarousel();
  });

  nextButton.addEventListener('click', function() {
    currentImageIndex = (currentImageIndex < items.length - 1) ? currentImageIndex + 1 : 0;
    updateCarousel();
  });

  // Fonctionnalité du Carousel Card PROJET pour les projets étudiants
  // IMAGES ET VIDÉOS
  function updateCarousel() {
    carouselImages.innerHTML = '';
    if (items && items.length > 0) {
      const item = items[currentImageIndex];
      if (item) {
        if (item.type === 'image') {
          const img = document.createElement('img');
          img.dataset.src = item.url; // Use data-src for lazy loading
          img.alt = 'Project Image';
          img.style.width = '100%';
          img.style.height = 'auto';
          
          // Lazy load the image using IntersectionObserver
          const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
              if (entry.isIntersecting) {
                entry.target.src = entry.target.dataset.src; // Load the image
                observer.unobserve(entry.target); // Stop observing once the image is loaded
              }
            });
          }, { threshold: 0.1 }); // Trigger when 10% of the image is in view

          observer.observe(img);
          carouselImages.appendChild(img);
        } else if (item.type === 'video') {
          const video = document.createElement('video');
          video.controls = true;
          video.classList.add('carousel-video');
          const source = document.createElement('source');
          source.src = item.url;
          source.type = 'video/mp4';
          video.appendChild(source);
          video.style.width = '100%';
          video.style.height = 'auto';
          carouselImages.appendChild(video);
        }
      }
    }
  }
});
