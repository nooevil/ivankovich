(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["/js/news-list"],{

/***/ "./node_modules/social-likes-next/lib/button.js":
/*!******************************************************!*\
  !*** ./node_modules/social-likes-next/lib/button.js ***!
  \******************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
	value: true
});

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

var _deepmerge = __webpack_require__(/*! deepmerge */ "./node_modules/social-likes-next/node_modules/deepmerge/index.js");

var _deepmerge2 = _interopRequireDefault(_deepmerge);

var _config = __webpack_require__(/*! ./config */ "./node_modules/social-likes-next/lib/config.js");

var _util = __webpack_require__(/*! ./util */ "./node_modules/social-likes-next/lib/util.js");

var _services = __webpack_require__(/*! ./services */ "./node_modules/social-likes-next/lib/services/index.js");

var baseServices = _interopRequireWildcard(_services);

function _interopRequireWildcard(obj) { if (obj && obj.__esModule) { return obj; } else { var newObj = {}; if (obj != null) { for (var key in obj) { if (Object.prototype.hasOwnProperty.call(obj, key)) newObj[key] = obj[key]; } } newObj.default = obj; return newObj; } }

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

// Merge base services with user services
var services = window.socialLikesButtons ? (0, _deepmerge2.default)(baseServices, window.socialLikesButtons) : baseServices;

/**
 * A button.
 *
 * @param {HTMLElement} widget
 * @param {Object} options
 */

var Button = function () {
	function Button(widget, options) {
		_classCallCheck(this, Button);

		this.widget = widget;
		this.data = (0, _util.dataset)(widget);
		this.options = (0, _deepmerge2.default)(options, this.data);

		this.initService();
		if (this.service) {
			this.initHtml();
			this.initEvents();
		}
		if (!this.service && "development" === 'development') {
			/* eslint-disable no-console */
			console.error('Social Likes: service for widget "' + (widget.className || this.options.service) + '" not found.');
			/* eslint-enable no-console */
		}
	}

	/**
  * Update options.
  *
  * @param {Object} options New options.
  */


	_createClass(Button, [{
		key: 'update',
		value: function update(options) {
			this.options = (0, _deepmerge2.default)(this.options, options);
		}

		/**
   * Read service name and apply its options.
   * Service can be a class on the widget (.facebook) or `service` option.
   */

	}, {
		key: 'initService',
		value: function initService() {
			var service = this.options.service;
			if (!service) {
				// class="facebook"
				service = (0, _util.toArray)(this.widget.classList).reduce(function (_, cls) {
					if (services[cls]) {
						return cls;
					}
				}, null);
				if (!service) {
					return;
				}
			}
			this.service = service;
			if (services[service]) {
				this.options = (0, _deepmerge2.default)(this.options, services[service]);
			} else {
				this.service = null;
			}
		}

		/**
   * Initialize markup of a button.
   */

	}, {
		key: 'initHtml',
		value: function initHtml() {
			var _this = this;

			var cx = function cx(name) {
				return (0, _util.className)(name, _this.service);
			};
			var widget = this.widget;
			var options = this.options;

			// Remove existing class (.facebook) with a proper one
			widget.classList.remove(this.service);
			cx('widget').split(' ').forEach(function (cls) {
				return widget.classList.add(cls);
			});

			// Button:
			// 1. Normal button with <button> tag.
			// 2. Link <a> if the service has the clickUrl option.
			// 3. Link <a> with .social-likes__invisible-button class if has clickUrl option but widget markup has no text.
			// 4. No button if there’s no text in the markup and no clickUrl option.
			var buttonHtml = '';
			var oldHtml = widget.innerHTML.trim();
			if (options.clickUrl || oldHtml) {
				var buttonTag = 'div';
				var buttonHref = '';
				var buttonClasses = cx('button');
				if (options.clickUrl) {
					var url = this.makeUrl(options.clickUrl);
					buttonTag = 'a';
					buttonHref = 'href="' + url + '"';
					if (!oldHtml) {
						buttonClasses = cx('invisible-button');
					}
				}
				buttonHtml = '\n\t\t\t\t<' + buttonTag + ' ' + buttonHref + ' class="' + buttonClasses + '">\n\t\t\t\t\t' + oldHtml + '\n\t\t\t\t</' + buttonTag + '>\n\t\t\t';
			} else {
				widget.classList.add((0, _util.className)('widget_notext'));
			}

			// Icon
			var svgHtml = (0, _util.svg)(this.options.icon, cx('icon'));

			widget.innerHTML = svgHtml + buttonHtml;
		}

		/**
   * Attach event handlers.
   */

	}, {
		key: 'initEvents',
		value: function initEvents() {
			if (!this.options.clickUrl) {
				this.widget.addEventListener('click', this.onClick.bind(this));
				this.widget.addEventListener('keydown', this.onKeyDown.bind(this));
				this.widget.setAttribute('tabindex', '0');
				this.widget.setAttribute('role', 'button');
			}
		}

		/**
   * Replace URL and title in an URL template.
   *
   * @param {string} urlTemplate URL template.
   * @return {string}
   */

	}, {
		key: 'makeUrl',
		value: function makeUrl(urlTemplate) {
			return (0, _util.makeUrl)(urlTemplate, {
				url: this.options.url,
				title: this.options.title
			});
		}
	}, {
		key: 'makeUrlWithParams',
		value: function makeUrlWithParams(urlTemplate) {
			var url = this.makeUrl(urlTemplate);
			var params = (0, _deepmerge2.default)(this.data, this.options.data || {});
			return (0, _util.addParamsToUrl)(url, params, ['service', 'title', 'url']);
		}

		/**
   * Button click handler.
   *
   * @param {Event} event Event.
   */

	}, {
		key: 'onClick',
		value: function onClick(event) {
			var options = this.options;
			var ok = true;
			if (typeof options.click === 'function') {
				ok = options.click.call(this, event);
			}
			if (ok) {
				var url = this.makeUrlWithParams(options.popupUrl);
				(0, _util.openPopup)(url, {
					width: options.popupWidth,
					height: options.popupHeight,
					name: _config.prefix + '_' + this.service
				});
			}
		}
	}, {
		key: 'onKeyDown',
		value: function onKeyDown(event) {
			if (event.which === 13 || event.which === 32) {
				event.preventDefault();
				this.onClick(event);
			}
		}
	}]);

	return Button;
}();

exports.default = Button;

/***/ }),

/***/ "./node_modules/social-likes-next/lib/config.js":
/*!******************************************************!*\
  !*** ./node_modules/social-likes-next/lib/config.js ***!
  \******************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
  value: true
});
/**
 * Prefix that is used to generate CSS class names, etc.
 *
 * @type {string}
 */
