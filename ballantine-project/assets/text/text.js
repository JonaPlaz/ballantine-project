export const text = {
  getTexts: (element, checkCompletion) => {
    const textArea = document.querySelector("#text_area_center, #text_area_right");
    const continueButton = document.createElement("button");
    continueButton.setAttribute("id", "continue_button");
    continueButton.textContent = "continue...";
    textArea.appendChild(continueButton);

    let currentTextIndex = 0;

    // Copie de l'objet en utilisant l'opérateur de propagation
    // organize text : créer une fonction à terme
    const other = element.texts.filter((obj) => obj.discussion === false);
    const discussion = element.texts.filter((obj) => obj.discussion === true);
    const newArrayDiscussion = discussion.reduce((acc, curr) => {
      const foundIndex = acc.findIndex((arr) => arr[0].code === curr.code);
      if (foundIndex !== -1) {
        acc[foundIndex].push(curr);
      } else {
        acc.push([curr]);
      }
      return acc;
    }, []);
    const newElement = {
      ...element,
      texts: { other, newArrayDiscussion },
    };

    let currentText = null;
    if (newElement.texts.newArrayDiscussion.length === 0) {
      currentText = newElement.texts.other[currentTextIndex];
    } else {
      currentText = newElement.texts.newArrayDiscussion[currentTextIndex];
    }

    const displayText = (currentText) => {
      let varForSwitch = null;
      if ('categoryText' in currentText) {
        varForSwitch = currentText.categoryText.name;
      } else {
        varForSwitch = undefined;
      }
      switch (varForSwitch) {
        case "narrative":
        case "hero solo":
        case "information":
          const textDiv = document.querySelector("#text");
          if (textDiv === null) {
            const textCurrentDiv = document.createElement("div");
            textCurrentDiv.setAttribute("id", "text");
            textCurrentDiv.textContent = currentText.text;
            textArea.appendChild(textCurrentDiv);
          } else {
            textDiv.textContent = currentText.text;
          }
          break;
        case undefined:
          console.log(currentText);
          break;
        default:
          console.warn(`Unknown category: ${currentText.categoryText.name}`);
      }
    };

    displayText(currentText);

    continueButton.addEventListener("click", () => {
      currentTextIndex++;
      let currentText = null;
      let currentTextLength = null;
      if (newElement.texts.newArrayDiscussion.length === 0) {
        currentText = newElement.texts.other[currentTextIndex];
        currentTextLength = newElement.texts.other.length
      } else {
        currentText = newElement.texts.newArrayDiscussion[currentTextIndex];
        currentTextLength = newElement.texts.newArrayDiscussion.length
      }
      if (currentTextIndex >= currentTextLength) {
        console.log("End of text");
        checkCompletion();
        return;
      }
      displayText(currentText);
    });
  },
};
