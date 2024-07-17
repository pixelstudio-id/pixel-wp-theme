import Swiper, { Navigation, Pagination } from 'swiper';

export function initSwiper($wrapper, rawArgs) {
  const args = {
    slideClass: 'wp-block-image',
    slidesPerView: 1,
    spaceBetween: 20,
    pagination: true,
    navigation: true,
    createElements: true,
    modules: [],
    ...rawArgs,
  };

  // Add necessary classes
  $wrapper.classList.add('swiper');

  const $slides = $wrapper.querySelectorAll(`.${args.slideClass}`);
  $slides.forEach(($s) => {
    $s.classList.add('swiper-slide');
  });

  if (args.pagination) {
    // Create pagination element
    const $pagination = document.createElement('div');
    $pagination.classList.add('swiper-pagination');
    $wrapper.appendChild($pagination);

    args.modules.push(Pagination);
    args.pagination = {
      el: '.swiper-pagination',
      clickable: true,
      ...args.pagination,
    };
  }

  if (args.navigation) {
    args.modules.push(Navigation);
  }

  const swiper = new Swiper($wrapper, args);
}

export default {
  init() {
    this.gallerySlider();
  },
  /**
   * Turn Gallery into a slider based on its columns
   */
  gallerySlider() {
    const $sliders = document.querySelectorAll('.wp-block-gallery.is-style-px-slider');

    $sliders.forEach(($slider) => {
      const matchColumns = $slider.getAttribute('class').match(/columns-(\d)/);
      const columns = matchColumns ? parseInt(matchColumns[1], 10) : 1;

      initSwiper($slider, {
        slideClass: 'wp-block-image',
        slidesPerView: columns,
        slidesPerGroup: columns,
        loop: true,
        pagination: true,
        navigation: true,
      });
    });
  },
};