var prefix = exports.prefix = 'social-likes';

/**
 * Delimiter that is used to separate element.
 *
 * @type {string}
 */
var elemDelimiter = exports.elemDelimiter = '__';

/**
 * Delimiter that is used to separate modifier.
 *
 * @type {string}
 */
var modDelimiter = exports.modDelimiter = '_';

/***/ }),

/***/ "./node_modules/social-likes-next/lib/index.js":
/*!*****************************************************!*\
  !*** ./node_modules/social-likes-next/lib/index.js ***!
  \*****************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
	value: true
});
exports.default = init;
exports.autoInit = autoInit;

var _config = __webpack_require__(/*! ./config */ "./node_modules/social-likes-next/lib/config.js");

var _util = __webpack_require__(/*! ./util */ "./node_modules/social-likes-next/lib/util.js");

var _socialLikes = __webpack_require__(/*! ./social-likes */ "./node_modules/social-likes-next/lib/social-likes.js");

var _socialLikes2 = _interopRequireDefault(_socialLikes);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

// Symbol to store an instance reference in a DOM node
var symbol = 'socialLikes';

/**
 * Initialize or update Social Likes on a DOM element.
 *
 * @param {HTMLElement} elem DOM element.
 * @param {Object} [options] Options.
 * @return {SocialLikes}
 */
function init(elem) {
	var options = arguments.length <= 1 || arguments[1] === undefined ? {} : arguments[1];

	var instance = elem[symbol];
	if (instance) {
		instance.update(options);
	} else {
		instance = elem[symbol] = new _socialLikes2.default(elem, options);
	}
	return instance;
}

/**
 * Init Social Likes on all elements with class .social-likes.
 *
 * @param {boolean} wait Wait for DOM ready if no elements found.
 */
function autoInit() {
	var wait = arguments.length <= 0 || arguments[0] === undefined ? false : arguments[0];

	var elements = document.querySelectorAll('.' + _config.prefix);
	if (elements) {
		(0, _util.toArray)(elements).forEach(function (elem) {
			return init(elem);
		});
	} else if (wait) {
		// No elements found. Wait for DOM content loaded to try again in case the script was included in the <head>
		document.addEventListener('DOMContentLoaded', autoInit);
	}
}

// Auto initialization
autoInit(true);

/***/ }),

/***/ "./node_modules/social-likes-next/lib/services/facebook.js":
/*!*****************************************************************!*\
  !*** ./node_modules/social-likes-next/lib/services/facebook.js ***!
  \*****************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
	value: true
});
exports.default = {
	icon: 'M13 0H3C1 0 0 1 0 3v10c0 2 1 3 3 3h5V9H6V7h2V5c0-2 2-2 2-2h3v2h-3v2h3l-.5 2H10v7h3c2 0 3-1 3-3V3c0-2-1-3-3-3z',
	popupUrl: 'https://www.facebook.com/sharer/sharer.php?u={url}',
	popupWidth: 600,
	popupHeight: 500
};

/***/ }),

/***/ "./node_modules/social-likes-next/lib/services/index.js":
/*!**************************************************************!*\
  !*** ./node_modules/social-likes-next/lib/services/index.js ***!
  \**************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
  value: true
});

var _facebook = __webpack_require__(/*! ./facebook */ "./node_modules/social-likes-next/lib/services/facebook.js");

Object.defineProperty(exports, 'facebook', {
  enumerable: true,
  get: function get() {
    return _interopRequireDefault(_facebook).default;
  }
});

var _odnoklassniki = __webpack_require__(/*! ./odnoklassniki */ "./node_modules/social-likes-next/lib/services/odnoklassniki.js");

Object.defineProperty(exports, 'odnoklassniki', {
  enumerable: true,
  get: function get() {
    return _interopRequireDefault(_odnoklassniki).default;
  }
});

var _pinterest = __webpack_require__(/*! ./pinterest */ "./node_modules/social-likes-next/lib/services/pinterest.js");

Object.defineProperty(exports, 'pinterest', {
  enumerable: true,
  get: function get() {
    return _interopRequireDefault(_pinterest).default;
  }
});

var _plusone = __webpack_require__(/*! ./plusone */ "./node_modules/social-likes-next/lib/services/plusone.js");

Object.defineProperty(exports, 'plusone', {
  enumerable: true,
  get: function get() {
    return _interopRequireDefault(_plusone).default;
  }
});

var _twitter = __webpack_require__(/*! ./twitter */ "./node_modules/social-likes-next/lib/services/twitter.js");

Object.defineProperty(exports, 'twitter', {
  enumerable: true,
  get: function get() {
    return _interopRequireDefault(_twitter).default;
  }
});

var _vkontakte = __webpack_require__(/*! ./vkontakte */ "./node_modules/social-likes-next/lib/services/vkontakte.js");

Object.defineProperty(exports, 'vkontakte', {
  enumerable: true,
  get: function get() {
    return _interopRequireDefault(_vkontakte).default;
  }
});

var _telegram = __webpack_require__(/*! ./telegram */ "./node_modules/social-likes-next/lib/services/telegram.js");

Object.defineProperty(exports, 'telegram', {
  enumerable: true,
  get: function get() {
    return _interopRequireDefault(_telegram).default;
  }
});

var _linkedin = __webpack_require__(/*! ./linkedin */ "./node_modules/social-likes-next/lib/services/linkedin.js");

Object.defineProperty(exports, 'linkedin', {
  enumerable: true,
  get: function get() {
    return _interopRequireDefault(_linkedin).default;
  }
});

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

/***/ }),

/***/ "./node_modules/social-likes-next/lib/services/linkedin.js":
/*!*****************************************************************!*\
  !*** ./node_modules/social-likes-next/lib/services/linkedin.js ***!
  \*****************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
	value: true
});
/* eslint-disable max-len */

exports.default = {
	icon: 'M14.4,0H1.6C0.7,0,0,0.7,0,1.6v12.7C0,15.3,0.7,16,1.6,16h12.7c0.9,0,1.6-0.7,1.6-1.6V1.6C16,0.7,15.3,0,14.4,0zM3.4,1.9C4.3,1.9,5,2.5,5,3.3c0,0.8-0.7,1.5-1.6,1.5S1.8,4.1,1.8,3.3C1.8,2.5,2.6,1.9,3.4,1.9z M5.2,14.1H1.7V5.9h3.5V14.1z M14.1,14.1h-2.7V9.7c0-0.9-0.6-1.6-1.5-1.6C9,8.1,8.7,8.8,8.7,9.5c0,0.9,0,4.7,0,4.7H6V5.9h2.7v1.2c0.4-0.5,1.4-1.2,2.4-1.2c1.3,0,1.6,0.3,2.1,0.8c1,1,0.9,2.4,0.9,2.9h0L14.1,14.1z',
	popupUrl: 'https://www.linkedin.com/shareArticle?url={url}',
	popupWidth: 600,
	popupHeight: 500
};

