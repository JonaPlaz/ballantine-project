export const audio = {
  playAudio: (audioId) => {
    // on récupère les audios déclarés dans le template twig
    const audio1 = document.getElementById("audio1");
    const audio2 = document.getElementById("audio2");

    // lancer le premier audio au click, au raffraichissement de la page.
    document.addEventListener("click", function () {
      audio1.play();
    });
    // on active mets sur play l'audio sélectionné et sur pause, l'autre
    if (audioId === 2) {
      audio2.play();
      audio1.pause();
    } else {
      audio1.play();
      audio2.pause();
    }
  },
};
