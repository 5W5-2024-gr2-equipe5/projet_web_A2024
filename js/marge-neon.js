var html = document.documentElement;
var body = document.body;

var neons = document.getElementsByClassName("fond-neon");
//let solutionDuPauvre;
//solutionDuPauvre = setInterval(modifierHauteur, 200);

//On appelle la fonction à chaque fois que la fenêtre n'est 
window.addEventListener("resize", modifierHauteur);

//Appel initial de la fonction
window.addEventListener("load", modifierHauteur);


function modifierHauteur() {
    var height = Math.max(body.scrollHeight);

    for (div of neons) {
        div.style.height = height + "px";
    }
}