/***/ }),

/***/ "./node_modules/social-likes-next/lib/services/odnoklassniki.js":
/*!**********************************************************************!*\
  !*** ./node_modules/social-likes-next/lib/services/odnoklassniki.js ***!
  \**********************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
	value: true
});
/* eslint-disable max-len */

exports.default = {
	icon: 'M8 6.107c.888 0 1.607-.72 1.607-1.607 0-.888-.72-1.607-1.607-1.607s-1.607.72-1.607 1.607c0 .888.72 1.607 1.607 1.607zM13 0H3C1 0 0 1 0 3v10c0 2 1 3 3 3h10c2 0 3-1 3-3V3c0-2-1-3-3-3zM8 .75c2.07 0 3.75 1.68 3.75 3.75 0 2.07-1.68 3.75-3.75 3.75S4.25 6.57 4.25 4.5C4.25 2.43 5.93.75 8 .75zm3.826 12.634c.42.42.42 1.097 0 1.515-.21.208-.483.313-.758.313-.274 0-.548-.105-.758-.314L8 12.59 5.69 14.9c-.42.418-1.098.418-1.516 0s-.42-1.098 0-1.516L6.357 11.2c-1.303-.386-2.288-1.073-2.337-1.11-.473-.354-.57-1.025-.214-1.5.354-.47 1.022-.567 1.496-.216.03.022 1.4.946 2.698.946 1.31 0 2.682-.934 2.693-.943.474-.355 1.146-.258 1.5.213.355.474.26 1.146-.214 1.5-.05.036-1.035.723-2.338 1.11l2.184 2.184z',
	popupUrl: 'https://connect.ok.ru/dk?st.cmd=WidgetSharePreview&service=odnoklassniki&st.shareUrl={url}',
	popupWidth: 550,
	popupHeight: 360
};

/***/ }),

/***/ "./node_modules/social-likes-next/lib/services/pinterest.js":
/*!******************************************************************!*\
  !*** ./node_modules/social-likes-next/lib/services/pinterest.js ***!
  \******************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
	value: true
});
/* eslint-disable max-len */

exports.default = {
	icon: 'M7.99 0c-4.417 0-8 3.582-8 8 0 3.39 2.11 6.284 5.086 7.45-.07-.633-.133-1.604.028-2.295.145-.624.938-3.977.938-3.977s-.24-.48-.24-1.188c0-1.112.645-1.943 1.448-1.943.683 0 1.012.512 1.012 1.127 0 .686-.437 1.713-.663 2.664-.19.796.398 1.446 1.184 1.446 1.422 0 2.515-1.5 2.515-3.664 0-1.915-1.377-3.255-3.343-3.255-2.276 0-3.612 1.707-3.612 3.472 0 .688.265 1.425.595 1.826.065.08.075.15.055.23-.06.252-.195.796-.222.907-.035.146-.116.177-.268.107-1-.465-1.624-1.926-1.624-3.1 0-2.523 1.835-4.84 5.287-4.84 2.775 0 4.932 1.977 4.932 4.62 0 2.757-1.74 4.976-4.152 4.976-.81 0-1.573-.42-1.834-.92l-.498 1.903c-.18.695-.668 1.566-.994 2.097.75.232 1.544.357 2.37.357 4.417 0 8-3.582 8-8s-3.583-8-8-8z',
	popupUrl: 'https://www.pinterest.com/pin/create/button/?url={url}&description={title}',
	popupWidth: 750,
	popupHeight: 550
};

/***/ }),

/***/ "./node_modules/social-likes-next/lib/services/plusone.js":
/*!****************************************************************!*\
  !*** ./node_modules/social-likes-next/lib/services/plusone.js ***!
  \****************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
	value: true
});
/* eslint-disable max-len */

exports.default = {
	icon: 'M8,6.5v3h4.291c-0.526,2.01-2.093,3.476-4.315,3.476C5.228,12.976,3,10.748,3,8c0-2.748,2.228-4.976,4.976-4.976c1.442,0,2.606,0.623,3.397,1.603L13.52,2.48C12.192,0.955,10.276,0,8,0C3.582,0,0,3.582,0,8s3.582,8,8,8s7.5-3.582,7.5-8V6.5H8z',
	popupUrl: 'https://plus.google.com/share?url={url}',
	popupWidth: 500,
	popupHeight: 500
};

/***/ }),

/***/ "./node_modules/social-likes-next/lib/services/telegram.js":
/*!*****************************************************************!*\
  !*** ./node_modules/social-likes-next/lib/services/telegram.js ***!
  \*****************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
	value: true
});
/* eslint-disable max-len */

exports.default = {
	icon: 'M6,11L5,8l11-8L0.622,5.914c0,0-0.672,0.23-0.619,0.655c0.053,0.425,0.602,0.619,0.602,0.619l3.575,1.203L5.8,13.545l2.742-2.411l-0.007-0.005l3.607,2.766c0.973,0.425,1.327-0.46,1.327-0.46L16,0L6,11z',
	popupUrl: 'https://telegram.me/share/url?url={url}&title={title}',
	popupWidth: 600,
	popupHeight: 500
};

/***/ }),

/***/ "./node_modules/social-likes-next/lib/services/twitter.js":
/*!****************************************************************!*\
  !*** ./node_modules/social-likes-next/lib/services/twitter.js ***!
  \****************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
	value: true
});
/* eslint-disable max-len */

