const search_input = document.querySelector('#search-input');
search_input.addEventListener('change', (e) => {
    console.log('[SearchInput]', e)
});

var SpeechRecognition = SpeechRecognition || webkitSpeechRecognition;

const recognition = new SpeechRecognition();
const synth = window.speechSynthesis;
recognition.lang = 'vi-VI';
recognition.continuous = false;

const microphone = document.querySelector('.microphone');

const handleVoice = (text) => {
    console.log('text', text);

    const inputText = text;
    console.log(inputText);
    search_input.value = inputText; 
}

microphone.addEventListener('click', (e) => {
    e.preventDefault();

    recognition.start();
    microphone.classList.add('recording');
});

// hoàn thành việc nc
recognition.onspeechend = () => {
    recognition.stop();
    microphone.classList.remove('recording');
}
// có lỗi xảy ra
recognition.onerror = (err) => {
    console.log(err)
    microphone.classList.remove('recording');
}

recognition.onresult = (e) => {
    console.log('onresult', e);
    const text = e.results[0][0].transcript;
    handleVoice(text);
}
