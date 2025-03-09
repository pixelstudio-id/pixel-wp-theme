// import myMegaMenu from './_mega-menu';
import './my-main.sass';

import './swiper/view.sass';

import './components/normalize.sass';
import './components/utilities.sass';
import './components/fields.sass';
import './components/grid.sass';
import './components/widgets.sass';

import './blog/post.sass';
import './blog/post-comments.sass';

import './menu/menu.sass';

// import './plugins/animation';
// import './plugins/cf7.sass';
// import './plugins/jetpack.sass';

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
  // myMegaMenu.init();
}

function onLoad() {
  // script that runs when everything is loaded
}

document.addEventListener('DOMContentLoaded', onReady);
window.addEventListener('load', onLoad);
