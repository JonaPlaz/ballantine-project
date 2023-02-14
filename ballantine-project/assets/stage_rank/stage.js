export const stage = {
  getCurrentStage: () => {
    const stageJson = document.querySelector("#stage");
    return JSON.parse(stageJson.innerHTML.replace(/&quot;/g, '"').replace(/&#039;/g, "'"));
  },
};
