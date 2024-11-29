document.addEventListener('DOMContentLoaded', () => {
  const slider = document.querySelector('.banner .slider');
  const cards = document.querySelectorAll('.banner .slider .item');
  let isDragging = false;
  let startX, startY, currentX, currentY, rotationX = -16, rotationY = 0;
  let autoRunInterval = null;
  let lastInteractionTime = Date.now();
  let emphasizedCard = null;
  let cardPositions = []; // To store the relative positions of cards

  // Start auto-run when idle
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

    // Apply rotation based on the dragging movement
    rotationY += deltaX * 0.05; 
    rotationX -= deltaY * 0.05;

    // Update slider's rotation
    slider.style.transform = `perspective(1000px) rotateX(${rotationX}deg) rotateY(${rotationY}deg)`;

    // Update the position of the emphasized card separately if it's set
    if (emphasizedCard) {
      const cardPosition = cardPositions[cards.indexOf(emphasizedCard)];
      const transformValue = `translateZ(${cardPosition.z + 400}px) scale(1.5)`;
      emphasizedCard.style.transform = transformValue;
    }

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

  // Reset the carousel
  const resetCarousel = () => {
    stopAutoRun();
    slider.style.transition = 'transform 0.5s ease';
    rotationX = -16;
    rotationY = 0;
    slider.style.transform = `perspective(1000px) rotateX(${rotationX}deg) rotateY(${rotationY}deg)`;
    resetEmphasizedCard();
    lastInteractionTime = Date.now();
    startAutoRun();
    setTimeout(() => {
      slider.style.transition = '';
    }, 500);
  };

  const resetEmphasizedCard = () => {
    if (emphasizedCard) {
      emphasizedCard.style.transform = '';
      emphasizedCard.classList.remove('emphasized');
      emphasizedCard = null;
      cards.forEach(card => card.style.opacity = '');
    }
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

    // Ensure the correct 3D position of the emphasized card
    const cardPosition = cardPositions[cards.indexOf(card)];
    // Calculate the new transform based on the card's position
    const transformValue = `translateZ(${cardPosition.z + 400}px) scale(1.5)`;
    card.style.transform = transformValue;

    // Apply the current rotation to the carousel
    slider.style.transform = `perspective(1000px) rotateX(${rotationX}deg) rotateY(${rotationY}deg)`;
  };

  // Store the initial positions of all cards relative to the carousel
  const storeCardPositions = () => {
    cardPositions = [];
    cards.forEach((card, index) => {
      const transform = window.getComputedStyle(card).transform;
      const matrix = new DOMMatrix(transform);
      cardPositions.push({
        x: matrix.m41,
        y: matrix.m42,
        z: matrix.m43,
        rotation: matrix.rotate(0, 0).a
      });
    });
  };

  // On card click, emphasize the card and store its position
  cards.forEach(card => {
    card.addEventListener('click', (e) => {
      e.stopPropagation();
      emphasizeCard(card);
      storeCardPositions(); // Store card positions on click
    });
  });

  // Reset button to reset the carousel to default state
  const resetButtonContainer = document.createElement('div');
  resetButtonContainer.className = 'reset-button-container';

  const resetButton = document.createElement('button');
  resetButton.textContent = 'Reset';
  resetButton.addEventListener('click', resetCarousel);
  resetButtonContainer.appendChild(resetButton);

  document.querySelector('.banner').appendChild(resetButtonContainer);

  // Click anywhere outside the carousel to reset emphasized card
  document.addEventListener('click', (e) => {
    if (emphasizedCard && !slider.contains(e.target)) {
      resetEmphasizedCard();
      startAutoRun();
    }
  });

  slider.addEventListener('mousedown', onMouseDown);
  document.addEventListener('mousemove', onMouseMove);
  document.addEventListener('mouseup', onMouseUp);

  slider.style.cursor = 'grab';
  startAutoRun();
});
