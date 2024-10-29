var html = document.documentElement;
var body = document.body;

var peinture = document.getElementsByClassName("fond-peinture");

//On appelle la fonction à chaque fois que la fenêtre bouge
window.addEventListener("resize", modifierHauteur);

//Appel initial de la fonction
window.addEventListener("load", modifierHauteur);

function modifierHauteur() {
    var height = Math.max(body.scrollHeight);

    for (div of peinture) {
        div.style.height = height + "px";
    }

}