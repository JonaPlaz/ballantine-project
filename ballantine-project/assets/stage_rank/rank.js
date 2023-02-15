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

    for (const item in currentStage.ranks) {
      if (Object.hasOwnProperty.call(currentStage.ranks, item)) {
        element = currentStage.ranks[item];
        if (element.id === rank.rankId) {
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
