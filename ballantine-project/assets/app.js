const app = {
  init: () => {
    var audio = document.getElementById("audio");
    document.addEventListener("click", function () {
      audio.play()
    });
  },
};

document.addEventListener("DOMContentLoaded", app.init);
