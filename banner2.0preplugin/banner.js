document.addEventListener('DOMContentLoaded', () => {
  const slider = document.querySelector('.banner .slider');
  const cards = document.querySelectorAll('.banner .slider .item');
  let isDragging = false;
  let startX, startY, currentX, currentY, rotationX = -16, rotationY = 0;
  let autoRunInterval = null;
  let lastInteractionTime = Date.now();
  let emphasizedCard = null;

  const startAutoRun = () => {
    if (autoRunInterval) return; // Prevent multiple intervals
    const autoRun = () => {
      if (Date.now() - lastInteractionTime > 2000) { // 2 seconds of inactivity
        rotationY += 0.05; // Slower speed
        slider.style.transform = `perspective(1000px) rotateX(${rotationX}deg) rotateY(${rotationY}deg)`;
      }
      autoRunInterval = requestAnimationFrame(autoRun);
    };
    autoRunInterval = requestAnimationFrame(autoRun);
  };

  const stopAutoRun = () => {
    if (autoRunInterval) {
      cancelAnimationFrame(autoRunInterval);
      autoRunInterval = null;
    }
  };

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
    rotationY += deltaX * 0.05; // Slower speed
    rotationX -= deltaY * 0.05; // Slower speed
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

  const resetCarousel = () => {
    stopAutoRun(); // Stop any existing auto-run before resetting

    slider.style.transition = 'transform 0.5s ease'; // Add transition for smooth reset
    rotationX = -16;
    rotationY = 0;
    slider.style.transform = `perspective(1000px) rotateX(${rotationX}deg) rotateY(${rotationY}deg)`;
    if (emphasizedCard) {
      emphasizedCard.classList.remove('emphasized');
      emphasizedCard = null;
      cards.forEach(card => card.style.opacity = '');
    }
    lastInteractionTime = Date.now();
    startAutoRun(); // Start a new auto-run

    // Remove the transition after it completes to avoid affecting other transformations
    setTimeout(() => {
      slider.style.transition = '';
    }, 500); // Match the duration of the transition
  };

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

  slider.addEventListener('mousedown', onMouseDown);
  document.addEventListener('mousemove', onMouseMove);
  document.addEventListener('mouseup', onMouseUp);

  slider.style.cursor = 'grab';

  // Add event listeners to the cards
  cards.forEach(card => {
    card.addEventListener('click', (e) => {
      e.stopPropagation();
      emphasizeCard(card);
    });
  });

  // Add a reset button container
  const resetButtonContainer = document.createElement('div');
  resetButtonContainer.className = 'reset-button-container';

  // Add a reset button
  const resetButton = document.createElement('button');
  resetButton.textContent = 'Reset';
  resetButton.addEventListener('click', resetCarousel);
  resetButtonContainer.appendChild(resetButton);

  document.querySelector('.banner').appendChild(resetButtonContainer);

  // Add event listener to the document to detect clicks outside the emphasized card
  document.addEventListener('click', (e) => {
    if (emphasizedCard && !slider.contains(e.target)) {
      emphasizedCard.style.transition = 'transform 0.5s ease, opacity 0.5s ease';
      emphasizedCard.classList.remove('emphasized');
      emphasizedCard = null;
      cards.forEach(card => card.style.opacity = '');
      startAutoRun();
    }
  });

  startAutoRun();
});