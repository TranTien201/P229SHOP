
function initMap() {
   //Your location
   const loc = { lat: 16.040939, lng: 108.238808 };
   // Centered map on location
   const map = new google.maps.Map(document.querySelector('.map'), {
       zoom: 14,
       center: loc
   });
   // The marker, positioned at location
   const marker = new google.maps.Marker({ position: loc, map: map });
}

window.addEventListener("scroll", function(){
   var toggle_btn = document.querySelector("#toggle-btnn");
   var myDiv = document.querySelector("#myDiv");
   toggle_btn.classList.toggle("sticky", window.scrollY > 50 );
   myDiv.classList.toggle("sticky", window.scrollY > 50 ); 
});
//Map

//
let map;

function initMap() {
  map = new google.maps.Map(document.getElementById("map"), {
    center: {lat: 16.463713, lng: 107.590866},
    zoom: 8,
  });



  addMarker({lat: 16.463713, lng: 107.590866});

  function addMarker(coords) {
      var marker = new google.maps.Marker({
          position: coords,
          map: map,
          
      })
  }
}

const toggleBtn = document.querySelector('#toggle-btn'),
      fixed = document.querySelector('.fixed'),
      active = document.querySelector('.active'),
      close = document.querySelector('.close1'),
      // nav_s = document.querySelector('.nav-s'),
      toggleBtnn = document.querySelector('#toggle-btnn');

active.onclick = () => {
  fixed.classList.toggle('active');
}
close.onclick = () => {
  fixed.classList.toggle('active');
}

toggleBtnn.ondblclick = () => {
  nav_s.classList.toggle('active')
  toggleBtnn.classList.toggle('shown');
}


window.addEventListener('DOMContentLoaded', function(){
  const wrapper = document.getElementById('wrapper1');
  let top = document.querySelector('.top1');
  let mouse = document.querySelector('.mouse1');
  let skew = 0;
  let delta = 0;
  if(wrapper.className.indexOf('skewed')!= -1) {
    skew = 1000;
  }
  wrapper.addEventListener('mousemove', function(e){
    delta = (e.clientX - window.innerWidth/2)*0.5;
    mouse.style.left = e.clientX + delta + 'px';
    top.style.width = e.clientX + skew + delta + 'px';
  })
});
window.addEventListener('DOMContentLoaded', function(){
  const wrapper = document.getElementById('wrapper2');
  let top = document.querySelector('.top2');
  let mouse = document.querySelector('.mouse2');
  let skew = 0;
  let delta = 0;
  if(wrapper.className.indexOf('skewed')!= -1) {
    skew = 1000;
  }
  wrapper.addEventListener('mousemove', function(e){
    delta = (e.clientX - window.innerWidth/2)*0.5;
    mouse.style.left = e.clientX + delta + 'px';
    top.style.width = e.clientX + skew + delta + 'px';
  })
});
window.addEventListener('DOMContentLoaded', function(){
  const wrapper = document.getElementById('wrapper3');
  let top = document.querySelector('.top3');
  let mouse = document.querySelector('.mouse3');
  let skew = 0;
  let delta = 0;
  if(wrapper.className.indexOf('skewed')!= -1) {
    skew = 1000;
  }
  wrapper.addEventListener('mousemove', function(e){
    delta = (e.clientX - window.innerWidth/2)*0.5;
    mouse.style.left = e.clientX + delta + 'px';
    top.style.width = e.clientX + skew + delta + 'px';
  })
});
window.addEventListener('DOMContentLoaded', function(){
  const wrapper = document.getElementById('wrapper4');
  let top = document.querySelector('.top4');
  let mouse = document.querySelector('.mouse4');
  let skew = 0;
  let delta = 0;
  if(wrapper.className.indexOf('skewed')!= -1) {
    skew = 1000;
  }
  wrapper.addEventListener('mousemove', function(e){
    delta = (e.clientX - window.innerWidth/2)*0.5;
    mouse.style.left = e.clientX + delta + 'px';
    top.style.width = e.clientX + skew + delta + 'px';
  })
});

// function add_to_cart() {
//   const btn_add_pro = document.querySelectorAll('.btn_add_pro');

//   btn_add_pro.forEach(button => {
//     button.addEventListener('click', cartClick);
//   });

//   function cartClick() {
//     let button = this;
//     button.classList.add('clicked');
//   }
// }

// add_to_cart();
function menu()
{
  const hambuger = document.querySelector('.hambuger_container');
  console.log(123);
  const menu = document.querySelector('.hambuger_menu');

  hambuger.onclick = () => {
    menu.classList.toggle('active');
  }

  
}
menu();

