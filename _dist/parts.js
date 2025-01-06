/*
 * ATTENTION: The "eval" devtool has been used (maybe by default in mode: "development").
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./parts/footer/style.sass":
/*!*********************************!*\
  !*** ./parts/footer/style.sass ***!
  \*********************************/
/***/ (() => {

eval("// extracted by mini-css-extract-plugin\n\n//# sourceURL=webpack://pixel-wp-theme/./parts/footer/style.sass?");

/***/ }),

/***/ "./parts/header-main/style-offcanvas.sass":
/*!************************************************!*\
  !*** ./parts/header-main/style-offcanvas.sass ***!
  \************************************************/
/***/ (() => {

eval("// extracted by mini-css-extract-plugin\n\n//# sourceURL=webpack://pixel-wp-theme/./parts/header-main/style-offcanvas.sass?");

/***/ }),

/***/ "./parts/header-main/style.sass":
/*!**************************************!*\
  !*** ./parts/header-main/style.sass ***!
  \**************************************/
/***/ (() => {

eval("// extracted by mini-css-extract-plugin\n\n//# sourceURL=webpack://pixel-wp-theme/./parts/header-main/style.sass?");

/***/ }),

/***/ "./parts/header-sub/style.sass":
/*!*************************************!*\
  !*** ./parts/header-sub/style.sass ***!
  \*************************************/
/***/ (() => {

eval("// extracted by mini-css-extract-plugin\n\n//# sourceURL=webpack://pixel-wp-theme/./parts/header-sub/style.sass?");

/***/ }),