exports.default = {
	icon: 'M15.96 3.42c-.04.153-.144.31-.237.414l-.118.058v.118l-.59.532-.237.295c-.05.036-.398.21-.413.237V6.49h-.06v.473h-.058v.294h-.058v.296h-.06v.235h-.06v.237h-.058c-.1.355-.197.71-.295 1.064h-.06v.116h-.06c-.02.1-.04.197-.058.296h-.06c-.04.118-.08.237-.118.355h-.06c-.038.118-.078.236-.117.353l-.118.06-.06.235-.117.06v.116l-.118.06v.12h-.06c-.02.057-.038.117-.058.175l-.118.06v.117c-.06.04-.118.08-.177.118v.118l-.237.177v.118l-.59.53-.532.592h-.117c-.06.078-.118.156-.177.236l-.177.06-.06.117h-.118l-.06.118-.176.06v.058h-.118l-.06.118-.353.12-.06.117c-.078.02-.156.04-.235.058v.06c-.118.038-.236.078-.354.118v.058H8.76v.06h-.12v.06h-.176v.058h-.118v.06H8.17v.058H7.99v.06l-.413.058v.06h-.237c-.667.22-1.455.293-2.36.293h-.886v-.058h-.53v-.06H3.27v-.06h-.295v-.06H2.68v-.057h-.177v-.06h-.236v-.058H2.09v-.06h-.177v-.058h-.177v-.06H1.56v-.058h-.12v-.06l-.294-.06v-.057c-.118-.04-.236-.08-.355-.118v-.06H.674v-.058H.555v-.06H.437v-.058H.32l-.06-.12H.142v-.058c-.13-.08-.083.026-.177-.118H1.56v-.06c.294-.04.59-.077.884-.117v-.06h.177v-.058h.237v-.06h.118v-.06h.177v-.057h.118v-.06h.177v-.058l.236-.06v-.058l.236-.06c.02-.038.04-.078.058-.117l.237-.06c.02-.04.04-.077.058-.117h.118l.06-.118h.118c.036-.025.047-.078.118-.118V12.1c-1.02-.08-1.84-.54-2.303-1.183-.08-.058-.157-.118-.236-.176v-.117l-.118-.06v-.117c-.115-.202-.268-.355-.296-.65.453.004.987.008 1.354-.06v-.06c-.254-.008-.47-.08-.65-.175v-.058H2.32v-.06c-.08-.02-.157-.04-.236-.058l-.06-.118h-.117l-.118-.178h-.12c-.077-.098-.156-.196-.235-.294l-.118-.06v-.117l-.177-.12c-.35-.502-.6-1.15-.59-2.006h.06c.204.234.948.377 1.357.415v-.06c-.257-.118-.676-.54-.827-.768V5.9l-.118-.06c-.04-.117-.08-.236-.118-.354h-.06v-.118H.787c-.04-.196-.08-.394-.118-.59-.06-.19-.206-.697-.118-1.005h.06V3.36h.058v-.177h.06v-.177h.057V2.83h.06c.04-.118.078-.236.117-.355h.118v.06c.12.097.237.196.355.295v.118l.118.058c.08.098.157.197.236.295l.176.06.354.413h.118l.177.236h.118l.06.117h.117c.04.06.08.118.118.177h.118l.06.118.235.06.06.117.356.12.06.117.53.176v.06h.118v.058l.236.06v.06c.118.02.236.04.355.058v.06h.177v.058h.177v.06h.176v.058h.236v.06l.472.057v.06l1.417.18v-.237c-.1-.112-.058-.442-.057-.65 0-.573.15-.99.354-1.358v-.117l.118-.06.06-.235.176-.118v-.118c.14-.118.276-.236.414-.355l.06-.117h.117l.12-.177.235-.06.06-.117h.117v-.058H9.7v-.058h.177v-.06h.177v-.058h.177v-.06h.296v-.058h1.063v.058h.294v.06h.177v.058h.178v.06h.177v.058h.118v.06h.118l.06.117c.08.018.158.038.236.058.04.06.08.118.118.177h.118l.06.117c.142.133.193.163.472.178.136-.12.283-.05.472-.118v-.06h.177v-.058h.177v-.06l.236-.058v-.06h.177l.59-.352v.176h-.058l-.06.295h-.058v.117h-.06v.118l-.117.06v.118l-.177.118v.117l-.118.06-.354.412h-.117l-.177.236h.06c.13-.112.402-.053.59-.117l1.063-.353z',
	popupUrl: 'https://twitter.com/intent/tweet?url={url}&text={title}',
	popupWidth: 600,
	popupHeight: 450,
	click: function click() {
		// Add a colon to improve readability
		if (!/[.?!:\-–—]\s*$/.test(this.options.title)) {
			this.options.title += ':';
		}
		return true;
	}
};

/***/ }),

/***/ "./node_modules/social-likes-next/lib/services/vkontakte.js":
/*!******************************************************************!*\
  !*** ./node_modules/social-likes-next/lib/services/vkontakte.js ***!
  \******************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
	value: true
});
/* eslint-disable max-len */

exports.default = {
	icon: 'M13 0H3C1 0 0 1 0 3v10c0 2 1 3 3 3h10c2 0 3-1 3-3V3c0-2-1-3-3-3zm.452 11.394l-1.603.022s-.345.068-.8-.243c-.598-.41-1.164-1.48-1.604-1.342-.446.144-.432 1.106-.432 1.106s.003.206-.1.315c-.11.12-.326.144-.326.144H7.87s-1.582.095-2.975-1.356c-1.52-1.583-2.862-4.723-2.862-4.723s-.078-.206.006-.305c.094-.112.35-.12.35-.12l1.716-.01s.162.026.277.11c.095.07.15.202.15.202s.276.7.643 1.335c.716 1.238 1.05 1.508 1.293 1.376.353-.193.247-1.75.247-1.75s.006-.565-.178-.817c-.145-.194-.415-.25-.534-.267-.096-.014.062-.238.267-.338.31-.15.853-.16 1.497-.153.502.004.646.035.842.083.59.143.39.694.39 2.016 0 .422-.075 1.018.23 1.215.13.085.453.013 1.256-1.352.38-.647.666-1.407.666-1.407s.062-.136.16-.194c.098-.06.232-.04.232-.04l1.804-.012s.542-.065.63.18c.092.257-.203.857-.94 1.84-1.21 1.612-1.345 1.46-.34 2.394.96.89 1.16 1.325 1.192 1.38.4.66-.44.71-.44.71z',
	popupUrl: 'https://vk.com/share.php?url={url}',
	popupWidth: 550,
	popupHeight: 330
};

/***/ }),

/***/ "./node_modules/social-likes-next/lib/social-likes.js":
/*!************************************************************!*\
  !*** ./node_modules/social-likes-next/lib/social-likes.js ***!
  \************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
	value: true
});

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

var _deepmerge = __webpack_require__(/*! deepmerge */ "./node_modules/social-likes-next/node_modules/deepmerge/index.js");

var _deepmerge2 = _interopRequireDefault(_deepmerge);

var _button = __webpack_require__(/*! ./button */ "./node_modules/social-likes-next/lib/button.js");

var _button2 = _interopRequireDefault(_button);

var _util = __webpack_require__(/*! ./util */ "./node_modules/social-likes-next/lib/util.js");

var _config = __webpack_require__(/*! ./config */ "./node_modules/social-likes-next/lib/config.js");

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

// Default options
var defaults = {
	url: window.location.href.replace(window.location.hash, ''),
	title: document.title
};

/**
 * Social Likes.
 *
 * @param {HTMLElement} container HTML container element.
 * @param {Object} [options] Options.
 */

