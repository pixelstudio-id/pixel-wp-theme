<?php

add_filter( 'custy_svg_list', function( $list ) {

  // BACK TO TOP Arrows
  $list[ 'arrow-up' ] = '<svg width="30" height="27" viewBox="0 0 448 512"><path d="M6.101 261.899L25.9 281.698c4.686 4.686 12.284 4.686 16.971 0L198 126.568V468c0 6.627 5.373 12 12 12h28c6.627 0 12-5.373 12-12V126.568l155.13 155.13c4.686 4.686 12.284 4.686 16.971 0l19.799-19.799c4.686-4.686 4.686-12.284 0-16.971L232.485 35.515c-4.686-4.686-12.284-4.686-16.971 0L6.101 244.929c-4.687 4.686-4.687 12.284 0 16.97z"/></svg>';

  $list[ 'arrow-up-angle' ] = '<svg width="30" height="27" viewBox="0 0 448 512"><path d="M6.101 359.293L25.9 379.092c4.686 4.686 12.284 4.686 16.971 0L224 198.393l181.13 180.698c4.686 4.686 12.284 4.686 16.971 0l19.799-19.799c4.686-4.686 4.686-12.284 0-16.971L232.485 132.908c-4.686-4.686-12.284-4.686-16.971 0L6.101 342.322c-4.687 4.687-4.687 12.285 0 16.971z"/></svg>';

  $list[ 'arrow-up-caret' ] = '<svg width="50" height="30" viewBox="0 0 320 512"><path d="M288.662 352H31.338c-17.818 0-26.741-21.543-14.142-34.142l128.662-128.662c7.81-7.81 20.474-7.81 28.284 0l128.662 128.662c12.6 12.599 3.676 34.142-14.142 34.142z"/></svg>';

  // BLOG POSTS
  $list['posts-default'] = '<svg id="Layer_1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 70"><style>.st2{fill:#c3c7ca}.st3{fill:#e6e7e8}</style><path d="M13 73.5c-1.4 0-2.5-1.1-2.5-2.5V13c0-1.4 1.1-2.5 2.5-2.5h74c1.4 0 2.5 1.1 2.5 2.5v58c0 1.4-1.1 2.5-2.5 2.5H13z" fill="#fff"/><path d="M87 11c1.1 0 2 .9 2 2v58c0 1.1-.9 2-2 2H13c-1.1 0-2-.9-2-2V13c0-1.1.9-2 2-2h74m0-1H13c-1.7 0-3 1.3-3 3v58c0 1.7 1.3 3 3 3h74c1.6 0 3-1.3 3-3V13c0-1.7-1.4-3-3-3z" fill="#565d66"/><path class="st2" d="M38.5 32h-16c-.3 0-.5-.2-.5-.5v-15c0-.3.2-.5.5-.5h16c.3 0 .5.2.5.5v15c0 .3-.2.5-.5.5zM61.6 20H44c-.5 0-.9-.5-.9-1s.4-1 .9-1h17.7c.5 0 .9.5.9 1s-.4 1-1 1z"/><path class="st3" d="M77.6 25h-34c-.3 0-.5-.2-.5-.5s.2-.5.5-.5h34c.3 0 .5.2.5.5s-.2.5-.5.5zM77.7 28H65.9c-.2 0-.3-.2-.3-.5s.1-.5.3-.5h11.8c.2 0 .3.2.3.5s-.1.5-.3.5zM63.1 28H43.6c-.3 0-.5-.2-.5-.5s.2-.5.5-.5H63c.3 0 .5.2.5.5.1.3-.1.5-.4.5zM57.6 31h-14c-.3 0-.5-.2-.5-.5s.2-.5.5-.5h14c.3 0 .5.2.5.5s-.2.5-.5.5zM75.3 31H60.4c-.2 0-.4-.2-.4-.5s.2-.5.4-.5h14.8c.2 0 .4.2.4.5.1.3 0 .5-.3.5z"/><path class="st2" d="M38.5 52h-16c-.3 0-.5-.2-.5-.5v-15c0-.3.2-.5.5-.5h16c.3 0 .5.2.5.5v15c0 .3-.2.5-.5.5zM61.5 40H43.9c-.5 0-.9-.5-.9-1s.4-1 .9-1h17.7c.5 0 .9.5.9 1s-.4 1-1 1z"/><path class="st3" d="M77.5 45h-34c-.3 0-.5-.2-.5-.5s.2-.5.5-.5h34c.3 0 .5.2.5.5s-.2.5-.5.5zM77.7 48H65.8c-.2 0-.3-.2-.3-.5s.1-.5.3-.5h11.8c.2 0 .3.2.3.5.1.3 0 .5-.2.5zM63 48H43.5c-.3 0-.5-.2-.5-.5s.2-.5.5-.5h19.4c.3 0 .5.2.5.5.1.3-.1.5-.4.5zM57.5 51h-14c-.3 0-.5-.2-.5-.5s.2-.5.5-.5h14c.3 0 .5.2.5.5s-.2.5-.5.5zM75.3 51H60.4c-.2 0-.4-.2-.4-.5s.2-.5.4-.5h14.8c.2 0 .4.2.4.5.1.3 0 .5-.3.5z"/><path class="st2" d="M38.5 72h-16c-.3 0-.5-.2-.5-.5v-15c0-.3.2-.5.5-.5h16c.3 0 .5.2.5.5v15c0 .3-.2.5-.5.5zM61.5 60H43.9c-.5 0-.9-.5-.9-1s.4-1 .9-1h17.7c.5 0 .9.5.9 1s-.4 1-1 1z"/><path class="st3" d="M77.5 65h-34c-.3 0-.5-.2-.5-.5s.2-.5.5-.5h34c.3 0 .5.2.5.5s-.2.5-.5.5zM77.7 68H65.8c-.2 0-.3-.2-.3-.5s.1-.5.3-.5h11.8c.2 0 .3.2.3.5.1.3 0 .5-.2.5zM63 68H43.5c-.3 0-.5-.2-.5-.5s.2-.5.5-.5h19.4c.3 0 .5.2.5.5.1.3-.1.5-.4.5zM57.5 71h-14c-.3 0-.5-.2-.5-.5s.2-.5.5-.5h14c.3 0 .5.2.5.5s-.2.5-.5.5zM75.3 71H60.4c-.2 0-.4-.2-.4-.5s.2-.5.4-.5h14.8c.2 0 .4.2.4.5.1.3 0 .5-.3.5z"/></svg>';

  $list['posts-grid'] = '<svg id="Layer_1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 70"><style>.st2{fill:#c3c7ca}.st3{fill:#e6e7e8}</style><path d="M13 73.5c-1.4 0-2.5-1.1-2.5-2.5V13c0-1.4 1.1-2.5 2.5-2.5h74c1.4 0 2.5 1.1 2.5 2.5v58c0 1.4-1.1 2.5-2.5 2.5H13z" fill="#fff"/><path d="M87 11c1.1 0 2 .9 2 2v58c0 1.1-.9 2-2 2H13c-1.1 0-2-.9-2-2V13c0-1.1.9-2 2-2h74m0-1H13c-1.7 0-3 1.3-3 3v58c0 1.7 1.3 3 3 3h74c1.6 0 3-1.3 3-3V13c0-1.7-1.4-3-3-3z" fill="#565d66"/><path class="st2" d="M38.5 32h-16c-.3 0-.5-.2-.5-.5v-15c0-.3.2-.5.5-.5h16c.3 0 .5.2.5.5v15c0 .3-.2.5-.5.5zM58 32H42c-.3 0-.5-.2-.5-.5v-15c0-.3.2-.5.5-.5h16c.3 0 .5.2.5.5v15c0 .3-.2.5-.5.5zM38 38H23c-.5 0-1-.5-1-1s.4-1 1-1h15c.5 0 1 .5 1 1s-.5 1-1 1z"/><path class="st3" d="M38.5 42h-16c-.3 0-.5-.2-.5-.5s.2-.5.5-.5h16c.3 0 .5.2.5.5s-.2.5-.5.5zM38.5 45h-16c-.3 0-.5-.2-.5-.5s.2-.5.5-.5h16c.3 0 .5.2.5.5s-.2.5-.5.5z"/><path class="st2" d="M77.5 32h-16c-.3 0-.5-.2-.5-.5v-15c0-.3.2-.5.5-.5h16c.3 0 .5.2.5.5v15c0 .3-.2.5-.5.5zM57.5 38h-15c-.5 0-1-.5-1-1s.5-1 1-1h15c.5 0 1 .5 1 1s-.5 1-1 1z"/><path class="st3" d="M58 42H42c-.3 0-.5-.2-.5-.5s.2-.5.5-.5h16c.3 0 .5.2.5.5s-.2.5-.5.5zM58 45H42c-.3 0-.5-.2-.5-.5s.2-.5.5-.5h16c.3 0 .5.2.5.5s-.2.5-.5.5z"/><path class="st2" d="M77 38H62c-.5 0-1-.5-1-1s.5-1 1-1h15c.6 0 1 .5 1 1s-.4 1-1 1z"/><path class="st3" d="M77.5 42h-16c-.3 0-.5-.2-.5-.5s.2-.5.5-.5h16c.3 0 .5.2.5.5s-.2.5-.5.5zM77.5 45h-16c-.3 0-.5-.2-.5-.5s.2-.5.5-.5h16c.3 0 .5.2.5.5s-.2.5-.5.5z"/><path class="st2" d="M38.5 65h-16c-.3 0-.5-.2-.5-.5v-15c0-.3.2-.5.5-.5h16c.3 0 .5.2.5.5v15c0 .3-.2.5-.5.5zM58 65H42c-.3 0-.5-.2-.5-.5v-15c0-.3.2-.5.5-.5h16c.3 0 .5.2.5.5v15c0 .3-.2.5-.5.5zM38 71H23c-.5 0-1-.4-1-1s.4-1 1-1h15c.5 0 1 .4 1 1s-.5 1-1 1z"/><path class="st3" d="M38.5 75h-16c-.3 0-.5-.2-.5-.5s.2-.5.5-.5h16c.3 0 .5.2.5.5s-.2.5-.5.5zM38.5 78h-16c-.3 0-.5-.2-.5-.5s.2-.5.5-.5h16c.3 0 .5.2.5.5s-.2.5-.5.5z"/><path class="st2" d="M77.5 65h-16c-.3 0-.5-.2-.5-.5v-15c0-.3.2-.5.5-.5h16c.3 0 .5.2.5.5v15c0 .3-.2.5-.5.5zM57.5 71h-15c-.5 0-1-.4-1-1s.5-1 1-1h15c.5 0 1 .4 1 1s-.5 1-1 1z"/><path class="st3" d="M58 75H42c-.3 0-.5-.2-.5-.5s.2-.5.5-.5h16c.3 0 .5.2.5.5s-.2.5-.5.5zM58 78H42c-.3 0-.5-.2-.5-.5s.2-.5.5-.5h16c.3 0 .5.2.5.5s-.2.5-.5.5z"/><path class="st2" d="M77 71H62c-.5 0-1-.4-1-1s.5-1 1-1h15c.6 0 1 .4 1 1s-.4 1-1 1z"/><path class="st3" d="M77.5 75h-16c-.3 0-.5-.2-.5-.5s.2-.5.5-.5h16c.3 0 .5.2.5.5s-.2.5-.5.5zM77.5 78h-16c-.3 0-.5-.2-.5-.5s.2-.5.5-.5h16c.3 0 .5.2.5.5s-.2.5-.5.5z"/></svg>';


  // ARCHIVE SIDEBAR
  $list['sidebar-left'] = '<svg id="Layer_1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 70"><style>.st2{opacity:.9;fill:#e6e7e8;enable-background:new}</style><path d="M13 73.5c-1.4 0-2.5-1.1-2.5-2.5V13c0-1.4 1.1-2.5 2.5-2.5h74c1.4 0 2.5 1.1 2.5 2.5v58c0 1.4-1.1 2.5-2.5 2.5H13z" fill="#fff"/><path d="M87 11c1.1 0 2 .9 2 2v58c0 1.1-.9 2-2 2H13c-1.1 0-2-.9-2-2V13c0-1.1.9-2 2-2h74m0-1H13c-1.7 0-3 1.3-3 3v58c0 1.7 1.3 3 3 3h74c1.6 0 3-1.3 3-3V13c0-1.7-1.4-3-3-3z" fill="#565d66"/><path class="st2" d="M77.5 36h-33c-.3 0-.5-.2-.5-.5v-19c0-.3.2-.5.5-.5h33c.3 0 .5.2.5.5v19c0 .3-.2.5-.5.5zM64.2 41H45c-.5 0-1-.5-1-1s.5-1 1-1h19.2c.6 0 1 .5 1 1s-.4 1-1 1zM77.5 45h-33c-.3 0-.5-.2-.5-.5s.2-.5.5-.5h33c.3 0 .5.2.5.5s-.2.5-.5.5zM77.5 48h-33c-.3 0-.5-.2-.5-.5s.2-.5.5-.5h33c.3 0 .5.2.5.5s-.2.5-.5.5z"/><path d="M39 72H23c-.6 0-1-.4-1-1V17c0-.6.4-1 1-1h16c.6 0 1 .4 1 1v54c0 .6-.4 1-1 1z" fill="#dedfe0"/><path class="st2" d="M77.5 72h-33c-.3 0-.5-.2-.5-.5v-19c0-.3.2-.5.5-.5h33c.3 0 .5.2.5.5v19c0 .3-.2.5-.5.5z"/></svg>';

  $list['sidebar-right'] = '<svg id="Layer_1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 70"><style>.st2{opacity:.9;fill:#e6e7e8;enable-background:new}</style><path d="M13 73.5c-1.4 0-2.5-1.1-2.5-2.5V13c0-1.4 1.1-2.5 2.5-2.5h74c1.4 0 2.5 1.1 2.5 2.5v58c0 1.4-1.1 2.5-2.5 2.5H13z" fill="#fff"/><path d="M87 11c1.1 0 2 .9 2 2v58c0 1.1-.9 2-2 2H13c-1.1 0-2-.9-2-2V13c0-1.1.9-2 2-2h74m0-1H13c-1.7 0-3 1.3-3 3v58c0 1.7 1.3 3 3 3h74c1.6 0 3-1.3 3-3V13c0-1.7-1.4-3-3-3z" fill="#565d66"/><path class="st2" d="M55.5 36h-33c-.3 0-.5-.2-.5-.5v-19c0-.3.2-.5.5-.5h33c.3 0 .5.2.5.5v19c0 .3-.2.5-.5.5zM42.2 41H23c-.5 0-1-.5-1-1s.4-1 1-1h19.3c.5 0 1 .5 1 1-.1.5-.5 1-1.1 1zM55.5 45h-33c-.3 0-.5-.2-.5-.5s.2-.5.5-.5h33c.3 0 .5.2.5.5s-.2.5-.5.5zM55.5 48h-33c-.3 0-.5-.2-.5-.5s.2-.5.5-.5h33c.3 0 .5.2.5.5s-.2.5-.5.5z"/><path d="M77 72H61c-.6 0-1-.4-1-1V17c0-.6.4-1 1-1h16c.6 0 1 .4 1 1v54c0 .6-.4 1-1 1z" fill="#dedfe0"/><path class="st2" d="M55.5 72h-33c-.3 0-.5-.2-.5-.5v-19c0-.3.2-.5.5-.5h33c.3 0 .5.2.5.5v19c0 .3-.2.5-.5.5z"/></svg>';


  // SINGLE POST
  $list['post-narrow'] = '<svg id="Layer_1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 70"><style>.st2{fill:#e6e7e8}</style><path d="M13 73.5c-1.4 0-2.5-1.1-2.5-2.5V13c0-1.4 1.1-2.5 2.5-2.5h74c1.4 0 2.5 1.1 2.5 2.5v58c0 1.4-1.1 2.5-2.5 2.5H13z" fill="#fff"/><path d="M87 11c1.1 0 2 .9 2 2v58c0 1.1-.9 2-2 2H13c-1.1 0-2-.9-2-2V13c0-1.1.9-2 2-2h74m0-1H13c-1.7 0-3 1.3-3 3v58c0 1.7 1.3 3 3 3h74c1.6 0 3-1.3 3-3V13c0-1.7-1.4-3-3-3z" fill="#565d66"/><path class="st2" d="M68.5 13h-37c-.3 0-.5-.2-.5-.5s.2-.5.5-.5h37c.3 0 .5.2.5.5s-.2.5-.5.5zM68.5 16h-37c-.3 0-.5-.2-.5-.5s.2-.5.5-.5h37c.3 0 .5.2.5.5s-.2.5-.5.5zM68.5 19h-37c-.3 0-.5-.2-.5-.5s.2-.5.5-.5h37c.3 0 .5.2.5.5s-.2.5-.5.5zM68.5 40h-37c-.3 0-.5-.2-.5-.5v-18c0-.3.2-.5.5-.5h37c.3 0 .5.2.5.5v18c0 .3-.2.5-.5.5zM68.5 43h-37c-.3 0-.5-.2-.5-.5s.2-.5.5-.5h37c.3 0 .5.2.5.5s-.2.5-.5.5zM68.5 46h-37c-.3 0-.5-.2-.5-.5s.2-.5.5-.5h37c.3 0 .5.2.5.5s-.2.5-.5.5zM68.5 49h-37c-.3 0-.5-.2-.5-.5s.2-.5.5-.5h37c.3 0 .5.2.5.5s-.2.5-.5.5zM45 61H31.5c-.3 0-.5-.2-.5-.5v-9c0-.3.2-.5.5-.5H45c.3 0 .5.2.5.5v9c0 .3-.2.5-.5.5zM68.5 52H48.3c-.3 0-.5-.2-.5-.5s.2-.5.5-.5h20.2c.3 0 .5.2.5.5s-.2.5-.5.5zM68.5 55H48.3c-.3 0-.5-.2-.5-.5s.2-.5.5-.5h20.2c.3 0 .5.2.5.5s-.2.5-.5.5zM68.5 58H48.3c-.3 0-.5-.2-.5-.5s.2-.5.5-.5h20.2c.3 0 .5.2.5.5s-.2.5-.5.5zM68.5 61H48.3c-.3 0-.5-.2-.5-.5s.2-.5.5-.5h20.2c.3 0 .5.2.5.5s-.2.5-.5.5zM68.5 64h-37c-.3 0-.5-.2-.5-.5s.2-.5.5-.5h37c.3 0 .5.2.5.5s-.2.5-.5.5zM68.5 67h-37c-.3 0-.5-.2-.5-.5s.2-.5.5-.5h37c.3 0 .5.2.5.5s-.2.5-.5.5zM68.5 70h-37c-.3 0-.5-.2-.5-.5s.2-.5.5-.5h37c.3 0 .5.2.5.5s-.2.5-.5.5z"/></svg>';

  $list['post-left-sidebar'] = '<svg id="Layer_1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 70"><style>.st3{fill:#e6e7e8}</style><path d="M13 73.5c-1.4 0-2.5-1.1-2.5-2.5V13c0-1.4 1.1-2.5 2.5-2.5h74c1.4 0 2.5 1.1 2.5 2.5v58c0 1.4-1.1 2.5-2.5 2.5H13z" fill="#fff"/><path d="M87 11c1.1 0 2 .9 2 2v58c0 1.1-.9 2-2 2H13c-1.1 0-2-.9-2-2V13c0-1.1.9-2 2-2h74m0-1H13c-1.7 0-3 1.3-3 3v58c0 1.7 1.3 3 3 3h74c1.6 0 3-1.3 3-3V13c0-1.7-1.4-3-3-3z" fill="#565d66"/><path d="M39 72H23c-.6 0-1-.4-1-1V17c0-.6.4-1 1-1h16c.6 0 1 .4 1 1v54c0 .6-.4 1-1 1z" fill="#dedfe0"/><g><path class="st3" d="M77.6 17H44.4c-.3 0-.4-.2-.4-.5s.2-.5.4-.5h33.1c.3 0 .4.2.4.5.1.3-.1.5-.3.5zM77.6 20H44.4c-.3 0-.4-.2-.4-.5s.2-.5.4-.5h33.1c.3 0 .4.2.4.5.1.3-.1.5-.3.5zM77.6 23H44.4c-.3 0-.4-.2-.4-.5s.2-.5.4-.5h33.1c.3 0 .4.2.4.5.1.3-.1.5-.3.5zM77.6 44H44.4c-.3 0-.4-.2-.4-.5v-18c0-.3.2-.5.4-.5h33.1c.3 0 .4.2.4.5v18c.1.3-.1.5-.3.5zM77.6 47H44.4c-.3 0-.4-.2-.4-.5s.2-.5.4-.5h33.1c.3 0 .4.2.4.5.1.3-.1.5-.3.5zM77.6 50H44.4c-.3 0-.4-.2-.4-.5s.2-.5.4-.5h33.1c.3 0 .4.2.4.5.1.3-.1.5-.3.5zM77.6 53H44.4c-.3 0-.4-.2-.4-.5s.2-.5.4-.5h33.1c.3 0 .4.2.4.5.1.3-.1.5-.3.5zM56.5 65H44.4c-.3 0-.4-.2-.4-.5v-9c0-.3.2-.5.4-.5h12.1c.3 0 .4.2.4.5v9c.1.3-.1.5-.4.5zM77.6 56H59.5c-.3 0-.4-.2-.4-.5s.2-.5.4-.5h18.1c.3 0 .4.2.4.5s-.2.5-.4.5zM77.6 59H59.5c-.3 0-.4-.2-.4-.5s.2-.5.4-.5h18.1c.3 0 .4.2.4.5s-.2.5-.4.5zM77.6 62H59.5c-.3 0-.4-.2-.4-.5s.2-.5.4-.5h18.1c.3 0 .4.2.4.5s-.2.5-.4.5zM77.6 65H59.5c-.3 0-.4-.2-.4-.5s.2-.5.4-.5h18.1c.3 0 .4.2.4.5s-.2.5-.4.5zM77.6 68H44.4c-.3 0-.4-.2-.4-.5s.2-.5.4-.5h33.1c.3 0 .4.2.4.5.1.3-.1.5-.3.5zM77.6 71H44.4c-.3 0-.4-.2-.4-.5s.2-.5.4-.5h33.1c.3 0 .4.2.4.5.1.3-.1.5-.3.5zM77.6 74H44.4c-.3 0-.4-.2-.4-.5s.2-.5.4-.5h33.1c.3 0 .4.2.4.5.1.3-.1.5-.3.5z"/></g></svg>';

  $list['post-right-sidebar'] = '<svg id="Layer_1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 70"><style>.st3{fill:#e6e7e8}</style><path d="M13 73.5c-1.4 0-2.5-1.1-2.5-2.5V13c0-1.4 1.1-2.5 2.5-2.5h74c1.4 0 2.5 1.1 2.5 2.5v58c0 1.4-1.1 2.5-2.5 2.5H13z" fill="#fff"/><path d="M87 11c1.1 0 2 .9 2 2v58c0 1.1-.9 2-2 2H13c-1.1 0-2-.9-2-2V13c0-1.1.9-2 2-2h74m0-1H13c-1.7 0-3 1.3-3 3v58c0 1.7 1.3 3 3 3h74c1.6 0 3-1.3 3-3V13c0-1.7-1.4-3-3-3z" fill="#565d66"/><path d="M77 72H61c-.6 0-1-.4-1-1V17c0-.6.4-1 1-1h16c.6 0 1 .4 1 1v54c0 .6-.4 1-1 1z" fill="#dedfe0"/><g><path class="st3" d="M55.6 17H22.4c-.3 0-.4-.2-.4-.5s.2-.5.4-.5h33.1c.3 0 .4.2.4.5.1.3-.1.5-.3.5zM55.6 20H22.4c-.3 0-.4-.2-.4-.5s.2-.5.4-.5h33.1c.3 0 .4.2.4.5.1.3-.1.5-.3.5zM55.6 23H22.4c-.3 0-.4-.2-.4-.5s.2-.5.4-.5h33.1c.3 0 .4.2.4.5.1.3-.1.5-.3.5zM55.6 44H22.4c-.3 0-.4-.2-.4-.5v-18c0-.3.2-.5.4-.5h33.1c.3 0 .4.2.4.5v18c.1.3-.1.5-.3.5zM55.6 47H22.4c-.3 0-.4-.2-.4-.5s.2-.5.4-.5h33.1c.3 0 .4.2.4.5.1.3-.1.5-.3.5zM55.6 50H22.4c-.3 0-.4-.2-.4-.5s.2-.5.4-.5h33.1c.3 0 .4.2.4.5.1.3-.1.5-.3.5zM55.6 53H22.4c-.3 0-.4-.2-.4-.5s.2-.5.4-.5h33.1c.3 0 .4.2.4.5.1.3-.1.5-.3.5zM34.5 65H22.4c-.3 0-.4-.2-.4-.5v-9c0-.3.2-.5.4-.5h12.1c.3 0 .4.2.4.5v9c.1.3-.1.5-.4.5zM55.6 56H37.5c-.3 0-.4-.2-.4-.5s.2-.5.4-.5h18.1c.3 0 .4.2.4.5s-.2.5-.4.5zM55.6 59H37.5c-.3 0-.4-.2-.4-.5s.2-.5.4-.5h18.1c.3 0 .4.2.4.5s-.2.5-.4.5zM55.6 62H37.5c-.3 0-.4-.2-.4-.5s.2-.5.4-.5h18.1c.3 0 .4.2.4.5s-.2.5-.4.5zM55.6 65H37.5c-.3 0-.4-.2-.4-.5s.2-.5.4-.5h18.1c.3 0 .4.2.4.5s-.2.5-.4.5zM55.6 68H22.4c-.3 0-.4-.2-.4-.5s.2-.5.4-.5h33.1c.3 0 .4.2.4.5.1.3-.1.5-.3.5zM55.6 71H22.4c-.3 0-.4-.2-.4-.5s.2-.5.4-.5h33.1c.3 0 .4.2.4.5.1.3-.1.5-.3.5zM55.6 74H22.4c-.3 0-.4-.2-.4-.5s.2-.5.4-.5h33.1c.3 0 .4.2.4.5.1.3-.1.5-.3.5z"/></g></svg>';

  // SINGLE POST TITLE
  $list['post-title-default'] = '<svg id="Layer_1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 70"><style>.st2{fill:#e6e7e8}.st3{fill:#c3c7ca}</style><path d="M13 73.5c-1.4 0-2.5-1.1-2.5-2.5V13c0-1.4 1.1-2.5 2.5-2.5h74c1.4 0 2.5 1.1 2.5 2.5v58c0 1.4-1.1 2.5-2.5 2.5H13z" fill="#fff"/><path d="M87 11c1.1 0 2 .9 2 2v58c0 1.1-.9 2-2 2H13c-1.1 0-2-.9-2-2V13c0-1.1.9-2 2-2h74m0-1H13c-1.7 0-3 1.3-3 3v58c0 1.7 1.3 3 3 3h74c1.6 0 3-1.3 3-3V13c0-1.7-1.4-3-3-3z" fill="#565d66"/><path class="st2" d="M77.5 30h-55c-.3 0-.5-.2-.5-.5s.2-.5.5-.5h55c.3 0 .5.2.5.5s-.2.5-.5.5zM77.5 33h-55c-.3 0-.5-.2-.5-.5s.2-.5.5-.5h55c.3 0 .5.2.5.5s-.2.5-.5.5zM77.5 36h-55c-.3 0-.5-.2-.5-.5s.2-.5.5-.5h55c.3 0 .5.2.5.5s-.2.5-.5.5zM77.5 60h-55c-.3 0-.5-.2-.5-.5v-21c0-.3.2-.5.5-.5h55c.3 0 .5.2.5.5v21c0 .3-.2.5-.5.5zM77.5 63h-55c-.3 0-.5-.2-.5-.5s.2-.5.5-.5h55c.3 0 .5.2.5.5s-.2.5-.5.5zM52.8 66H22.5c-.3 0-.5-.2-.5-.5s.2-.5.5-.5h30.3c.3 0 .5.2.5.5s-.2.5-.5.5zM52.8 69H22.5c-.3 0-.5-.2-.5-.5s.2-.5.5-.5h30.3c.3 0 .5.2.5.5s-.2.5-.5.5z"/><path class="st3" d="M43.9 20.1H23c-.5 0-1-.4-1-1 0-.5.4-1 1-1h20.9c.5 0 1 .5 1 1s-.4 1-1 1zM58.4 20.1H47.9c-.5 0-1-.4-1-1 0-.5.5-1 1-1h10.5c.5 0 1 .5 1 1s-.4 1-1 1z"/><path class="st2" d="M77.5 66h-22c-.3 0-.5-.2-.5-.5s.2-.5.5-.5h22c.3 0 .5.2.5.5s-.2.5-.5.5zM77.5 69h-22c-.3 0-.5-.2-.5-.5s.2-.5.5-.5h22c.3 0 .5.2.5.5s-.2.5-.5.5z"/><circle class="st3" cx="23" cy="23.1" r="1"/><path class="st3" d="M29.5 23.5h-4c-.3 0-.5-.2-.5-.5s.2-.5.5-.5h4c.3 0 .5.2.5.5s-.2.5-.5.5zM35.5 23.5h-4c-.3 0-.5-.2-.5-.5s.2-.5.5-.5h4c.3 0 .5.2.5.5s-.2.5-.5.5zM41.5 23.5h-4c-.3 0-.5-.2-.5-.5s.2-.5.5-.5h4c.3 0 .5.2.5.5s-.2.5-.5.5zM47.5 23.5h-4c-.3 0-.5-.2-.5-.5s.2-.5.5-.5h4c.3 0 .5.2.5.5s-.2.5-.5.5z"/></svg>';

  $list['post-title-hero'] = '<svg id="Layer_1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 70"><style>.st0{fill:#fff}.st3{fill:#e6e7e8}</style><path class="st0" d="M13 73.5c-1.4 0-2.5-1.1-2.5-2.5V13c0-1.4 1.1-2.5 2.5-2.5h74c1.4 0 2.5 1.1 2.5 2.5v58c0 1.4-1.1 2.5-2.5 2.5H13z"/><path d="M89 36H11V13c0-1.1.9-2 2-2h74c1.1 0 2 .9 2 2v23z" fill="#c3c7ca"/><path d="M87 11c1.1 0 2 .9 2 2v58c0 1.1-.9 2-2 2H13c-1.1 0-2-.9-2-2V13c0-1.1.9-2 2-2h74m0-1H13c-1.7 0-3 1.3-3 3v58c0 1.7 1.3 3 3 3h74c1.6 0 3-1.3 3-3V13c0-1.7-1.4-3-3-3z" fill="#565d66"/><path class="st3" d="M77.5 41h-55c-.3 0-.5-.2-.5-.5s.2-.5.5-.5h55c.3 0 .5.2.5.5s-.2.5-.5.5zM77.5 44h-55c-.3 0-.5-.2-.5-.5s.2-.5.5-.5h55c.3 0 .5.2.5.5s-.2.5-.5.5zM77.5 47h-55c-.3 0-.5-.2-.5-.5s.2-.5.5-.5h55c.3 0 .5.2.5.5s-.2.5-.5.5zM77.5 71h-55c-.3 0-.5-.2-.5-.5v-21c0-.3.2-.5.5-.5h55c.3 0 .5.2.5.5v21c0 .3-.2.5-.5.5z"/><path class="st0" d="M60.5 20.1h-21c-.5 0-1-.4-1-1 0-.5.4-1 1-1h20.9c.5 0 1 .5 1 1 .1.5-.4 1-.9 1zM53.2 24.3H32.3c-.6 0-1-.4-1-1 0-.5.4-1 1-1h20.9c.5 0 1 .5 1 1s-.4 1-1 1zM67.7 24.3H57.2c-.6 0-1-.4-1-1 0-.5.4-1 1-1h10.5c.6 0 1 .5 1 1s-.4 1-1 1z"/><circle class="st0" cx="38" cy="30.4" r="1"/><path class="st0" d="M44.5 30.9h-4c-.3 0-.5-.2-.5-.5s.2-.5.5-.5h4c.3 0 .5.2.5.5s-.2.5-.5.5zM50.5 30.9h-4c-.3 0-.5-.2-.5-.5s.2-.5.5-.5h4c.3 0 .5.2.5.5s-.2.5-.5.5zM56.5 30.9h-4c-.3 0-.5-.2-.5-.5s.2-.5.5-.5h4c.3 0 .5.2.5.5s-.2.5-.5.5zM62.5 30.9h-4c-.3 0-.5-.2-.5-.5s.2-.5.5-.5h4c.3 0 .5.2.5.5s-.2.5-.5.5z"/></svg>';

  return $list;
} );