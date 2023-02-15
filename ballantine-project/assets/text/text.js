export const text = {
  getTexts: (element, checkCompletion) => {
    const textArea = document.querySelector("#text_area");
    const continueButton = document.createElement("button");
    continueButton.setAttribute("id", "continue_button");
    continueButton.textContent = "continue...";
    textArea.appendChild(continueButton);

    let currentTextIndex = 0;

    const displayText = (currentText) => {
      const textDiv = document.querySelector("#text");
      if (textDiv === null) {
        const textCurrentDiv = document.createElement("div");
        textCurrentDiv.setAttribute("id", "text");
        textCurrentDiv.textContent = currentText.text;
        textArea.appendChild(textCurrentDiv);
      } else {
        textDiv.textContent = currentText.text;
      }

      switch (currentText.categoryText.name) {
        case "narrative":
        case "hero solo":
        case "discussion":
        case "information":
          break;
        default:
          console.warn(`Unknown category: ${currentText.categoryText.name}`);
      }
    };

    displayText(element.texts[currentTextIndex]);

    continueButton.addEventListener("click", () => {
      currentTextIndex++;
      if (currentTextIndex >= element.texts.length) {
        console.log("End of text");
        checkCompletion();
        return;
      }
      displayText(element.texts[currentTextIndex]);
    });
  },
};
