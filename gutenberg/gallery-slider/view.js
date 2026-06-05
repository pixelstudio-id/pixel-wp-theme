import './view.sass';

function initGallerySlider() {
  const $sliders = document.querySelectorAll('swiper-container.wp-block-gallery.is-style-px-slider');
  if (!$sliders) { return; }

  $sliders.forEach(($slider) => {
    const matchColumns = $slider.getAttribute('class').match(/columns-(\d)/);
    const columns = matchColumns ? parseInt(matchColumns[1], 10) : 3;

    // swiper parameters
    const params = {
      slidesPerView: 1.3,
      slidesPerGroup: 1,
      loop: true,
      spaceBetween: 20,
      navigation: true,
      pagination: {
        enabled: true,
        clickable: true,
      },
      breakpoints: {
        480: {
          slidesPerView: 2.3,
          slidesPerGroup: 2,
        },
        768: {
          slidesPerView: columns,
          slidesPerGroup: columns,
        },
      },
      // hide the ugly default arrow and replace it via CSS
      injectStyles: [`
        svg { display: none; }
      `],
    };

    Object.assign($slider, params);
    $slider.initialize();
  });
}

document.addEventListener('DOMContentLoaded', () => {
  initGallerySlider();
});
