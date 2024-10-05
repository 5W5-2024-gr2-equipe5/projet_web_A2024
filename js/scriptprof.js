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
      const icons = JSON.parse(prof.getAttribute('data-icons'));

      popupName.innerText = name;
      popupDescription.innerText = description;
      popupQuote.innerText = quote;
      popupImage.src = imageUrl;

      popupIconsContainer.innerHTML = '';

      if (Array.isArray(icons)) {
        icons.forEach(icon => {
          const iconElement = document.createElement('a');
          iconElement.href = icon.url;
          iconElement.className = 'popup-icon material-icons';
          iconElement.textContent = icon.class;
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