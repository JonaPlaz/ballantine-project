export const dialog = {
  // création d'un dialogue entre le héro et sa conscience
  createDialog: (progressTextDiv, id) => {
    // index représente l'index du tableau des explanation, donc l'id de l'object appelé - 1
    const index = id - 1;
    // on récupère ici les questions et les réponse liées grâce au chainage
    const questionJson = document.querySelector("#question");
    const question = JSON.parse(questionJson.innerHTML.replace(/&quot;/g, '"').replace(/&#039;/g, "'"));

    // si le selecteur p et la div n'existent pas, on les place en tant qu'enfant de progressTextDiv
    const questionDialogParagraph = document.querySelector("#question_dialog");
    const answersDialogDiv = document.querySelector("#answer_dialog");
    if (questionDialogParagraph === null || answersDialogDiv === null) {
      // on prépare la création d'un selecteur pour la question et les réponses
      const questionParagraph = document.createElement("p");
      questionParagraph.setAttribute("id", "question_dialog");
      progressTextDiv.appendChild(questionParagraph);
      questionParagraph.textContent = question[index].text;

      const answersDiv = document.createElement("div");
      answersDiv.setAttribute("id", "answer_dialog");
      progressTextDiv.appendChild(answersDiv);
      // TODO a l'intérieur de la div on affiche les réponses. si answers est empty alors on affiche ... à clicker
      // TODO à chaque nouvelle question, on remove les paragraphes avec les réponses et on en crée de nouveaux avec les nouvelles réponses car il n'y a pas forcément le même nombre de réponse pour une question
    } else {
      // sinon on remplace le texte de la question
      questionDialogParagraph.textContent = question[index].text;
    }
  },
};
