import { rank } from "./stage_rank/rank";

const app = {
  init: () => {
    rank.getRank();
  },
};

document.addEventListener("DOMContentLoaded", app.init);
