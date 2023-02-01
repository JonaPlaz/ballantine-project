// AUDIO
import { audio } from "../audio/audio";
import { button } from "../button/button";

export const explanation = {
  // Recupérer une explanation en bdd via son id et créer un paragraphe.
  createExplanation: (progressTextDiv, id) => {
    // index représente l'index du tableau des explanation, donc l'id de l'object appelé - 1
    const index = id - 1;

    // On va chercher le tableau d'objets explanation
    const explanationJson = document.querySelector("#explanation");
    const explanation = JSON.parse(explanationJson.innerHTML.replace(/&quot;/g, '"').replace(/&#039;/g, "'"));

    // si le selecteur p n'existe pas, on le place en tant qu'enfant de progressTextDiv
    const paragraph = document.querySelector("#progressText>p");
    if (paragraph === null) {
      const explanationParagraph = document.createElement("p");
      progressTextDiv.appendChild(explanationParagraph);
      explanationParagraph.textContent = explanation[index].text;
    } else {
      // sinon on remplace le texte
      paragraph.textContent = explanation[index].text;
    }

    // création du bouton continue
    button.createButton(progressTextDiv);

    // activer audio correspondant au texte explanation
    const audioId = explanation[index].audio.id;
    audio.playAudio(audioId);
  },
};
