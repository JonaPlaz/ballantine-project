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

    const explanationDiv = document.createElement("div");
    const answerDiv = document.createElement("div");

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
        answerDiv.textContent = answer[0].text;
        progressTextDiv.appendChild(answerDiv);
      }
    });
  },
};

document.addEventListener("DOMContentLoaded", app.init);
