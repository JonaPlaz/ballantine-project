// EXPLANATION
import { explanation } from "./explanation/explanation";

const app = {
  init: () => {
    const progressTextDiv = document.querySelector("#progressText");

    // L'histoire commence par 4 textes à faire avancer avec un click
    let clickButtonExplanation = 1;
    explanation.createExplanation(progressTextDiv, clickButtonExplanation);

    const continueButton = document.querySelector("#continue");
    continueButton.addEventListener("click", function () {
      clickButtonExplanation++;
      if (clickButtonExplanation === 2) {
        explanation.createExplanation(progressTextDiv, clickButtonExplanation);
      } else if (clickButtonExplanation === 3) {
        explanation.createExplanation(progressTextDiv, clickButtonExplanation);
      } else if (clickButtonExplanation === 4) {
        explanation.createExplanation(progressTextDiv, clickButtonExplanation);
      }
    });

    explanation.createExplanation(progressTextDiv, 1);
    const answerJson = document.querySelector("#answer");
    const answer = JSON.parse(answerJson.innerHTML.replace(/&quot;/g, '"').replace(/&#039;/g, "'"));

    const nameJson = document.querySelector("#name");
    const name = JSON.parse(nameJson.innerHTML.replace(/&quot;/g, '"').replace(/&#039;/g, "'"));

    const questionJson = document.querySelector("#question");
    const question = JSON.parse(questionJson.innerHTML.replace(/&quot;/g, '"').replace(/&#039;/g, "'"));

    const answerDiv = document.createElement("div");
    answerDiv.setAttribute("id", "answer");

    const questionDiv = document.createElement("div");

    let clickAnswerCounter = 0;
    answerDiv.addEventListener("click", function () {
      clickAnswerCounter++;
      progressTextDiv.appendChild(questionDiv);
      if (clickAnswerCounter === 1) {
        questionDiv.textContent = question[1].text;
        Object.entries(question[1].answers).map((answer) => {
          let answerSubDiv = document.createElement("div");
          answerSubDiv.textContent = answer[1].text;
          answerDiv.appendChild(answerSubDiv);
        });
      } else if (clickAnswerCounter === 2) {
        questionDiv.textContent = question[2].text;
        Object.entries(question[2].answers).map((answer) => {
          let answerSubDiv = document.createElement("div");
          answerSubDiv.textContent = answer[1].text;
          answerDiv.appendChild(answerSubDiv);
        });
      } else if (clickAnswerCounter === 3) {
        questionDiv.textContent = question[3].text;
        console.log("question : ", question[3].text);
        Object.entries(question[3].answers).map((answer) => {
          let answerSubDiv = document.createElement("div");
          answerSubDiv.textContent = answer[1].text;
          answerDiv.appendChild(answerSubDiv);
        });
      } else if (clickAnswerCounter === 4) {
        questionDiv.textContent = question[4].text;
        Object.entries(question[4].answers).map((answer) => {
          let answerSubDiv = document.createElement("div");
          answerSubDiv.textContent = answer[1].text;
          answerDiv.appendChild(answerSubDiv);
        });
      } else if (clickAnswerCounter === 5) {
        questionDiv.textContent = question[5].text;
        Object.entries(question[5].answers).map((answer) => {
          let answerSubDiv = document.createElement("div");
          answerSubDiv.textContent = answer[1].text;
          answerDiv.appendChild(answerSubDiv);
        });
      }
    });
  },
};

document.addEventListener("DOMContentLoaded", app.init);