var SocialLikes = function () {
	function SocialLikes(container) {
		var options = arguments.length <= 1 || arguments[1] === undefined ? {} : arguments[1];

		_classCallCheck(this, SocialLikes);

		container.classList.add(_config.prefix);

		// Options: default < constructor < container data-attributes
		options = (0, _deepmerge2.default)((0, _deepmerge2.default)(defaults, options), (0, _util.dataset)(container));
		this.url = options.url;

		this.buttons = (0, _util.toArray)(container.children).map(function (elem) {
			return new _button2.default(elem, options);
		});

		container.classList.add(_config.prefix + '_visible');
	}

	/**
  * Update options.
  *
  * @param {Object} options New options.
  */


	_createClass(SocialLikes, [{
		key: 'update',
		value: function update(options) {
			if (options.url === this.url) {
				return;
			}

			// Update each button
			this.buttons.forEach(function (button) {
				return button.update(options);
			});
		}
	}]);

	return SocialLikes;
}();

exports.default = SocialLikes;

/***/ }),

/***/ "./node_modules/social-likes-next/lib/util.js":
/*!****************************************************!*\
  !*** ./node_modules/social-likes-next/lib/util.js ***!
  \****************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
	value: true
});
exports.dataset = dataset;
exports.addParamsToUrl = addParamsToUrl;
exports.objectToQueryString = objectToQueryString;
exports.openPopup = openPopup;
exports.makeUrl = makeUrl;
exports.template = template;
exports.className = className;
exports.toArray = toArray;
exports.svg = svg;

var _config = __webpack_require__(/*! ./config */ "./node_modules/social-likes-next/lib/config.js");

/**
 * Return node.dataset as an object
 *
 * @param {Node} node DOM node.
 * @return {Object}
 */
function dataset(node) {
	var data = {};
	for (var key in node.dataset) {
		data[key] = node.dataset[key];
	}
	return data;
}

/**
 * Append params to the URL.
 *
 * @param {string} url Base URL.
 * @param {Object} params Params to append.
 * @param {string[]} [ignore] List of keys to ignore.
 * @return {string}
 */
function addParamsToUrl(url, params) {
	var ignore = arguments.length <= 2 || arguments[2] === undefined ? [] : arguments[2];

	params = objectToQueryString(params, ignore);
	if (!params) {
		return url;
	}

	var glue = url.indexOf('?') === -1 ? '?' : '&';
	return url + glue + params;
}

/**
 * Convert object to a query string: a=1&b=2.
 *
 * @param {Object} params Parameters.
 * @param {string[]} [ignore] List of keys to ignore.
 * @return {string}
 */
function objectToQueryString(params) {
	var ignore = arguments.length <= 1 || arguments[1] === undefined ? [] : arguments[1];

	return Object.keys(params).reduce(function (pairs, key) {
		var value = params[key];
		if (value !== null && value !== '' && ignore.indexOf(key) === -1) {
			pairs.push(key + '=' + encodeURIComponent(value));
		}
		return pairs;
	}, []).join('&');
}

/**
 * Open popup window.
 *
 * @param {String} url URL.
 * @param {Number} options.width Width.
 * @param {Number} options.height Height.
 * @param {String} options.name Window name.
 * @return {Object}
 */
function openPopup(url, _ref) {
	var width = _ref.width;
	var height = _ref.height;
	var name = _ref.name;

	var left = Math.round(screen.width / 2 - width / 2);
	var top = 0;
	if (screen.height > height) {
		top = Math.round(screen.height / 3 - height / 2);
	}

	var win = window.open(url, name, '\n\t\tleft=' + left + ',\n\t\ttop=' + top + ',\n\t\twidth=' + width + ',\n\t\theight=' + height + ',\n\t\tpersonalbar=0,\n\t\ttoolbar=0,\n\t\tscrollbars=1,\n\t\tresizable=1\n\t');
	if (win) {
		win.focus();
		return win;
	}
	location.href = url;
	return null;
}

/**
 * Template with encodeURIComponent for URLs.
 *
 * @param {String} url URL template.
 * @param {Object} context Replacements object.
 * @return {String}
 */
function makeUrl(url, context) {
	return template(url, context, encodeURIComponent);
}

/**
 * Simple template.
 *
 * @param {string} tmpl Template.
 * @param {Object} context Replacements object.
 * @param {Function} [filter] Value filter function.
 * @return {string}
 */
function template(tmpl, context, filter) {
	return tmpl.replace(/\{([^}]+)}/g, function (m, key) {
		var value = filter ? filter(context[key]) : context[key];
		return value || '';
	});
}

/**
 * Generate BEM class names for a block or element.
 * Block name is fixed to the ${prefix} value.
 *
 * @param {string} [elem] Element name.
 * @param {string} [mod] Modifier.
 * @return {string}
 */
function className(elem, mod) {
	var base = _config.prefix + (elem ? '' + _config.elemDelimiter + elem : '');
	return base + (mod ? ' ' + base + _config.modDelimiter + mod : '');
}

/**
 * Convert array like object to array.
 *
 * @param {Object} list Array like object.
 * @returns {Array}
 */
function toArray(list) {
	return Array.prototype.slice.call(list);
}

/**
 * Return SVG code of an icon.
 *
 * @param {string|string[]} paths SVG path of an icon.
 * @param {string} cls CSS class name.
 * @return {string}
 */
function svg(paths, cls) {
	if (!Array.isArray(paths)) {
		paths = [paths];
	}
	paths = paths.map(function (p) {
		return '<path d="' + p + '"/>';
	});
	return '\n\t\t<svg class="' + cls + '" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">\n\t\t\t' + paths.join('\n') + '\n\t\t</svg>\n\t';
}

/***/ }),

