(()=>{var e={377:()=>{},775:()=>{},539:()=>{}},s={};function t(r){var i=s[r];if(void 0!==i)return i.exports;var n=s[r]={exports:{}};return e[r](n,n.exports,t),n.exports}(()=>{"use strict";t(377),t(775),t(539),document.addEventListener("DOMContentLoaded",(()=>{!function(){const e=document.querySelectorAll("swiper-container.wp-block-gallery.is-style-px-slider");e&&e.forEach((e=>{const s=e.getAttribute("class").match(/columns-(\d)/),t=s?parseInt(s[1],10):3,r={slidesPerView:1.3,slidesPerGroup:1,loop:!0,spaceBetween:20,navigation:!1,pagination:{enabled:!0,clickable:!0},breakpoints:{480:{slidesPerView:2.3,slidesPerGroup:2},768:{slidesPerView:t,slidesPerGroup:t}}};Object.assign(e,r),e.initialize()}))}()}))})()})();