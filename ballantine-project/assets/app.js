const app = {
  init: () => {
    const answerJson = document.querySelector("#answer");
    const answer = JSON.parse(answerJson.innerHTML.replace(/&quot;/g, '"'));

    const explanationJson = document.querySelector("#explanation");
    const explanation = JSON.parse(explanationJson.innerHTML.replace(/&quot;/g, '"'));

    const nameJson = document.querySelector("#name");
    const name = JSON.parse(nameJson.innerHTML.replace(/&quot;/g, '"'));

    const questionJson = document.querySelector("#question");
    const question = JSON.parse(questionJson.innerHTML.replace(/&quot;/g, '"'));
    
    console.log(answer);
    console.log(explanation);
    console.log(name);
    console.log(question);

    

    const audio = document.getElementById("audio");
    document.addEventListener("click", function () {
      audio.play();
    });
  },
};

document.addEventListener("DOMContentLoaded", app.init);
