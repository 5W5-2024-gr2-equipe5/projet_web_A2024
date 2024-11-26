document.addEventListener('DOMContentLoaded', () => {
  const slider = document.querySelector('.banner .slider');
  const cards = document.querySelectorAll('.banner .slider .item');
  if (!slider || cards.length === 0) {
    console.error('Slider or cards not found');
    return;
  }

  let isDragging = false;
  let startX, startY, currentX, currentY, rotationX = -16, rotationY = 0;
  let autoRunInterval = null;
  let lastInteractionTime = Date.now();
  let emphasizedCard = null;

  // Start auto-rotation
  const startAutoRun = () => {
    if (autoRunInterval) return;

    const autoRun = () => {
      if (Date.now() - lastInteractionTime > 2000) {
        rotationY += 0.05; // Slower speed
        slider.style.transform = `perspective(1000px) rotateX(${rotationX}deg) rotateY(${rotationY}deg)`;
      }
      autoRunInterval = requestAnimationFrame(autoRun);
    };

    autoRunInterval = requestAnimationFrame(autoRun);
  };

  // Stop auto-rotation
  const stopAutoRun = () => {
    if (autoRunInterval) {
      cancelAnimationFrame(autoRunInterval);
      autoRunInterval = null;
    }
  };

  // Mouse event handlers
  const onMouseDown = (e) => {
    isDragging = true;
    startX = e.pageX - slider.offsetLeft;
    startY = e.pageY - slider.offsetTop;
    slider.style.cursor = 'grabbing';
    stopAutoRun();
  };

  const onMouseMove = (e) => {
    if (!isDragging) return;

    currentX = e.pageX - slider.offsetLeft;
    currentY = e.pageY - slider.offsetTop;

    const deltaX = currentX - startX;
    const deltaY = currentY - startY;

    rotationY += deltaX * 0.05; // Adjust speed
    rotationX -= deltaY * 0.05;

    slider.style.transform = `perspective(1000px) rotateX(${rotationX}deg) rotateY(${rotationY}deg)`;

    startX = currentX;
    startY = currentY;
    lastInteractionTime = Date.now();
  };

  const onMouseUp = () => {
    isDragging = false;
    slider.style.cursor = 'grab';
    lastInteractionTime = Date.now();
    startAutoRun();
  };

  // Reset carousel state
  const resetCarousel = () => {
    stopAutoRun();

    slider.style.transition = 'transform 0.5s ease';
    rotationX = -16;
    rotationY = 0;
    slider.style.transform = `perspective(1000px) rotateX(${rotationX}deg) rotateY(${rotationY}deg)`;

    if (emphasizedCard) {
      emphasizedCard.classList.remove('emphasized');
      emphasizedCard = null;
      cards.forEach(card => card.style.opacity = '');
    }

    lastInteractionTime = Date.now();
    startAutoRun();

    setTimeout(() => {
      slider.style.transition = '';
    }, 500);
  };

  // Highlight a card
  const emphasizeCard = (card) => {
    if (emphasizedCard) {
      emphasizedCard.classList.remove('emphasized');
      cards.forEach(card => card.style.opacity = '');
    }

    emphasizedCard = card;
    card.classList.add('emphasized');
    cards.forEach(c => {
      if (c !== card) c.style.opacity = '0.5';
    });

    stopAutoRun();
  };

  // Attach mouse events
  slider.addEventListener('mousedown', onMouseDown);
  document.addEventListener('mousemove', onMouseMove);
  document.addEventListener('mouseup', onMouseUp);

  slider.style.cursor = 'grab';

  // Add click event listeners to cards
  cards.forEach(card => {
    card.addEventListener('click', (e) => {
      e.stopPropagation();
      emphasizeCard(card);
    });
  });

  // Add a reset button
  const resetButtonContainer = document.createElement('div');
  resetButtonContainer.className = 'reset-button-container';

  const resetButton = document.createElement('button');
  resetButton.textContent = 'Reset';
  resetButton.addEventListener('click', resetCarousel);

  resetButtonContainer.appendChild(resetButton);
  document.querySelector('.banner').appendChild(resetButtonContainer);

  // Detect clicks outside the emphasized card
  document.addEventListener('click', (e) => {
    if (emphasizedCard && !slider.contains(e.target)) {
      emphasizedCard.style.transition = 'transform 0.5s ease, opacity 0.5s ease';
      emphasizedCard.classList.remove('emphasized');
      emphasizedCard = null;
      cards.forEach(card => card.style.opacity = '');
      startAutoRun();
    }
  });

  // Start the auto-run feature
  startAutoRun();
});