/***/ "./node_modules/social-likes-next/node_modules/deepmerge/index.js":
/*!************************************************************************!*\
  !*** ./node_modules/social-likes-next/node_modules/deepmerge/index.js ***!
  \************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var __WEBPACK_AMD_DEFINE_FACTORY__, __WEBPACK_AMD_DEFINE_RESULT__;(function (root, factory) {
    if (true) {
        !(__WEBPACK_AMD_DEFINE_FACTORY__ = (factory),
				__WEBPACK_AMD_DEFINE_RESULT__ = (typeof __WEBPACK_AMD_DEFINE_FACTORY__ === 'function' ?
				(__WEBPACK_AMD_DEFINE_FACTORY__.call(exports, __webpack_require__, exports, module)) :
				__WEBPACK_AMD_DEFINE_FACTORY__),
				__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__));
    } else {}
}(this, function () {

return function deepmerge(target, src) {
    var array = Array.isArray(src);
    var dst = array && [] || {};

    if (array) {
        target = target || [];
        dst = dst.concat(target);
        src.forEach(function(e, i) {
            if (typeof dst[i] === 'undefined') {
                dst[i] = e;
            } else if (typeof e === 'object') {
                dst[i] = deepmerge(target[i], e);
            } else {
                if (target.indexOf(e) === -1) {
                    dst.push(e);
                }
            }
        });
    } else {
        if (target && typeof target === 'object') {
            Object.keys(target).forEach(function (key) {
                dst[key] = target[key];
            })
        }
        Object.keys(src).forEach(function (key) {
            if (typeof src[key] !== 'object' || !src[key]) {
                dst[key] = src[key];
            }
            else {
                if (!target[key]) {
                    dst[key] = src[key];
                } else {
                    dst[key] = deepmerge(target[key], src[key]);
                }
            }
        });
    }

    return dst;
}

}));


/***/ }),

