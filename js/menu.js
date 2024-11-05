document.addEventListener('DOMContentLoaded', function() {
  const burger = document.getElementById('openBtn');
  const menu = document.querySelector('.menu');

  burger.addEventListener('click', function() {
      menu.classList.toggle('active');
      burger.classList.toggle('open');
  });
});