document.addEventListener("click", playAnimationClick);

document.addEventListener("mousemove", handleMouseMove);

function playAnimationClick() {
    nouveauCercle = document.createElement("div");

    print(nouveauCercle + "va jouer une belle animation de click");

    nouveauCercle.setAttribute("id", "on-click");
    nouveauCercle.style.opacity = "none";
    nouveauCercle.style.position = "absolute";
    nouveauCercle.style.backgroundColor = "#ffc7ec";
    handleMouseMove(nouveauCercle);

    nouveauCercle.classList.add("ping");
    setTimeout(removeElement(nouveauCercle), 1500);
}

function handleMouseMove(event) {
    var eventDoc, doc, body;

    event = event || window.event; // IE-ism

    print(event + "est le meme cercle qu'avant")

    // If pageX/Y aren't available and clientX/Y are,
    // calculate pageX/Y - logic taken from jQuery.
    // (This is to support old IE)
    if (event.pageX == null && event.clientX != null) {
        eventDoc = (event.target && event.target.ownerDocument) || document;
        doc = eventDoc.documentElement;
        body = eventDoc.body;

        event.pageX = event.clientX +
          (doc && doc.scrollLeft || body && body.scrollLeft || 0) -
          (doc && doc.clientLeft || body && body.clientLeft || 0);
        event.pageY = event.clientY +
          (doc && doc.scrollTop  || body && body.scrollTop  || 0) -
          (doc && doc.clientTop  || body && body.clientTop  || 0 );
    }

    event.style.left = event.pageX;
    event.style.top = event.pageY;
}

function removeElement(event) {
    event.remove();
}