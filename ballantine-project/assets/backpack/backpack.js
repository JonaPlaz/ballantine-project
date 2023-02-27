export const backpack = {
  getBackpack: () => {
    const backpackJson = document.querySelector("#backpack");
    return JSON.parse(backpackJson.innerHTML.replace(/&quot;/g, '"').replace(/&#039;/g, "'"));
  }
}