/***/ "./node_modules/vanilla-lazyload/dist/lazyload.js":
/*!********************************************************!*\
  !*** ./node_modules/vanilla-lazyload/dist/lazyload.js ***!
  \********************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var __WEBPACK_AMD_DEFINE_FACTORY__, __WEBPACK_AMD_DEFINE_RESULT__;function _extends() { _extends = Object.assign || function (target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i]; for (var key in source) { if (Object.prototype.hasOwnProperty.call(source, key)) { target[key] = source[key]; } } } return target; }; return _extends.apply(this, arguments); }

function _typeof(obj) { if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

(function (global, factory) {
  ( false ? undefined : _typeof(exports)) === 'object' && typeof module !== 'undefined' ? module.exports = factory() :  true ? !(__WEBPACK_AMD_DEFINE_FACTORY__ = (factory),
				__WEBPACK_AMD_DEFINE_RESULT__ = (typeof __WEBPACK_AMD_DEFINE_FACTORY__ === 'function' ?
				(__WEBPACK_AMD_DEFINE_FACTORY__.call(exports, __webpack_require__, exports, module)) :
				__WEBPACK_AMD_DEFINE_FACTORY__),
				__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__)) : undefined;
})(this, function () {
  'use strict';

  var runningOnBrowser = typeof window !== "undefined";
  var isBot = runningOnBrowser && !("onscroll" in window) || typeof navigator !== "undefined" && /(gle|ing|ro)bot|crawl|spider/i.test(navigator.userAgent);
  var supportsIntersectionObserver = runningOnBrowser && "IntersectionObserver" in window;
  var supportsClassList = runningOnBrowser && "classList" in document.createElement("p");
  var defaultSettings = {
    elements_selector: "img",
    container: isBot || runningOnBrowser ? document : null,
    threshold: 300,
    thresholds: null,
    data_src: "src",
    data_srcset: "srcset",
    data_sizes: "sizes",
    data_bg: "bg",
    class_loading: "loading",
    class_loaded: "loaded",
    class_error: "error",
    load_delay: 0,
    auto_unobserve: true,
    callback_enter: null,
    callback_exit: null,
    callback_reveal: null,
    callback_loaded: null,
    callback_error: null,
    callback_finish: null
  };

  var getInstanceSettings = function getInstanceSettings(customSettings) {
    return _extends({}, defaultSettings, customSettings);
  };

  var dataPrefix = "data-";
  var processedDataName = "was-processed";
  var timeoutDataName = "ll-timeout";
  var trueString = "true";

  var getData = function getData(element, attribute) {
    return element.getAttribute(dataPrefix + attribute);
  };

  var setData = function setData(element, attribute, value) {
    var attrName = dataPrefix + attribute;

    if (value === null) {
      element.removeAttribute(attrName);
      return;
    }

    element.setAttribute(attrName, value);
  };

  var setWasProcessedData = function setWasProcessedData(element) {
    return setData(element, processedDataName, trueString);
  };

  var getWasProcessedData = function getWasProcessedData(element) {
    return getData(element, processedDataName) === trueString;
  };

  var setTimeoutData = function setTimeoutData(element, value) {
    return setData(element, timeoutDataName, value);
  };

  var getTimeoutData = function getTimeoutData(element) {
    return getData(element, timeoutDataName);
  };

  var purgeProcessedElements = function purgeProcessedElements(elements) {
    return elements.filter(function (element) {
      return !getWasProcessedData(element);
    });
  };

  var purgeOneElement = function purgeOneElement(elements, elementToPurge) {
    return elements.filter(function (element) {
      return element !== elementToPurge;
    });
  };
  /* Creates instance and notifies it through the window element */


  var createInstance = function createInstance(classObj, options) {
    var event;
    var eventString = "LazyLoad::Initialized";
    var instance = new classObj(options);

    try {
      // Works in modern browsers
      event = new CustomEvent(eventString, {
        detail: {
          instance: instance
        }
      });
    } catch (err) {
      // Works in Internet Explorer (all versions)
      event = document.createEvent("CustomEvent");
      event.initCustomEvent(eventString, false, false, {
        instance: instance
      });
    }

    window.dispatchEvent(event);
  };
  /* Auto initialization of one or more instances of lazyload, depending on the 
      options passed in (plain object or an array) */


  function autoInitialize(classObj, options) {
    if (!options) {
      return;
    }

    if (!options.length) {
      // Plain object
      createInstance(classObj, options);
    } else {
      // Array of objects
      for (var i = 0, optionsItem; optionsItem = options[i]; i += 1) {
        createInstance(classObj, optionsItem);
      }
    }
  }

  var callbackIfSet = function callbackIfSet(callback, argument) {
    if (callback) {
      callback(argument);
    }
  };

  var updateLoadingCount = function updateLoadingCount(instance, plusMinus) {
    instance._loadingCount += plusMinus;

    if (instance._elements.length === 0 && instance._loadingCount === 0) {
      callbackIfSet(instance._settings.callback_finish);
    }
  };

  var getSourceTags = function getSourceTags(parentTag) {
    var sourceTags = [];

    for (var i = 0, childTag; childTag = parentTag.children[i]; i += 1) {
      if (childTag.tagName === "SOURCE") {
        sourceTags.push(childTag);
      }
    }

    return sourceTags;
  };

  var setAttributeIfValue = function setAttributeIfValue(element, attrName, value) {
    if (!value) {
      return;
    }

    element.setAttribute(attrName, value);
  };

  var setImageAttributes = function setImageAttributes(element, settings) {
    setAttributeIfValue(element, "sizes", getData(element, settings.data_sizes));
    setAttributeIfValue(element, "srcset", getData(element, settings.data_srcset));
    setAttributeIfValue(element, "src", getData(element, settings.data_src));
  };

  var setSourcesImg = function setSourcesImg(element, settings) {
    var parent = element.parentNode;

    if (parent && parent.tagName === "PICTURE") {
      var sourceTags = getSourceTags(parent);
      sourceTags.forEach(function (sourceTag) {
        setImageAttributes(sourceTag, settings);
      });
    }

    setImageAttributes(element, settings);
  };

  var setSourcesIframe = function setSourcesIframe(element, settings) {
    setAttributeIfValue(element, "src", getData(element, settings.data_src));
  };

  var setSourcesVideo = function setSourcesVideo(element, settings) {
    var sourceTags = getSourceTags(element);
    sourceTags.forEach(function (sourceTag) {
      setAttributeIfValue(sourceTag, "src", getData(sourceTag, settings.data_src));
    });
    setAttributeIfValue(element, "src", getData(element, settings.data_src));
    element.load();
  };

  var setSourcesBgImage = function setSourcesBgImage(element, settings) {
    var srcDataValue = getData(element, settings.data_src);
    var bgDataValue = getData(element, settings.data_bg);

    if (srcDataValue) {
      element.style.backgroundImage = "url(\"".concat(srcDataValue, "\")");
    }

    if (bgDataValue) {
      element.style.backgroundImage = bgDataValue;
    }
  };

  var setSourcesFunctions = {
    IMG: setSourcesImg,
    IFRAME: setSourcesIframe,
    VIDEO: setSourcesVideo
  };

  var setSources = function setSources(element, instance) {
    var settings = instance._settings;
    var tagName = element.tagName;
    var setSourcesFunction = setSourcesFunctions[tagName];

    if (setSourcesFunction) {
      setSourcesFunction(element, settings);
      updateLoadingCount(instance, 1);
      instance._elements = purgeOneElement(instance._elements, element);
      return;
    }

    setSourcesBgImage(element, settings);
  };

  var addClass = function addClass(element, className) {
    if (supportsClassList) {
      element.classList.add(className);
      return;
    }

    element.className += (element.className ? " " : "") + className;
  };

  var removeClass = function removeClass(element, className) {
    if (supportsClassList) {
      element.classList.remove(className);
      return;
    }

    element.className = element.className.replace(new RegExp("(^|\\s+)" + className + "(\\s+|$)"), " ").replace(/^\s+/, "").replace(/\s+$/, "");
  };

  var genericLoadEventName = "load";
  var mediaLoadEventName = "loadeddata";
  var errorEventName = "error";

  var addEventListener = function addEventListener(element, eventName, handler) {
    element.addEventListener(eventName, handler);
  };

  var removeEventListener = function removeEventListener(element, eventName, handler) {
    element.removeEventListener(eventName, handler);
  };

  var addEventListeners = function addEventListeners(element, loadHandler, errorHandler) {
    addEventListener(element, genericLoadEventName, loadHandler);
    addEventListener(element, mediaLoadEventName, loadHandler);
    addEventListener(element, errorEventName, errorHandler);
  };

  var removeEventListeners = function removeEventListeners(element, loadHandler, errorHandler) {
    removeEventListener(element, genericLoadEventName, loadHandler);
    removeEventListener(element, mediaLoadEventName, loadHandler);
    removeEventListener(element, errorEventName, errorHandler);
  };

  var eventHandler = function eventHandler(event, success, instance) {
    var settings = instance._settings;
    var className = success ? settings.class_loaded : settings.class_error;
    var callback = success ? settings.callback_loaded : settings.callback_error;
    var element = event.target;
    removeClass(element, settings.class_loading);
    addClass(element, className);
    callbackIfSet(callback, element);
    updateLoadingCount(instance, -1);
  };

  var addOneShotEventListeners = function addOneShotEventListeners(element, instance) {
    var loadHandler = function loadHandler(event) {
      eventHandler(event, true, instance);
      removeEventListeners(element, loadHandler, errorHandler);
    };

    var errorHandler = function errorHandler(event) {
      eventHandler(event, false, instance);
      removeEventListeners(element, loadHandler, errorHandler);
    };

    addEventListeners(element, loadHandler, errorHandler);
  };

  var managedTags = ["IMG", "IFRAME", "VIDEO"];

  var onEnter = function onEnter(element, instance) {
    var settings = instance._settings;
    callbackIfSet(settings.callback_enter, element);

    if (!settings.load_delay) {
      revealAndUnobserve(element, instance);
      return;
    }

    delayLoad(element, instance);
  };

  var revealAndUnobserve = function revealAndUnobserve(element, instance) {
    var observer = instance._observer;
    revealElement(element, instance);

    if (observer && instance._settings.auto_unobserve) {
      observer.unobserve(element);
    }
  };

  var onExit = function onExit(element, instance) {
    var settings = instance._settings;
    callbackIfSet(settings.callback_exit, element);

    if (!settings.load_delay) {
      return;
    }

    cancelDelayLoad(element);
  };

  var cancelDelayLoad = function cancelDelayLoad(element) {
    var timeoutId = getTimeoutData(element);

    if (!timeoutId) {
      return; // do nothing if timeout doesn't exist
    }

    clearTimeout(timeoutId);
    setTimeoutData(element, null);
  };

  var delayLoad = function delayLoad(element, instance) {
    var loadDelay = instance._settings.load_delay;
    var timeoutId = getTimeoutData(element);

    if (timeoutId) {
      return; // do nothing if timeout already set
    }

    timeoutId = setTimeout(function () {
      revealAndUnobserve(element, instance);
      cancelDelayLoad(element);
    }, loadDelay);
    setTimeoutData(element, timeoutId);
  };

  var revealElement = function revealElement(element, instance, force) {
    var settings = instance._settings;

    if (!force && getWasProcessedData(element)) {
      return; // element has already been processed and force wasn't true
    }

    if (managedTags.indexOf(element.tagName) > -1) {
      addOneShotEventListeners(element, instance);
      addClass(element, settings.class_loading);
    }

    setSources(element, instance);
    setWasProcessedData(element);
    callbackIfSet(settings.callback_reveal, element);
    callbackIfSet(settings.callback_set, element);
  };

  var isIntersecting = function isIntersecting(entry) {
    return entry.isIntersecting || entry.intersectionRatio > 0;
  };

  var getObserverSettings = function getObserverSettings(settings) {
    return {
      root: settings.container === document ? null : settings.container,
      rootMargin: settings.thresholds || settings.threshold + "px"
    };
  };

  var setObserver = function setObserver(instance) {
    if (!supportsIntersectionObserver) {
      return false;
    }

    instance._observer = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        return isIntersecting(entry) ? onEnter(entry.target, instance) : onExit(entry.target, instance);
      });
    }, getObserverSettings(instance._settings));
    return true;
  };

  var LazyLoad = function LazyLoad(customSettings, elements) {
    this._settings = getInstanceSettings(customSettings);
    this._loadingCount = 0;
    setObserver(this);
    this.update(elements);
  };

  LazyLoad.prototype = {
    update: function update(elements) {
      var _this = this;

      var settings = this._settings;

      var _elements = elements || settings.container.querySelectorAll(settings.elements_selector);

      this._elements = purgeProcessedElements(Array.prototype.slice.call(_elements) // NOTE: nodeset to array for IE compatibility
      );

      if (isBot || !this._observer) {
        this.loadAll();
        return;
      }

      this._elements.forEach(function (element) {
        _this._observer.observe(element);
      });
    },
    destroy: function destroy() {
      var _this2 = this;

      if (this._observer) {
        this._elements.forEach(function (element) {
          _this2._observer.unobserve(element);
        });

        this._observer = null;
      }

      this._elements = null;
      this._settings = null;
    },
    load: function load(element, force) {
      revealElement(element, this, force);
    },
    loadAll: function loadAll() {
      var _this3 = this;

      var elements = this._elements;
      elements.forEach(function (element) {
        revealAndUnobserve(element, _this3);
      });
    }
  };
  /* Automatic instances creation if required (useful for async script loading) */

  if (runningOnBrowser) {
    autoInitialize(LazyLoad, window.lazyLoadOptions);
  }

  return LazyLoad;
});

