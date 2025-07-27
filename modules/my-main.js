import './my-main.sass';

import './swiper/view.sass';

import './css-framework/normalize.sass';
import './css-framework/utilities.sass';
import './css-framework/fields.sass';
import './css-framework/grid.sass';
// import './css-framework/widgets.sass';

import './blog/blog.sass';
import './blog/blog-comments.sass';

import './menu/menu.sass';
import './menu/megamenu';

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
}

function onLoad() {
  // script that runs when everything is loaded
}

document.addEventListener('DOMContentLoaded', onReady);
window.addEventListener('load', onLoad);
