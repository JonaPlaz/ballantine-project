const app = {
  init: () => {
    const stageJson = document.querySelector("#stage");
    const stage = JSON.parse(stageJson.innerHTML.replace(/&quot;/g, '"').replace(/&#039;/g, "'"));
    console.log(stage.rank[0].atmosphere)
  },
};

document.addEventListener("DOMContentLoaded", app.init);
