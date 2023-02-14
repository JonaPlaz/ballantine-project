export const audio = {
  getAudio: (element, frame) => {
    const audioName = element.audio.link;
    const audioOne = document.createElement('audio');
    const audioTwo = document.createElement('audio');
    // Uncaught (in promise) DOMException: play() failed because the user didn't interact with the document first
    switch (audioName) {
      case "/audio/stage/audio_001.mp3":
        audioOne.src = audioName;
        audioOne.setAttribute('id', 'audio');
        frame.appendChild(audioOne);
        audioOne.loop = true;
        audioOne.play();
        audioTwo.pause();
        break;
      case "/audio/stage/audio_002.mp3":
        audioTwo.src = audioName;
        audioTwo.setAttribute('id', 'audio');
        frame.appendChild(audioTwo);
        audioTwo.loop = true;
        audioTwo.play();
        audioOne.pause();
        break;
    }
  },
};