/***/ "./parts/header-main/script.js":
/*!*************************************!*\
  !*** ./parts/header-main/script.js ***!
  \*************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _style_sass__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./style.sass */ \"./parts/header-main/style.sass\");\n/* harmony import */ var _style_sass__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_style_sass__WEBPACK_IMPORTED_MODULE_0__);\n/* harmony import */ var _style_offcanvas_sass__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./style-offcanvas.sass */ \"./parts/header-main/style-offcanvas.sass\");\n/* harmony import */ var _style_offcanvas_sass__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_style_offcanvas_sass__WEBPACK_IMPORTED_MODULE_1__);\n\r\n\r\n\r\nconst stickyHeader = {\r\n  hasTransparentHeader: false,\r\n  init() {\r\n    // Abort if browser doesn't support sticky position\r\n    if (!(CSS.supports && CSS.supports('position', 'sticky'))) { return; }\r\n\r\n    const $elems = document.querySelectorAll('.header, .header-mobile');\r\n    let $visibleElems = $elems;\r\n\r\n    // If has transparent header, filter only visible elements\r\n    if (document.body.classList.contains('h-has-transparent-header')) {\r\n      this.hasTransparentHeader = true;\r\n      $visibleElems = this.getVisibleElems($elems);\r\n\r\n      window.addEventListener('resize', () => {\r\n        $visibleElems = this.getVisibleElems($elems);\r\n      });\r\n    }\r\n\r\n    // Initial check if already sticky\r\n    $visibleElems.forEach(this.checkPosition.bind(this));\r\n\r\n    window.addEventListener('scroll', () => {\r\n      $visibleElems.forEach(this.checkPosition.bind(this));\r\n    });\r\n  },\r\n\r\n  //\r\n\r\n  /**\r\n   * Check which elements are currently visible\r\n   */\r\n  getVisibleElems($elems) {\r\n    return [...$elems].filter(($e) => $e.offsetWidth > 0 || $e.offsetHeight > 0 || $e.getClientRects().length > 0);\r\n  },\r\n\r\n  /**\r\n   * Check whether the element has reached the top of the screen\r\n   */\r\n  checkPosition($elem) {\r\n    const currentOffset = $elem.getBoundingClientRect().top;\r\n    const stickyOffset = parseInt(getComputedStyle($elem).top.replace('px', ''), 10);\r\n    const isStuck = currentOffset <= stickyOffset;\r\n\r\n    $elem.classList.toggle('is-stuck', isStuck);\r\n\r\n    if (this.hasTransparentHeader) {\r\n      document.body.classList.toggle('h-has-transparent-header', !isStuck);\r\n    }\r\n  },\r\n};\r\n\r\nconst offcanvas = {\r\n  init() {\r\n    this.toggleOffcanvas();\r\n    this.closeOffcanvas();\r\n    this.preventCloseOffcanvas();\r\n\r\n    this.offcanvasSubmenu();\r\n    // this.offcanvasDepth2();\r\n  },\r\n\r\n  /**\r\n   * Open or close the offcanvas menu\r\n   */\r\n  toggleOffcanvas() {\r\n    const $menuLinks = document.querySelectorAll('[href=\"#menu\"]');\r\n    $menuLinks.forEach(($link) => {\r\n      $link.addEventListener('click', (e) => {\r\n        e.preventDefault();\r\n        e.stopPropagation();\r\n        document.querySelector('body').classList.toggle('has-active-offcanvas');\r\n      });\r\n    });\r\n  },\r\n\r\n  /**\r\n   * Close offcanvas when clicking outside the inner wrapper\r\n   */\r\n  closeOffcanvas() {\r\n    const $offcanvas = document.querySelector('.offcanvas');\r\n    const $inner = document.querySelector('.offcanvas__inner');\r\n\r\n    if ($offcanvas) {\r\n      $offcanvas.addEventListener('click', () => {\r\n        document.querySelector('body').classList.remove('has-active-offcanvas');\r\n      });\r\n\r\n      $inner.addEventListener('click', (e) => {\r\n        e.stopPropagation();\r\n      });\r\n    }\r\n  },\r\n\r\n  /**\r\n   * Prevent closing the offcanvas when clicking inside it\r\n   */\r\n  preventCloseOffcanvas() {\r\n    const $offcanvas = document.querySelector('.offcanvas');\r\n\r\n    if ($offcanvas) {\r\n      $offcanvas.addEventListener('click', (e) => {\r\n        e.stopPropagation();\r\n      });\r\n    }\r\n  },\r\n\r\n  /**\r\n   * Toggle offcanvas submenu\r\n   */\r\n  offcanvasSubmenu() {\r\n    const $itemLinks = document.querySelectorAll('.offcanvas .menu-item.menu-item-has-children > a, .offcanvas .submenu-item.menu-item-has-children > a');\r\n    $itemLinks.forEach(($link) => {\r\n      $link.addEventListener('click', (e) => {\r\n        e.preventDefault();\r\n\r\n        const $wrapper = e.currentTarget.parentElement;\r\n        $wrapper.classList.toggle('is-open');\r\n      });\r\n    });\r\n  },\r\n};\r\n\r\ndocument.addEventListener('DOMContentLoaded', () => {\r\n  stickyHeader.init();\r\n  offcanvas.init();\r\n});\r\n\n\n//# sourceURL=webpack://pixel-wp-theme/./parts/header-main/script.js?");

/***/ }),

/***/ "./parts/parts.js":
/*!************************!*\
  !*** ./parts/parts.js ***!
  \************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _header_main_script__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./header-main/script */ \"./parts/header-main/script.js\");\n/* harmony import */ var _header_sub_style_sass__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./header-sub/style.sass */ \"./parts/header-sub/style.sass\");\n/* harmony import */ var _header_sub_style_sass__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_header_sub_style_sass__WEBPACK_IMPORTED_MODULE_1__);\n/* harmony import */ var _footer_style_sass__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./footer/style.sass */ \"./parts/footer/style.sass\");\n/* harmony import */ var _footer_style_sass__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_footer_style_sass__WEBPACK_IMPORTED_MODULE_2__);\n\r\n\r\n\r\n\n\n//# sourceURL=webpack://pixel-wp-theme/./parts/parts.js?");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	(() => {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = (module) => {
/******/ 			var getter = module && module.__esModule ?
/******/ 				() => (module['default']) :
/******/ 				() => (module);
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval devtool is used.
/******/ 	var __webpack_exports__ = __webpack_require__("./parts/parts.js");
/******/ 	
/******/ })()
;