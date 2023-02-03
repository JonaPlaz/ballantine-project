// EXPLANATION
import { explanation } from "./explanation/explanation";

// DIALOG
import { dialog } from "./dialog/dialog";

const app = {
  init: () => {
    const progressDiv = document.querySelector("#progress");
    const progressTextDiv = document.querySelector("#progress_text");

    // L'histoire commence par 4 textes à faire avancer avec un click
    let clickButtonExplanation = 1;
    explanation.createExplanation(progressDiv, progressTextDiv, clickButtonExplanation);

    // On prépare l'affichage de la première question
    let questionNumber = 1;

    // création d'un handler pour le click button explanation
    const handleClickButtonExplanation = () => {
      clickButtonExplanation++;
      if (clickButtonExplanation === 2) {
        explanation.createExplanation(progressDiv, progressTextDiv, clickButtonExplanation);
      } else if (clickButtonExplanation === 3) {
        explanation.createExplanation(progressDiv, progressTextDiv, clickButtonExplanation);
      } else if (clickButtonExplanation === 4) {
        explanation.createExplanation(progressDiv, progressTextDiv, clickButtonExplanation);
      } else if (clickButtonExplanation === 5) {
        // quand les textes d'intro sont passés on supprime le paragraphe et le bouton pour laisser place au dialogue.
        continueButton.remove();
        const paragraphExplanation = document.querySelector("#explanation_paragraph");
        paragraphExplanation.remove();
        // et on affiche la première question
        dialog.createDialog(progressTextDiv, questionNumber);
      }
    };

    // on recherche le bouton continue pour faire avancer le texte au click
    const continueButton = document.querySelector("#continue");
    continueButton.addEventListener("click", handleClickButtonExplanation);
  },
};

document.addEventListener("DOMContentLoaded", app.init);
