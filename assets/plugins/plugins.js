import mySwiper from './_swiper';
// import myAnimation from './_animation';

import './plugins.sass';

function onReady() {
  mySwiper.init();
  // myAnimation.init();
}

function onLoad() {
  // script that runs when everything is loaded
}

document.addEventListener('DOMContentLoaded', onReady);
window.addEventListener('load', onLoad);
