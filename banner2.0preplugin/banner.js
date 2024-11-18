document.addEventListener('DOMContentLoaded', function() {
  const items = document.querySelectorAll('.banner .slider .item');
  const resetButton = document.querySelector('.reset-button-container button');

  items.forEach(item => {
      item.addEventListener('click', function() {
          items.forEach(i => i.classList.remove('emphasized'));
          this.classList.add('emphasized');
      });
  });

  resetButton.addEventListener('click', function() {
      items.forEach(item => item.classList.remove('emphasized'));
  });

  // Add grab event listener
  let isDragging = false;
  let startX;
  let scrollLeft;

  const slider = document.querySelector('.banner .slider');

  slider.addEventListener('mousedown', (e) => {
      isDragging = true;
      startX = e.pageX - slider.offsetLeft;
      scrollLeft = slider.scrollLeft;
  });

  slider.addEventListener('mouseleave', () => {
      isDragging = false;
  });

  slider.addEventListener('mouseup', () => {
      isDragging = false;
  });

  slider.addEventListener('mousemove', (e) => {
      if (!isDragging) return;
      e.preventDefault();
      const x = e.pageX - slider.offsetLeft;
      const walk = (x - startX) * 3; //scroll-fast
      slider.scrollLeft = scrollLeft - walk;
  });
});