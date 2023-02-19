export const text = {
  getTexts: (element, checkCompletion) => {
    const textArea = document.querySelector("#text_area_center, #text_area_right");
    const continueButton = document.createElement("button");
    continueButton.setAttribute("id", "continue_button");
    continueButton.textContent = "continue...";
    textArea.appendChild(continueButton);

    let currentTextIndex = 0;

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

    let currentText =
      newElement.texts.newArrayDiscussion.length === 0 ? newElement.texts.other[currentTextIndex] : newElement.texts.newArrayDiscussion[currentTextIndex];

    const displayText = (currentText) => {
      const varForSwitch = "categoryText" in currentText ? currentText.categoryText.name : undefined;
      switch (varForSwitch) {
        case "narrative":
        case "hero solo":
        case "information":
          const textDiv = document.querySelector("#text");
          const textCurrentDiv = textDiv || document.createElement("div");
          textCurrentDiv.id = "text";
          textCurrentDiv.textContent = currentText.text;
          if (!textDiv) textArea.insertBefore(textCurrentDiv, continueButton);
          break;
        case undefined:
          for (const item in currentText) {
            if (Object.hasOwnProperty.call(currentText, item)) {
              const element = currentText[item];
              if (element.speakFirst === true) {
                const textDiv = document.querySelector("#text");
                const textCurrentDiv = textDiv || document.createElement("div");
                textCurrentDiv.id = "text";
                textCurrentDiv.textContent = element.text;
                if (!textDiv) textArea.insertBefore(textCurrentDiv, continueButton);
              } else {
                const answerDiv = document.querySelector("#answer");
                if (!answerDiv) {
                  const answerCurrentDiv = document.createElement("div");
                  answerCurrentDiv.id = "answer";
                  textArea.insertBefore(answerCurrentDiv, continueButton);

                  const textCurrentAnswer = document.createElement("div");
                  textCurrentAnswer.className = "answerText";
                  textCurrentAnswer.textContent = `${element.characterSpeaker.firstName} : ${element.text}`;
                  answerCurrentDiv.appendChild(textCurrentAnswer);
                } else {
                  const textAnswer = answerDiv.querySelectorAll(".answerText");
                  if (textAnswer.length === 0) {
                    const textCurrentAnswer = document.createElement("div");
                    textCurrentAnswer.setAttribute("class", "answerText");
                    textCurrentAnswer.textContent = `${element.characterSpeaker.firstName} : ${element.text}`;
                    answerDiv.appendChild(textCurrentAnswer);
                  } else {
                    textAnswer.forEach((node) => {
                      node.textContent = `${element.characterSpeaker.firstName} : ${element.text}`;
                    });
                  }
                }
              }
            }
          }
          break;
        default:
          console.warn(`Unknown category: ${currentText.categoryText.name}`);
      }
    };

    displayText(currentText);

    const answerText = document.querySelectorAll(".answerText");
    const len = answerText.length;

    if (len > 1) {
      for (let i = 0; i < len; i++) {
        answerText[i].style.backgroundColor = "#367755";
        answerText[i].addEventListener("click", function (event) {
          event.target.style.backgroundColor = "#006D5E";
        });
      }
    } else if (len === 1) {
      answerText[0].style.backgroundColor = "#005B47";
    }

    continueButton.addEventListener("click", () => {
      currentTextIndex++;
      let currentText = null;
      let currentTextLength = null;
      if (newElement.texts.newArrayDiscussion.length === 0) {
        currentText = newElement.texts.other[currentTextIndex];
        currentTextLength = newElement.texts.other.length;
      } else {
        currentText = newElement.texts.newArrayDiscussion[currentTextIndex];
        currentTextLength = newElement.texts.newArrayDiscussion.length;
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
