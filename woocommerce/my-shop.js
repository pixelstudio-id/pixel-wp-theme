import './my-shop.sass';

const myCart = {
  init() {
    this.bottomBar();
  },

  /**
   * Listeners for the Bottom Bar in mobile
   */
  bottomBar() {
    const $toggles = document.querySelectorAll('.product-bar form');
    $toggles.forEach(($t) => {
      $t.addEventListener('click', openBar);
    });

    function openBar(e) {
      e.stopPropagation();
      const $form = e.currentTarget;

      if (!$form.classList.contains('is-toggled')) {
        e.preventDefault();
        $form.classList.add('is-toggled');
      }
    }
  },
};

// const mySlider = {
//   init() {
//     const $sliders = document.querySelectorAll('.wc-block-grid.is-style-my-slider');

//     $sliders.forEach(($slider) => {
//       // abort if Related Product section and on desktop
//       if ($slider.closest('.product-related') && window.innerWidth >= 768) {
//         return;
//       }

//       const hasColumns = $slider.getAttribute('class').match(/has-(\d)-columns/);
//       const columns = hasColumns[1] ? parseInt(hasColumns[1], 10) : 3;

//       const $wrapper = $slider.querySelector('.wc-block-grid__products');
//       $wrapper.classList.add('swiper-wrapper');

//       // TODO: .wc-block-grid__products should be the swiper-wrapper, not create new one
//       initSwiper($slider, {
//         slideClass: 'wc-block-grid__product',
//         loop: true,
//         slidesPerView: 2,
//         slidesPerGroup: 2,
//         pagination: true,
//         navigation: true,
//         breakpoints: {
//           // when window width is >= 768px
//           768: {
//             slidesPerView: columns,
//             slidesPerGroup: columns,
//           },
//         },
//       });
//     });
//   },
// };

const myVariation = {
  init() {
    const $form = document.querySelector('form.variations_form');

    // Change the big price
    if ($form) {
      window.jQuery($form).on('found_variation', (e, variation) => {
        const $price = document.querySelector('.product-summary .price');
        const newPrice = variation.price_html
          .replace(/^<span class="price">/g, '')
          .replace(/<\/span>$/g, '');
        $price.innerHTML = newPrice;
      });
    }
  },
};

function onReady() {
  myCart.init();
  // mySlider.init();
  myVariation.init();
}

function onLoad() {
  // script that runs when everything is loaded
}

document.addEventListener('DOMContentLoaded', onReady);
window.addEventListener('load', onLoad);
