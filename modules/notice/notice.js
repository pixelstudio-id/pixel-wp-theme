import './notice.sass';

function closeNotice() {
  const $notice = document.querySelector('.notice');
  if (!$notice) { return; }

  const $closeButton = $notice.querySelector('.notice__close');

  $closeButton.addEventListener('click', (e) => {
    e.preventDefault();
    const maxAge = 30 * 24 * 60 * 60;
    document.cookie = `my_notice_closed=1; path=/; max-age=${maxAge}`;
    $notice.style.display = 'none';
  });
}

document.addEventListener('DOMContentLoaded', () => {
  closeNotice();
});
