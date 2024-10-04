document.addEventListener('DOMContentLoaded', () => {
  const popupCard = document.getElementById('popup-card');
  const popupName = document.getElementById('popup-name');
  const popupDescription = document.getElementById('popup-description');
  const popupQuote = document.getElementById('popup-quote');
  const popupImage = document.getElementById('popup-image');
  const popupIconsContainer = document.getElementById('popup-icons-container');
  const closePopup = document.getElementById('close-popup');

  document.querySelectorAll('.content').forEach(prof => {
    prof.addEventListener('click', () => {
      const name = prof.querySelector('h2').innerText;
      const description = prof.getAttribute('data-description');
      const quote = prof.getAttribute('data-quote');
      const imageUrl = prof.getAttribute('data-image');
      const icons = JSON.parse(prof.getAttribute('data-icons')); // Make sure this is formatted correctly

      popupName.innerText = name;
      popupDescription.innerText = description;
      popupQuote.innerText = quote;
      popupImage.src = imageUrl;

      // Clear previous icons
      popupIconsContainer.innerHTML = '';

      // Create and append new icons
      if (Array.isArray(icons)) {
        icons.forEach(icon => {
          const iconElement = document.createElement('a');
          iconElement.href = icon.url; // Use the URL for the link
          iconElement.className = 'popup-icon material-icons'; // Add classes for styling
          iconElement.textContent = icon.class; // Set the icon text

          // Optionally set target attribute to open links in a new tab
          iconElement.target = '_blank';

          popupIconsContainer.appendChild(iconElement);
        });
      }

      popupCard.style.display = 'block';
    });
  });

  closePopup.addEventListener('click', () => {
    popupCard.style.display = 'none';
  });

  window.addEventListener('click', (event) => {
    if (event.target == popupCard) {
      popupCard.style.display = 'none';
    }
  });
});
