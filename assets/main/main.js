// import myMegaMenu from './_mega-menu';
import './main.sass';

/**
 * This is for general listeners
 */
const myApp = {
  init() {
    // do something
  },
};

function onReady() {
  myApp.init();
  // myAnimation.init();

  // myMegaMenu.init();
}

function onLoad() {
  // script that runs when everything is loaded
}

document.addEventListener('DOMContentLoaded', onReady);
window.addEventListener('load', onLoad);
