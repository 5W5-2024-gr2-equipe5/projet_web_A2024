// buttons
function toggleCollapse(id) {
  var element = document.getElementById(id);
  if (element.classList.contains("show")) {
    element.classList.remove("show");
  } else {
    element.classList.add("show");
  }
}

// buttons
function toggleCollapse(id) {
  const element = document.getElementById(id);
  element.classList.toggle("show");
}

document.addEventListener("DOMContentLoaded", () => {
  let currentSession = 1;
  const maxSessions = 6;

  function showSession(session) {
    const rows = document.querySelectorAll(".session-courses");
    rows.forEach((row) => {
      row.classList.remove("active");
      if (parseInt(row.getAttribute("data-session")) === session) {
        row.classList.add("active");
      }
    });
  }

  function changeSession(direction) {
    currentSession += direction;
    if (currentSession < 1) currentSession = maxSessions;
    if (currentSession > maxSessions) currentSession = 1;
    showSession(currentSession);
  }

  // Initial setup
  showSession(currentSession);
});
