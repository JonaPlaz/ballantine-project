export const audio = {
  getAudio: (element, frame) => {
    const audioName = element.audio.link;
    const audio = document.createElement('audio');
    // Uncaught (in promise) DOMException: play() failed because the user didn't interact with the document first
    audio.src = audioName;
    audio.setAttribute('id', 'audio');
    frame.appendChild(audio);
    audio.loop = true;
    audio.play();
  },
};