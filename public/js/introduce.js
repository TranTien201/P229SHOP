const toturial = document.querySelector('.toturial');
const intro = introJs();
var arr = ['Welcome to our store', 'Double click this button to use the menu','Log in to use other functions','This is a product of the shop inside with the necessary information', 'Thank you for listening'];

console.log(2);
let i =0;
intro.setOptions({       
    steps: [{
      title: 'Welcome',
      intro: 'Welcome to our store',
      
    },
    {
      element: document.querySelector('#toggle-btnn'),
      intro: 'Double click this button to use the menu',
      position : 'right',
    },
    {
      element: document.querySelector('.login'),
      intro: 'Log in to use other functions',
      position : 'right',
    },
    {
      element: document.querySelector('.box'),
      intro: 'This is a product of the shop inside with the necessary information',
      position : 'right',
    },
    {
      title: 'Farewell!',
      intro: 'Thank you for listening'
    }]
  })
toturial.onclick = () => {
    intro.start();
    i= 0;
    playText(arr[i]);
    console.log(arr[i]);
    
       const introjs_nextbutton = document.querySelector('.introjs-nextbutton');
    //   const introjs_tooltiptext = document.querySelector('.introjs-tooltiptext').innerHTML;
    // //   console.log(introjs_tooltiptext);
    //   const utterance = new SpeechSynthesisUtterance(introjs_tooltiptext);
    //   speechSynthesis.speak(utterance);
      introjs_nextbutton.addEventListener('click', function() {
        if(i<arr.length) {
          i++;
          playText(arr[i]);
          console.log(arr[i]);
        }
        else {
          i= 0;
        }
      })

    //     const introjs_tooltiptext = document.querySelector('.introjs-tooltiptext').innerText;
    //     console.log(introjs_tooltiptext);
    //   }
    //   introjs_nextbutton.addEventListener('click', function(){
    //       const introjs_tooltiptext = document.querySelector('.introjs-tooltiptext').innerText;
    //       console.log(introjs_tooltiptext);
    //   });
    //   function myFunction() {
    //     const introjs_tooltiptext = document.querySelector('.introjs-tooltiptext').innerText;
    //     console.log(introjs_tooltiptext);
    //   }
       function playText(text) {
           const utterance = new SpeechSynthesisUtterance(text);
           utterance.rate = 0.75;
    
           utterance.lang = 'en-US';  
           speechSynthesis.speak(utterance);
       }
}


