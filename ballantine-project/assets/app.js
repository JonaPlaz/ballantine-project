const app = {
  init: () => {
    const answerJson = document.querySelector("#answer");
    const answer = JSON.parse(answerJson.innerHTML.replace(/&quot;/g, '"').replace(/&#039;/g, "'"));

    const explanationJson = document.querySelector("#explanation");
    const explanation = JSON.parse(explanationJson.innerHTML.replace(/&quot;/g, '"').replace(/&#039;/g, "'"));

    const nameJson = document.querySelector("#name");
    const name = JSON.parse(nameJson.innerHTML.replace(/&quot;/g, '"').replace(/&#039;/g, "'"));

    const questionJson = document.querySelector("#question");
    const question = JSON.parse(questionJson.innerHTML.replace(/&quot;/g, '"').replace(/&#039;/g, "'"));

    const progressTextDiv = document.querySelector("#progressText");

    const audio1 = document.getElementById("audio1");
    const audio2 = document.getElementById("audio2");
    document.addEventListener("click", function () {
      audio1.play();
    });

    const answerDiv = document.createElement("div");
    answerDiv.setAttribute("id", "answer");

    const questionDiv = document.createElement("div");

    const explanationDiv = document.createElement("div");
    explanationDiv.textContent = explanation[0].text;
    progressTextDiv.appendChild(explanationDiv);

    const continueButton = document.createElement("button");
    continueButton.setAttribute("id", "continue");
    continueButton.textContent = "continue";
    progressTextDiv.appendChild(continueButton);

    let clickCounter = 0;
    continueButton.addEventListener("click", function () {
      clickCounter++;
      if (clickCounter === 1) {
        audio1.pause();
        audio2.play();
        explanationDiv.textContent = explanation[1].text;
      } else if (clickCounter === 2) {
        audio2.pause();
        audio1.play();
        explanationDiv.textContent = explanation[2].text;
      } else if (clickCounter === 3) {
        explanationDiv.remove();
        continueButton.remove();
        progressTextDiv.appendChild(answerDiv);
        let answerSubDiv = document.createElement("div");
        answerSubDiv.textContent = answer[0].text;
        answerDiv.appendChild(answerSubDiv);
      }
    });
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
