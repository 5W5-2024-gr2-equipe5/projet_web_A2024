var html = document.documentElement;
var body = document.body;

var peinture = document.getElementById("fond-peinture")

//On appelle la fonction à chaque fois que la fenêtre bouge
window.addEventListener("resize", modifierHauteur);

//Appel initial de la fonction
window.addEventListener("load", modifierHauteur);

function modifierHauteur() {
    var height = Math.max(body.scrollHeight);
    peinture.style.height = height + "px";
}