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

  // For mouse and touch events (common handling)
  const onPointerDown = (e) => {
    isDragging = true;
    startX = e.pageX || e.touches[0].pageX;  // For touch or mouse
    startY = e.pageY || e.touches[0].pageY;  // For touch or mouse
    slider.style.cursor = 'grabbing';
    stopAutoRun();
  };

  const onPointerMove = (e) => {
    if (!isDragging) return;
    currentX = e.pageX || e.touches[0].pageX;  // For touch or mouse
    currentY = e.pageY || e.touches[0].pageY;  // For touch or mouse
    const deltaX = currentX - startX;
    const deltaY = currentY - startY;

    // Apply rotation based on the dragging movement
    rotationY += deltaX * 0.05;
    rotationX -= deltaY * 0.05;

    // Update slider's rotation
    slider.style.transform = `perspective(1000px) rotateX(${rotationX}deg) rotateY(${rotationY}deg)`;

    startX = currentX;
    startY = currentY;
    lastInteractionTime = Date.now();
  };

  const onPointerUp = () => {
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
      cards.forEach(card => {
        card.style.opacity = '';  // Reset opacity of all cards
        card.style.pointerEvents = ''; // Enable interaction with all cards
      });
    }
  };

  const emphasizeCard = (card) => {
    if (emphasizedCard) {
      emphasizedCard.classList.remove('emphasized');
      cards.forEach(card => {
        card.style.opacity = ''; // Reset opacity of all cards
        card.style.pointerEvents = ''; // Enable interaction with all cards
      });
    }
    emphasizedCard = card;
    card.classList.add('emphasized');
    cards.forEach(c => {
      if (c !== card) {
        c.style.opacity = '0.3'; // Dim down the non-emphasized cards
        c.style.pointerEvents = 'none'; // Disable interaction with non-emphasized cards
      }
    });
    stopAutoRun();

    // Ensure the correct 3D position of the emphasized card
    const cardPosition = cardPositions[cards.indexOf(card)];
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
  resetButton.textContent = 'Réinitialisation';
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

  // Add event listeners for both mouse and touch events
  slider.addEventListener('mousedown', onPointerDown);
  slider.addEventListener('touchstart', onPointerDown, { passive: true });
  
  document.addEventListener('mousemove', onPointerMove);
  document.addEventListener('touchmove', onPointerMove, { passive: true });

  document.addEventListener('mouseup', onPointerUp);
  document.addEventListener('touchend', onPointerUp);

  slider.style.cursor = 'grab';
  startAutoRun();
});
