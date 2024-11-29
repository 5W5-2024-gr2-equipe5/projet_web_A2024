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
  btn.classList.toggle("active");
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