/***/ }),

/***/ "./themes/lovata-shopaholic-sneakers/js/lazy-load.js":
/*!***********************************************************!*\
  !*** ./themes/lovata-shopaholic-sneakers/js/lazy-load.js ***!
  \***********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var vanilla_lazyload_dist_lazyload__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vanilla-lazyload/dist/lazyload */ "./node_modules/vanilla-lazyload/dist/lazyload.js");
/* harmony import */ var vanilla_lazyload_dist_lazyload__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(vanilla_lazyload_dist_lazyload__WEBPACK_IMPORTED_MODULE_0__);

/* harmony default export */ __webpack_exports__["default"] = (new class LazyLoadInit {
  constructor() {
    this.lazySelector = 'js-lazy-load';
    this.finishSelector = 'lazy-finish';
    this.handler();
  }

  handler() {
    document.addEventListener('DOMContentLoaded', () => {
      this.init();
    });
  }

  init() {
    const lazyElms = document.querySelector(".".concat(this.lazySelector));
    if (!lazyElms) return;
    this.initLazyLoad();
  }

  update() {
    const lazyElms = document.querySelector(".".concat(this.lazySelector));
    if (!lazyElms) return;
    this.initLazyLoad();
    this.myLazyLoad.update();
  }

  initLazyLoad() {
    if (this.myLazyLoad) return;
    this.myLazyLoad = new vanilla_lazyload_dist_lazyload__WEBPACK_IMPORTED_MODULE_0___default.a({
      elements_selector: ".".concat(this.lazySelector),
      class_loaded: this.finishSelector,
      callback_loaded: node => {
        const {
          parentElement
        } = node;
        if (!parentElement.tagName === 'PICTURE') return;
        parentElement.classList.add(this.finishSelector);
      }
    });
  }

  loadAll() {
    const lazyElms = document.querySelector(".".concat(this.lazySelector));
    if (!lazyElms) return;
    this.myLazyLoad.loadAll();
  }

}());

/***/ }),

/***/ "./themes/lovata-shopaholic-sneakers/pages/news-list.js":
/*!**************************************************************!*\
  !*** ./themes/lovata-shopaholic-sneakers/pages/news-list.js ***!
  \**************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _partials_article_news_list_news_list__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../partials/article/news-list/news-list */ "./themes/lovata-shopaholic-sneakers/partials/article/news-list/news-list.js");
/* harmony import */ var social_likes_next__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! social-likes-next */ "./node_modules/social-likes-next/lib/index.js");
/* harmony import */ var social_likes_next__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(social_likes_next__WEBPACK_IMPORTED_MODULE_1__);



/***/ }),

/***/ "./themes/lovata-shopaholic-sneakers/partials/article/news-list/news-list.js":
/*!***********************************************************************************!*\
  !*** ./themes/lovata-shopaholic-sneakers/partials/article/news-list/news-list.js ***!
  \***********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* WEBPACK VAR INJECTION */(function($) {/* harmony import */ var _js_lazy_load__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../js/lazy-load */ "./themes/lovata-shopaholic-sneakers/js/lazy-load.js");

/* harmony default export */ __webpack_exports__["default"] = (new class NewsList {
  constructor() {
    this.tabBtnSelector = 'news-list__btn';
    this.tabActiveRtnSelector = 'news-list__btn_active';
    this.ajaxWrapperSelector = 'news-list__wrapper';
    this.preLoaderSelector = 'news-list__preloader';
    this.init();
  }

  init() {
    this.tabCollection = document.querySelectorAll(".".concat(this.tabBtnSelector));
    if (!this.tabCollection) return;
    [...this.tabCollection].forEach(el => this.clickHandler(el));
  }

  clickHandler(button) {
    button.addEventListener('click', () => {
      if (button.matches(".".concat(this.tabActiveRtnSelector))) return;
      const {
        id
      } = button.dataset;
      this.updateList(id, button);
    });
  }

  updateList(id, button) {
    const $this = this;
    $.request('ArticleList::onAjaxRequest', {
      data: {
        category_id: id
      },
      update: {
        'article/news-list/news-list-ajax': ".".concat(this.ajaxWrapperSelector)
      },
      success: function success(res) {
        // eslint-disable-line object-shorthand, func-names
        this.success(res);
        $this.changeActiveTab(button);
        _js_lazy_load__WEBPACK_IMPORTED_MODULE_0__["default"].update();
      },
      loading: ".".concat(this.preLoaderSelector)
    });
  }

  changeActiveTab(button) {
    [...this.tabCollection].forEach(el => el.classList.remove(this.tabActiveRtnSelector));
    button.classList.add(this.tabActiveRtnSelector);
  }

}());
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js")))

/***/ }),

/***/ 5:
/*!********************************************************************!*\
  !*** multi ./themes/lovata-shopaholic-sneakers/pages/news-list.js ***!
  \********************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /sr/apache/vivankovich.com/october/themes/lovata-shopaholic-sneakers/pages/news-list.js */"./themes/lovata-shopaholic-sneakers/pages/news-list.js");


/***/ })

},[[5,"/js/manifest","/js/vendor"]]]);
//# sourceMappingURL=news-list.js.map