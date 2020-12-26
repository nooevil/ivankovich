(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["/js/500"],{

/***/ "./themes/lovata-shopaholic-sneakers/pages/500.js":
/*!********************************************************!*\
  !*** ./themes/lovata-shopaholic-sneakers/pages/500.js ***!
  \********************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _partials_common_error_error__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../partials/common/error/error */ "./themes/lovata-shopaholic-sneakers/partials/common/error/error.js");


/***/ }),

/***/ "./themes/lovata-shopaholic-sneakers/partials/common/error/error.js":
/*!**************************************************************************!*\
  !*** ./themes/lovata-shopaholic-sneakers/partials/common/error/error.js ***!
  \**************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = (new class ErrorPage {
  constructor() {
    this.errorSelector = 'error';
    this.btnSelector = 'error__btn';
    this.errorLinkSelector = 'error__link-back';
    this.handler();
  }

  handler() {
    document.addEventListener('DOMContentLoaded', () => {
      const errorWrap = document.querySelector(".".concat(this.errorSelector));
      if (!errorWrap) return;
      const btn = errorWrap.querySelector(".".concat(this.btnSelector));
      btn.addEventListener('click', e => {
        if (btn.matches(".".concat(this.errorLinkSelector))) {
          e.preventDefault();
          window.history.back();
        } else {
          document.location.reload(true);
        }
      });
    });
  }

}());

/***/ }),

/***/ 2:
/*!**************************************************************!*\
  !*** multi ./themes/lovata-shopaholic-sneakers/pages/500.js ***!
  \**************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /sr/apache/vivankovich.com/october/themes/lovata-shopaholic-sneakers/pages/500.js */"./themes/lovata-shopaholic-sneakers/pages/500.js");


/***/ })

},[[2,"/js/manifest"]]]);
//# sourceMappingURL=500.js.map