  document.addEventListener('DOMContentLoaded', function() {
    const cards = document.querySelectorAll('.card');
    const modal = document.getElementById('modal');
    const modalImg = document.getElementById('modal-img');
    const captionText = document.getElementById('caption');

    cards.forEach(card => {
      card.addEventListener('click', function() {
        const description = this.getAttribute('data-description');
        const imgSrc = this.querySelector('img').src;
        modal.style.display = 'block';
        modalImg.src = imgSrc;
        captionText.innerHTML = description;
      });
    });

    document.querySelector('.close').addEventListener('click', function() {
      modal.style.display = 'none';
    });
  });
// BURGER MENU
  document.addEventListener('DOMContentLoaded', function() {
    const burger = document.getElementById('openBtn');
    const menu = document.querySelector('.menu');
  
    burger.addEventListener('click', function() {
      menu.classList.toggle('active');
      burger.classList.toggle('open');
    });
  });
