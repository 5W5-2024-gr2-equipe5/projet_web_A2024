//Appel initial de la fonction
window.addEventListener("load", checkWindowSize);

// buttons
function toggleCollapse(id) {
  var element = document.getElementById(id);
  if (element.classList.contains("show")) {
    element.classList.remove("show");
  } else {
    element.classList.add("show");
  }
}

function spinArrow(btn) {
  btn.classList.toggle("unactive");
}

// buttons
function toggleCollapse(id) {
  const element = document.getElementById(id);
  element.classList.toggle("show");
}

let currentSession = 1;
const maxSessions = 6;

function showSession(session) {
  const rows = document.querySelectorAll(".session-courses");
  const headers = document.querySelectorAll(".session-header");

  rows.forEach((row) => {
    row.classList.remove("active");
    if (parseInt(row.getAttribute("data-session")) === session) {
      row.classList.add("active");
    }
  });

  headers.forEach((header) => {
    header.style.display = "none"; // Masquer tous les th
  });

  // Afficher le th de la session actuelle
  const currentHeader = document.querySelector(
    `.session-header[data-session="${session}"]`
  );
  if (currentHeader) {
    currentHeader.style.display = "flex";
  }
}

function changeSession(direction) {
  currentSession += direction;
  if (currentSession < 1) currentSession = maxSessions;
  if (currentSession > maxSessions) currentSession = 1;
  showSession(currentSession);
}
document.addEventListener("DOMContentLoaded", () => {
  // Initial setup
  showSession(currentSession);
});

// Fonction qui sera appelée lorsque la taille de la fenêtre change
function checkWindowSize() {
  // Définir la largeur minimale souhaitée
  const minWidth = 1024; // par exemple, 1024px
  const sessionCoursesDivs = document.querySelectorAll('.session-courses');
  const sessionHeaders = document.querySelectorAll('.session-header');
  let dataSession;
  // Vérifier si la largeur de la fenêtre est supérieure à minWidth
  if (window.innerWidth >= minWidth) {
        sessionCoursesDivs.forEach(div => {
          if (!div.classList.contains('active')) {
            div.classList.add('active');
          }
        });
  } else {
        sessionCoursesDivs.forEach(div => {
          div.classList.remove('active');
        });

        sessionHeaders.forEach(header => {
          // Vérifier si l'élément a un style "display: flex"
          const computedStyle = window.getComputedStyle(header);
          if (computedStyle.display === 'flex') {
            // Extraire la valeur de l'attribut data-session
            dataSession = header.getAttribute('data-session');
            
            // Afficher ou utiliser la valeur de data-session
            if (dataSession !== null) {
              console.log('Data-session:', dataSession);
            } else {
              console.log('L\'élément "session-header" n\'a pas d\'attribut data-session.');
            }
          }
        });
        sessionCoursesDivs[dataSession-1].classList.add('active');
  }
}

// Attacher l'événement 'resize' à la fenêtre
window.addEventListener("resize", checkWindowSize);

// Appeler la fonction une première fois pour vérifier la taille actuelle au chargement
checkWindowSize();