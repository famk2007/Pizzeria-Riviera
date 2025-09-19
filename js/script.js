const images = [
  'images/Pizza-Reina.png',
  'images/pizza3.png',
  'images/pizza4.png'
];
// Le tableau ou il y'a toute les images
let index = 0;
// l'index cible la première image du tableau
function afficherImage(direction) {
  const img = document.querySelector('.image');

  // Animation de sortie
  img.classList.remove('slide-in-left', 'slide-in-right');
  img.classList.add(direction === 'left' ? 'slide-out-left' : 'slide-out-right');

  setTimeout(() => {
    // Changer l'image
    img.src = images[index];

    // Préparer l'entrée
    img.classList.remove('slide-out-left', 'slide-out-right');
    img.classList.add(direction === 'left' ? 'slide-in-right' : 'slide-in-left');

    // Revenir à la position normale
    setTimeout(() => {
      img.classList.remove('slide-in-left', 'slide-in-right');
    }, 500);
  }, 500);
}

function suivant() {
  index = (index + 1) % images.length;
  afficherImage('left'); // image entre depuis la droite
}

function precedent() {
  index = (index - 1 + images.length) % images.length;
  afficherImage('right'); // image entre depuis la gauche
}


// Ce code sert à créer un slide jusqu'à la section demander quand j'appuie sur un lien du menu
  document.querySelectorAll('a[href^=".section1"]').forEach(anchor => {
  anchor.addEventListener('click', function(e) {
    e.preventDefault();
    const target = document.querySelector(this.getAttribute('href'));
    target.scrollIntoView({
      behavior: 'smooth'
    });
  });
});