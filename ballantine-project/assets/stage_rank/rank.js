import { stage } from "./stage";
import { atmosphere } from "../atmosphere/atmosphere";
import { audio } from "../audio/audio";
import { text } from "../text/text";

export const rank = {
  rankId: 1,
  getRank: () => {
    const frame = document.querySelector("#frame");
    const currentStage = stage.getCurrentStage();
    let element = null;

    const checkCompletion = () => {
      frame.innerHTML = "";
      rank.getRank();
    };

    if (rank.rankId > currentStage.ranks.length) {
      // // Récupérer l'ID actuel de l'URL
      const currentID = window.location.pathname.split("/")[2];
      // Ajouter 1 à l'ID actuel pour obtenir l'ID suivant
      const nextID = parseInt(currentID) + 1;
      // Construire la nouvelle URL en utilisant l'ID suivant
      const newURL = window.location.origin + "/stage/" + nextID;
      // Rediriger l'utilisateur vers la nouvelle URL
      window.location.assign(newURL);
    }

    for (const item in currentStage.ranks) {
      if (Object.hasOwnProperty.call(currentStage.ranks, item)) {
        element = currentStage.ranks[item];
        if (parseInt(element.code) === rank.rankId) {
          atmosphere.getAtmosphere(element, frame);
          audio.getAudio(element, frame);
          text.getTexts(element, checkCompletion);
          rank.rankId++;
          break; // exit loop when we find the correct element
        }
      }
    }
  },
};
