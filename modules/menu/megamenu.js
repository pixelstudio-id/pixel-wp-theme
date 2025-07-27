import './megamenu.sass';

function initMegamenu() {
  // Toggle listener for mega menu in offcanvas
  const $itemLinks = document.querySelectorAll('.offcanvas .menu-item-has-megamenu > a');
  $itemLinks.forEach(($link) => {
    $link.addEventListener('click', (e) => {
      e.preventDefault();

      const $wrapper = e.currentTarget.closest('.menu-item');
      $wrapper.classList.toggle('is-open');
    });
  });
}

document.addEventListener('DOMContentLoaded', () => {
  initMegamenu();
});
