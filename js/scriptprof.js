// CHANGER LE SCRIPT POUR AVOIR DE SCROLL QUAND LE POPUP EST OUVERT
document.addEventListener('DOMContentLoaded', () => {
  const popupCard = document.getElementById('popup-card');
  const popupName = document.getElementById('popup-name');
  const popupDescription = document.getElementById('popup-description');
  const popupQuote = document.getElementById('popup-quote');
  const popupImage = document.getElementById('popup-image');
  const popupIconsContainer = document.getElementById('popup-icons-container');
  const closePopup = document.getElementById('close-popup');

  // Hide popup on page load
  popupCard.style.display = 'none';

  document.querySelectorAll('.content').forEach(prof => {
    prof.addEventListener('click', () => {
      const name = prof.querySelector('h2').innerText;
      const description = prof.getAttribute('data-description');
      const quote = prof.getAttribute('data-quote');
      const imageUrl = prof.getAttribute('data-image');
      const icons = JSON.parse(prof.getAttribute('data-icons'));

      // Populate the popup content
      popupName.innerText = name;
      popupDescription.innerText = description;
      popupQuote.innerText = quote;
      popupImage.src = imageUrl;

      // Clear and add icons
      popupIconsContainer.innerHTML = '';
      if (Array.isArray(icons)) {
        icons.forEach(icon => {
          const iconElement = document.createElement('span');
          iconElement.href = icon.url;
          iconElement.className = 'popup-icon material-icons';
          iconElement.textContent = icon.class;
          iconElement.target = '_self';
          popupIconsContainer.appendChild(iconElement);
        });
      }

      // Show the popup
      popupCard.style.display = 'flex';
      document.body.style.overflow = 'hidden'; // Prevent scrolling
    });
  });

  // Close the popup
  closePopup.addEventListener('click', () => {
    popupCard.style.display = 'none';
    document.body.style.overflow = ''; // Restore scrolling
  });
});
