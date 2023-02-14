import { stage } from "./stage";
import { atmosphere } from "../atmosphere/atmosphere";
import { audio } from "../audio/audio";

export const rank = {
  getRank: () => {
    const frame = document.querySelector("#frame");
    const currentStage = stage.getCurrentStage();
    let element = null;
    for (const rank in currentStage.ranks) {
      if (Object.hasOwnProperty.call(currentStage.ranks, rank)) {
        element = currentStage.ranks[rank];
      }
      if (element.id === 3) {
        atmosphere.getAtmosphere(element, frame);
        audio.getAudio(element, frame);
      }
    }
  },
};
