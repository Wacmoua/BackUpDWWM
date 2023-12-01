var fenetreFille = null;

function ouvrirFenetreFille() {
  // Ouvrir la fenêtre fille
  fenetreFille = window.open(
    "popup.html",
    "popuptest",
    "width=400,height=300",
    "noopener"
  );
}

function fermerFenetreMere() {
  // Fermer la fenêtre mère
  window.close();
}

function fermerFenetreFille() {
  // Fermer la fenêtre fille
  fenetreFille.close();
}

function deplacerFenetreFille() {
  fenetreFille.focus(), fenetreFille.moveBy(100, 50);
}

function reduireFenetreFille() {
  // Réduire la fenêtre fille à une largeur de 200 pixels et une hauteur de 150 pixels
  fenetreFille.focus(), fenetreFille.resizeTo(200, 150);
}