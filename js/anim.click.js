document.addEventListener("click", (event) => playAnimationClick(event));

function playAnimationClick(event) {
    const nouveauCercle = document.createElement("div");

    console.log("A new circle will play a click animation");

    nouveauCercle.setAttribute("id", "on-click");
    nouveauCercle.style.position = "absolute";
    nouveauCercle.style.zIndex = "30000";
    nouveauCercle.style.width = "100px";
    nouveauCercle.style.height = "100px";
    nouveauCercle.style.pointerEvents = "none";
    nouveauCercle.style.background = "#ffc7ec";
    nouveauCercle.style.borderRadius = "50%"; // Ensures it's a circle

    handleMouseMove(event, nouveauCercle);
    nouveauCercle.classList.add("ping");
    document.body.appendChild(nouveauCercle);

    setTimeout(() => removeElement(nouveauCercle), 1500);
}

function handleMouseMove(event, element) {
    var eventDoc, doc, body;

    event = event || window.event; // IE-ism

    if (event.pageX == null && event.clientX != null) {
        eventDoc = (event.target && event.target.ownerDocument) || document;
        doc = eventDoc.documentElement;
        body = eventDoc.body;

        event.pageX = event.clientX +
            (doc && doc.scrollLeft || body && body.scrollLeft || 0) -
            (doc && doc.clientLeft || body && body.clientLeft || 0);
        event.pageY = event.clientY +
            (doc && doc.scrollTop || body && body.scrollTop || 0) -
            (doc && doc.clientTop || body && body.clientTop || 0);
    }

    // Offset the position to center the circle
    const circleWidth = parseInt(element.style.width, 10);
    const circleHeight = parseInt(element.style.height, 10);

    element.style.left = `${event.pageX - circleWidth / 2}px`;
    element.style.top = `${event.pageY - circleHeight / 2}px`;
}

function removeElement(element) {
    element.remove();
}