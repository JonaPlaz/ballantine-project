export const button = {
  createButton: (progressDiv) => {
    // création du bouton Continue
    const button = document.querySelector("#continue");
    if (button === null) {
      const continueButton = document.createElement("button");
      continueButton.setAttribute("id", "continue");
      continueButton.textContent = "continue";
      progressDiv.appendChild(continueButton);
    }
  },
};
