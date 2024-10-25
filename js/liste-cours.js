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

// changer de session
let currentSession = 0;
const totalSessions = 6;

function changeSession(direction) {
  const table = document.getElementById("course-table");
  const rows = table.getElementsByTagName("tr");

  // cacher les rows
  for (let i = 0; i < rows.length; i++) {
    const cells = rows[i].getElementsByTagName(i === 0 ? "th" : "td");
    for (let j = 0; j < cells.length; j++) {
      cells[j].style.display = "none";
    }
  }

  // Update la session
  currentSession += direction;

  if (currentSession < 0) {
    currentSession = totalSessions - 1;
  } else if (currentSession >= totalSessions) {
    currentSession = 0;
  }

// montrer les cells de la session
  for (let i = 0; i < rows.length; i++) {
    const cells = rows[i].getElementsByTagName(i === 0 ? "th" : "td");
    if (cells[currentSession]) {
      cells[currentSession].style.display = "";
    }
  }
}

changeSession(0);