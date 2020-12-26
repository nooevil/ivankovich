(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["/js/contact"],{

/***/ "./themes/lovata-shopaholic-sneakers/js/constant.js":
/*!**********************************************************!*\
  !*** ./themes/lovata-shopaholic-sneakers/js/constant.js ***!
  \**********************************************************/
/*! exports provided: ariaLabelText, errorText, message */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "ariaLabelText", function() { return ariaLabelText; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "errorText", function() { return errorText; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "message", function() { return message; });
const ariaLabelText = {
  drawerOpen: 'Open sidebar menu',
  drawerClose: 'Close sidebar menu'
};
const errorText = {
  gmapKeyNotFound: 'API Key was not found',
  gmapCoordinatesNotFound: 'Coordinate was not found. Pls check data-coordinates attribute'
};
const message = {
  missingValue: {
    checkbox: 'This field is required.',
    radio: 'Please select a value.',
    select: 'Please select a value.',
    'select-multiple': 'Please select at least one value.',
    default: 'Please fill out this field.'
  },
  patternMismatch: {
    email: 'Please enter a valid email address.',
    url: 'Please enter a URL.',
    number: 'Please enter a number',
    color: 'Please match the following format: #rrggbb',
    date: 'Please use the YYYY-MM-DD format',
    time: 'Please use the 24-hour time format. Ex. 23:00',
    month: 'Please use the YYYY-MM format',
    default: 'Please match the requested format.'
  },
  outOfRange: {
    over: 'Please select a value that is no more than {max}.',
    under: 'Please select a value that is no less than {min}.'
  },
  wrongLength: {
    over: 'Please shorten this text to no more than {maxLength} characters. You are currently using {length} characters.',
    under: 'Please lengthen this text to {minLength} characters or more. You are currently using {length} characters.'
  }
};

/***/ }),

/***/ "./themes/lovata-shopaholic-sneakers/node_modules/load-google-maps-api/index.js":
/*!**************************************************************************************!*\
  !*** ./themes/lovata-shopaholic-sneakers/node_modules/load-google-maps-api/index.js ***!
  \**************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

var CALLBACK_NAME = '__googleMapsApiOnLoadCallback'

var OPTIONS_KEYS = ['channel', 'client', 'key', 'language', 'region', 'v']

var promise = null

module.exports = function (options) {
  options = options || {}

  if (!promise) {
    promise = new Promise(function (resolve, reject) {
      // Reject the promise after a timeout
      var timeoutId = setTimeout(function () {
        window[CALLBACK_NAME] = function () {} // Set the on load callback to a no-op
        reject(new Error('Could not load the Google Maps API'))
      }, options.timeout || 10000)

      // Hook up the on load callback
      window[CALLBACK_NAME] = function () {
        if (timeoutId !== null) {
          clearTimeout(timeoutId)
        }
        resolve(window.google.maps)
        delete window[CALLBACK_NAME]
      }

      // Prepare the `script` tag to be inserted into the page
      var scriptElement = document.createElement('script')
      var params = ['callback=' + CALLBACK_NAME]
      OPTIONS_KEYS.forEach(function (key) {
        if (options[key]) {
          params.push(key + '=' + options[key])
        }
      })
      if (options.libraries && options.libraries.length) {
        params.push('libraries=' + options.libraries.join(','))
      }
      scriptElement.src =
        'https://maps.googleapis.com/maps/api/js?' + params.join('&')

      // Insert the `script` tag
      document.body.appendChild(scriptElement)
    })
  }

  return promise
}


/***/ }),

/***/ "./themes/lovata-shopaholic-sneakers/pages/contact.js":
/*!************************************************************!*\
  !*** ./themes/lovata-shopaholic-sneakers/pages/contact.js ***!
  \************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _partials_content_contact_contact_map__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../partials/content/contact/contact-map */ "./themes/lovata-shopaholic-sneakers/partials/content/contact/contact-map.js");


/***/ }),

/***/ "./themes/lovata-shopaholic-sneakers/partials/content/contact/contact-map.js":
/*!***********************************************************************************!*\
  !*** ./themes/lovata-shopaholic-sneakers/partials/content/contact/contact-map.js ***!
  \***********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* WEBPACK VAR INJECTION */(function($) {/* harmony import */ var load_google_maps_api__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! load-google-maps-api */ "./themes/lovata-shopaholic-sneakers/node_modules/load-google-maps-api/index.js");
/* harmony import */ var load_google_maps_api__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(load_google_maps_api__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _js_constant__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../../js/constant */ "./themes/lovata-shopaholic-sneakers/js/constant.js");


/* harmony default export */ __webpack_exports__["default"] = (new class ContactMap {
  constructor() {
    this.mapSelector = 'map';
    this.idSelector = 'data-api-key';
    this.coordinatesSelector = 'data-coordinates';
    this.markerPath = 'data-marker-path';
    this.maxWidth = 280;
    this.handler();
  }

  handler() {
    window.addEventListener('load', () => {
      this.initMap();
    });
  }

  initMap() {
    const map = document.querySelector(".".concat(this.mapSelector));
    if (!map) return;
    const key = map.getAttribute(this.idSelector);

    if (!key) {
      throw new Error(_js_constant__WEBPACK_IMPORTED_MODULE_1__["errorText"].gmapKeyNotFound);
    }

    const coordinates = map.getAttribute(this.coordinatesSelector).split(',');

    if (!coordinates.length) {
      throw new Error(_js_constant__WEBPACK_IMPORTED_MODULE_1__["errorText"].gmapCoordinatesNotFound);
    }

    const markerPath = map.getAttribute(this.markerPath);
    this.drawMap(key, coordinates, markerPath);
  }

  drawMap(key) {
    let coordinates = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : [0, 0];
    let markerPath = arguments.length > 2 ? arguments[2] : undefined;
    load_google_maps_api__WEBPACK_IMPORTED_MODULE_0___default()({
      key
    }).then(googleMaps => {
      const center = {
        lat: parseFloat(coordinates[0]),
        lng: parseFloat(coordinates[1])
      };
      const map = new googleMaps.Map(document.querySelector(".".concat(this.mapSelector)), {
        center,
        zoom: 14
      });
      const marker = new googleMaps.Marker({
        position: center,
        map,
        icon: markerPath
      });
      $.request('onAjax', {
        update: {
          'content/contact/contact-popup': ".".concat(this.mapSelector)
        },
        success: res => {
          const content = res['content/contact/contact-popup'];
          const infowindow = new googleMaps.InfoWindow({
            content,
            maxWidth: this.maxWidth
          });
          infowindow.open(map, marker);
          marker.addListener('click', () => {
            infowindow.open(map, marker);
          });
        }
      });
    }).catch(error => {
      throw new Error(error);
    });
  }

}());
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! jquery */ "./themes/lovata-shopaholic-sneakers/node_modules/jquery/dist/jquery.js")))

/***/ }),

/***/ 8:
/*!******************************************************************!*\
  !*** multi ./themes/lovata-shopaholic-sneakers/pages/contact.js ***!
  \******************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /sr/apache/vivankovich.com/october/themes/lovata-shopaholic-sneakers/pages/contact.js */"./themes/lovata-shopaholic-sneakers/pages/contact.js");


/***/ })

},[[8,"/js/manifest","/js/vendor"]]]);
//# sourceMappingURL=contact.js.map