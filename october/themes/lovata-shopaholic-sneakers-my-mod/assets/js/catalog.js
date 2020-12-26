(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["/js/catalog"],{

/***/ "./themes/lovata-shopaholic-sneakers/js/lazy-load.js":
/*!***********************************************************!*\
  !*** ./themes/lovata-shopaholic-sneakers/js/lazy-load.js ***!
  \***********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var vanilla_lazyload_dist_lazyload__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vanilla-lazyload/dist/lazyload */ "./themes/lovata-shopaholic-sneakers/node_modules/vanilla-lazyload/dist/lazyload.js");
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

/***/ "./themes/lovata-shopaholic-sneakers/node_modules/@lovata/popup-helper/popup-helper.js":
/*!*********************************************************************************************!*\
  !*** ./themes/lovata-shopaholic-sneakers/node_modules/@lovata/popup-helper/popup-helper.js ***!
  \*********************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var focus_trap__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! focus-trap */ "./themes/lovata-shopaholic-sneakers/node_modules/focus-trap/index.js");
/* harmony import */ var focus_trap__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(focus_trap__WEBPACK_IMPORTED_MODULE_0__);
/**
 * @author  Uladzimir Ambrazhei, v.ambrazhey@lovata.com, LOVATA Group
 */



/* harmony default export */ __webpack_exports__["default"] = (new class popupHelper {
  constructor() {
    this.noScrollSelector = '_noscroll';
    this.overlaySelector = 'overlay';

    this.bodyPaddingProp = '--body-padding';

    this.openModalStateAttr = 'data-modal-open';
    this.pageOffset = '';
  }

  /**
   * @param {string} cssClass
   * @description Set custom css class for 'body';
   */

  changeNoScrollSelector(cssClass) {
    this.noScrollSelector = cssClass;
  }

   /**
   * Return scroll position
   */
  saveScrollPosition() {
    this.pageOffset = window.pageYOffset;
    window.scrollTo(null, this.pageOffset);
  }

   /**
   * Save scroll position before modal opening
   */
  setScrollPosition() {
    window.scrollTo(null, this.pageOffset);
  }

  /**
   * @description Complex method. Depending  @param needScroll toggle class on body, 
   * save or set scroll position and padding to avoid shifting content 
   * @param {boolean}  
   */
  setBodyScrollState(needScroll) {
    const body = document.querySelector('body');

    if (needScroll) {
      body.classList.remove(this.noScrollSelector);

      this.setScrollPosition();
    } else {
      this.saveScrollPosition();
      this.setScrollPosition();
      this.setBodyPadding();
      body.classList.add(this.noScrollSelector);
    }
  }

  /**
   * @param {boolena} needTrap if true - enable focus trap
   * @param {node} modal node of modal window
   */
  focusTrapManager(needTrap, modal) {
    if (needTrap) {
      this.focusTrap = focus_trap__WEBPACK_IMPORTED_MODULE_0___default()(modal, {
        clickOutsideDeactivates: true,
      });
      this.focusTrap.activate();
    } else {
      this.focusTrap.deactivate();
    }
  }

  /**
   * @static
   * @returns scrollBar width
   */
  static getScrollBarWidth() {
    return window.innerWidth - document.body.clientWidth;
  }

  /**
   * @description Set css custom-property equal scrollbar width
   */

  setBodyPadding() {
    const scrollWidth = this.constructor.getScrollBarWidth();
    document.body.style.setProperty(this.bodyPaddingProp, `${scrollWidth}px`);
  }
    
  /**
   * @description Return false if overlay was create
   * @return {boolean} 
   */

  checkOverlay() {
    const overlay = this.getOverlay();
    return !!overlay;
  }
  
  /**
   * @param {boolean} needOverlay 
   * @description if @param needOverlay is true create Node for overlay, else remove it
   */

  overlayController(needOverlay) {
    if (needOverlay) {
      this.createOverlay();
    } else {
      this.removeOverlay();
    }
  }

  /**
   * @param {boolean} isInit 
   * @param {node} closeBtnNode 
   * @param {node} modalNode 
   * @description Complex method. Create of remove overlay and if @param isInit is true, so set flags and `click` and `esc button press` handlers
   */

  overlayHandler(isInit, closeBtnNode, modalNode) {
    this.overlayController(isInit);

    if (isInit) {
      modalNode.setAttribute(this.openModalStateAttr, true);
      this.overlayClickHandler(closeBtnNode);
      this.escPressHandler(closeBtnNode, modalNode);
    }
  }

  /**
   * @description Create overlay node
   */
  createOverlay() {
    if (this.checkOverlay()) return;

    const div = document.createElement('div');
    const body = document.querySelector('body');
    div.classList.add(this.overlaySelector);

    body.append(div);
  }
  
  /**
   * @description Remove overlay node
   */
  removeOverlay() {
    if (!this.checkOverlay()) return;

    document.querySelector(`.${this.overlaySelector}`).remove();
  }

  /**
   * @returns overlay node
   */
  getOverlay() {
    return document.querySelector(`.${this.overlaySelector}`);
  }

  /**
   * @param {node} triggerTarget Node for close modal window
   * @description Add 'click' handler to overlay 
   */
  overlayClickHandler(triggerTarget) {
    const overlay = this.getOverlay();

    if (!overlay) return;

    overlay.addEventListener('click', () => {
      triggerTarget.click();
    });
  }
  
  /**
   * @param {node} triggerTarget Node for close modal window
   * @param {node} modalNode  Node of modal window
   * @description  Add esc button handler
   */
  escPressHandler(triggerTarget, modalNode) {
    if (!triggerTarget || !modalNode) return;

    document.addEventListener('keydown', ({ which }) => {
      if (!this.checkOverlay()) return;

      if (which === 27 && modalNode.hasAttribute(this.openModalStateAttr)) {
        const overlay = this.getOverlay();
        overlay.click();
      }
    });
  }
}());


/***/ }),

/***/ "./themes/lovata-shopaholic-sneakers/node_modules/@lovata/shopaholic-filter-panel/shopaholic-filter-panel.js":
/*!*******************************************************************************************************************!*\
  !*** ./themes/lovata-shopaholic-sneakers/node_modules/@lovata/shopaholic-filter-panel/shopaholic-filter-panel.js ***!
  \*******************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* WEBPACK VAR INJECTION */(function($) {/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return ShopaholicFilterPanel; });
/* harmony import */ var _lovata_url_generation__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @lovata/url-generation */ "./themes/lovata-shopaholic-sneakers/node_modules/@lovata/url-generation/url-generation.js");


/**
 * @author  Andrey Kharanenka, a.khoronenko@lovata.com, LOVATA Group
 */
class ShopaholicFilterPanel {
  /**
   * @param {ShopaholicProductList} obProductListHelper
   */
  constructor(obProductListHelper = null) {
    this.obProductListHelper = obProductListHelper;
    this.sEventType = 'change';
    this.sFiledName = 'property';
    this.sFilterType = 'data-filter-type';
    this.sPropertyIDAttribute = 'data-property-id';

    this.sDefaultWrapperClass = '_shopaholic-filter-wrapper';
    this.sWrapperSelector = `.${this.sDefaultWrapperClass}`;
  }

  /**
   * Init event handlers
   */
  init() {
    $(document).on(this.sEventType, this.sWrapperSelector, () => {
      _lovata_url_generation__WEBPACK_IMPORTED_MODULE_0__["default"].init();
      this.prepareRequestData();

      _lovata_url_generation__WEBPACK_IMPORTED_MODULE_0__["default"].remove('page');
      _lovata_url_generation__WEBPACK_IMPORTED_MODULE_0__["default"].update();
      if (!this.obProductListHelper) {
        return;
      }

      this.obProductListHelper.send();
    });
  }

  prepareRequestData() {
    const obFilterList = $(this.sWrapperSelector);
    if (obFilterList.length == 0) {
      return;
    }

    obFilterList.each((iNumber) => {
      //Get filter type
      const obWrapper = $(obFilterList[iNumber]),
        sFilterType = obWrapper.attr(this.sFilterType),
        iPropertyID = obWrapper.attr(this.sPropertyIDAttribute);

      let sFieldName = `${this.sFiledName}`;
      if (!sFilterType) {
        return;
      }

      if (iPropertyID) {
        sFieldName += `[${iPropertyID}]`;
      }

      let obInputList = null,
        arValueList = [];

      if (sFilterType == 'between') {
        obInputList = obWrapper.find('input');
      } else if (sFilterType == 'checkbox' || sFilterType == 'switch') {
        obInputList = obWrapper.find('input[type="checkbox"]:checked');
      } else if (sFilterType == 'select' || sFilterType == 'select_between') {
        obInputList = obWrapper.find('select');
      }

      if (!obInputList || obInputList.length == 0) {
        _lovata_url_generation__WEBPACK_IMPORTED_MODULE_0__["default"].remove(sFieldName);
        return;
      }

      obInputList.each((iInputNumber) => {
        const sValue = $(obInputList[iInputNumber]).val();
        if (!sValue) {
          return;
        }

        arValueList.push(sValue);
      });

      if (!arValueList || arValueList.length == 0) {
        _lovata_url_generation__WEBPACK_IMPORTED_MODULE_0__["default"].remove(sFieldName);
      } else {
        _lovata_url_generation__WEBPACK_IMPORTED_MODULE_0__["default"].set(sFieldName, arValueList);
      }
    });
  }

  /**
   * Redeclare default selector of filter input
   * Default value is "_shopaholic-filter-wrapper"
   *
   * @param {string} sWrapperSelector
   * @returns {ShopaholicFilterPanel}
   */
  setWrapperSelector(sWrapperSelector) {
    this.sWrapperSelector = sWrapperSelector;

    return this;
  }

  /**
   * Redeclare default event type
   * Default value is "change"
   *
   * @param {string} sEventType
   * @returns {ShopaholicFilterPanel}
   */
  setEventType(sEventType) {
    this.sEventType = sEventType;

    return this;
  }

  /**
   * Redeclare default URL filed name
   * Default value is "property"
   *
   * @param {string} sFieldName
   * @returns {ShopaholicFilterPanel}
   */
  setFieldName(sFieldName) {
    this.sFiledName = sFieldName;

    return this;
  }
}
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! jquery */ "./themes/lovata-shopaholic-sneakers/node_modules/jquery/dist/jquery.js")))

/***/ }),

/***/ "./themes/lovata-shopaholic-sneakers/node_modules/@lovata/shopaholic-filter-panel/shopaholic-filter-price.js":
/*!*******************************************************************************************************************!*\
  !*** ./themes/lovata-shopaholic-sneakers/node_modules/@lovata/shopaholic-filter-panel/shopaholic-filter-price.js ***!
  \*******************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* WEBPACK VAR INJECTION */(function($) {/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return ShopaholicFilterPrice; });
/* harmony import */ var _lovata_url_generation__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @lovata/url-generation */ "./themes/lovata-shopaholic-sneakers/node_modules/@lovata/url-generation/url-generation.js");


/**
 * @author  Andrey Kharanenka, a.khoronenko@lovata.com, LOVATA Group
 */
class ShopaholicFilterPrice {
  /**
   * @param {ShopaholicProductList} obProductListHelper
   */
  constructor(obProductListHelper = null) {
    this.obProductListHelper = obProductListHelper;
    this.sEventType = 'change';
    this.sFiledName = 'price';

    this.sInputMinPriceName = 'filter-min-price';
    this.sInputMaxPriceName = 'filter-max-price';

    this.sDefaultInputClass = '_shopaholic-price-filter';
    this.sInputSelector = `.${this.sDefaultInputClass}`;

    this.iCallBackDelay = 400;
  }

  /**
   * Init event handlers
   */
  init() {
    $(document).on(this.sEventType, this.sInputSelector, () => {
      if (this.sEventType === 'input') {
        clearTimeout(this.timer);

        this.timer = setTimeout(() => {
          this.priceChangeCallBack();
        }, this.iCallBackDelay);
      } else {
        this.priceChangeCallBack();
      }
    });

    $(document).on('input', this.sInputSelector, ({ currentTarget }) => {
      const { value } = currentTarget;
      const correctValue = value.replace(/[^\d.]/g, '');

      currentTarget.value = correctValue; // eslint-disable-line no-param-reassign
    });
  }

  priceChangeCallBack() {
    _lovata_url_generation__WEBPACK_IMPORTED_MODULE_0__["default"].init();
    this.prepareRequestData();

    _lovata_url_generation__WEBPACK_IMPORTED_MODULE_0__["default"].remove('page');
    _lovata_url_generation__WEBPACK_IMPORTED_MODULE_0__["default"].update();
    if (!this.obProductListHelper) {
      return;
    }

    this.obProductListHelper.send();
  }

  prepareRequestData() {
    // Get min price from filter input
    const obInputList = $(this.setInputSelector);
    const obMinInput = obInputList.find(`[name=${this.sInputMinPriceName}]`);
    const obMaxInput = obInputList.find(`[name=${this.sInputMaxPriceName}]`);
    const fMinLimit = parseFloat(obMinInput.attr('min'));
    const fMaxLimit = parseFloat(obMinInput.attr('max'));

    let fMinPrice = obMinInput.val();
    let fMaxPrice = obMaxInput.val();

    if (fMinPrice > 0 && fMinPrice < fMinLimit) {
      fMinPrice = fMinLimit;
      obMinInput.val(fMinLimit);
    }

    if (fMaxPrice > 0 && fMaxPrice > fMaxLimit) {
      fMaxPrice = fMaxLimit;
      obMaxInput.val(fMaxLimit);
    }

    if (fMinPrice === 0 && fMaxPrice === 0) {
      _lovata_url_generation__WEBPACK_IMPORTED_MODULE_0__["default"].remove(this.sFiledName);
    } else {
      _lovata_url_generation__WEBPACK_IMPORTED_MODULE_0__["default"].set(this.sFiledName, [fMinPrice, fMaxPrice]);
    }
  }

  /**
   * Redeclare default selector of filter input
   * Default value is "_shopaholic-price-filter"
   *
   * @param {string} sInputSelector
   * @returns {ShopaholicFilterPrice}
   */
  setInputSelector(sInputSelector) {
    this.sInputSelector = sInputSelector;

    return this;
  }

  /**
   * Redeclare default event type
   * Default value is "change"
   *
   * @param {string} sEventType
   * @returns {ShopaholicFilterPrice}
   */
  setEventType(sEventType) {
    this.sEventType = sEventType;

    return this;
  }

  /**
   * Redeclare default input name with min price
   * Default value is "filter-min-price"
   *
   * @param {string} sInputName
   * @returns {ShopaholicFilterPrice}
   */
  setInputMinPriceName(sInputName) {
    this.sInputMinPriceName = sInputName;

    return this;
  }

  /**
   * Redeclare default input name with max price
   * Default value is "filter-max-price"
   *
   * @param {string} sInputName
   * @returns {ShopaholicFilterPrice}
   */
  setInputMaxPriceName(sInputName) {
    this.sInputMaxPriceName = sInputName;

    return this;
  }

  /**
   * Redeclare default URL filed name
   * Default value is "price"
   *
   * @param {string} sFieldName
   * @returns {ShopaholicFilterPrice}
   */
  setFieldName(sFieldName) {
    this.sFiledName = sFieldName;

    return this;
  }
}

/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! jquery */ "./themes/lovata-shopaholic-sneakers/node_modules/jquery/dist/jquery.js")))

/***/ }),

/***/ "./themes/lovata-shopaholic-sneakers/node_modules/@lovata/shopaholic-product-list/shopaholic-pagination.js":
/*!*****************************************************************************************************************!*\
  !*** ./themes/lovata-shopaholic-sneakers/node_modules/@lovata/shopaholic-product-list/shopaholic-pagination.js ***!
  \*****************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* WEBPACK VAR INJECTION */(function($) {/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return ShopaholicPagination; });
/* harmony import */ var _lovata_url_generation__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @lovata/url-generation */ "./themes/lovata-shopaholic-sneakers/node_modules/@lovata/url-generation/url-generation.js");


/**
 * @author  Andrey Kharanenka, a.khoronenko@lovata.com, LOVATA Group
 */
class ShopaholicPagination {
  /**
   * @param {ShopaholicProductList} obProductListHelper
   */
  constructor(obProductListHelper = null) {
    this.obProductListHelper = obProductListHelper;
    this.sEventType = 'click';
    this.sFiledName = 'page';
    this.sAttributeName = 'data-page';

    this.sDefaultButtonClass = '_shopaholic-pagination';
    this.sButtonSelector = `.${this.sDefaultButtonClass}`;
  }

  /**
   * Init event handlers
   */
  init() {
    $(document).on(this.sEventType, this.sButtonSelector, (obEvent) => {
      obEvent.preventDefault();
      obEvent.stopPropagation();

      const obButton = $(obEvent.currentTarget),
        iPage = obButton.attr(this.sAttributeName);

      _lovata_url_generation__WEBPACK_IMPORTED_MODULE_0__["default"].init();
      if (iPage == 1) {
        _lovata_url_generation__WEBPACK_IMPORTED_MODULE_0__["default"].remove(this.sFiledName);
      } else {
        _lovata_url_generation__WEBPACK_IMPORTED_MODULE_0__["default"].set(this.sFiledName, [iPage]);
      }

      _lovata_url_generation__WEBPACK_IMPORTED_MODULE_0__["default"].update();
      if (!this.obProductListHelper) {
        return;
      }

      this.obProductListHelper.send();
    });
  }

  /**
   * Redeclare default selector of pagination button
   * Default value is "_shopaholic-pagination"
   *
   * @param {string} sButtonSelector
   * @returns {ShopaholicPagination}
   */
  setButtonSelector(sButtonSelector) {
    this.sButtonSelector = sButtonSelector;

    return this;
  }
}
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! jquery */ "./themes/lovata-shopaholic-sneakers/node_modules/jquery/dist/jquery.js")))

/***/ }),

/***/ "./themes/lovata-shopaholic-sneakers/node_modules/@lovata/shopaholic-product-list/shopaholic-product-list.js":
/*!*******************************************************************************************************************!*\
  !*** ./themes/lovata-shopaholic-sneakers/node_modules/@lovata/shopaholic-product-list/shopaholic-product-list.js ***!
  \*******************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* WEBPACK VAR INJECTION */(function($) {/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return ShopaholicProductList; });
/**
 * @author  Andrey Kharanenka, a.khoronenko@lovata.com, LOVATA Group
 */
class ShopaholicProductList {
  constructor() {
    this.sComponentMethod = 'ProductList::onAjaxRequest';
    this.obAjaxRequestCallback = null;
  }

  /**
   * Add product to wish list
   * @param {int} iProductID
   * @param obButton
   */
  send(obRequestData = {}) {

    if (this.obAjaxRequestCallback !== null) {
      obRequestData = this.obAjaxRequestCallback(obRequestData);
    }

    $.request(this.sComponentMethod, obRequestData);
  }

  /**
   * Set ajax request callback
   *
   * @param {function} obCallback
   * @returns {ShopaholicProductList}
   */
  setAjaxRequestCallback(obCallback) {
    this.obAjaxRequestCallback = obCallback;

    return this;
  }
}

/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! jquery */ "./themes/lovata-shopaholic-sneakers/node_modules/jquery/dist/jquery.js")))

/***/ }),

/***/ "./themes/lovata-shopaholic-sneakers/node_modules/@lovata/shopaholic-product-list/shopaholic-sorting.js":
/*!**************************************************************************************************************!*\
  !*** ./themes/lovata-shopaholic-sneakers/node_modules/@lovata/shopaholic-product-list/shopaholic-sorting.js ***!
  \**************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* WEBPACK VAR INJECTION */(function($) {/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return ShopaholicSorting; });
/* harmony import */ var _lovata_url_generation__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @lovata/url-generation */ "./themes/lovata-shopaholic-sneakers/node_modules/@lovata/url-generation/url-generation.js");


/**
 * @author  Andrey Kharanenka, a.khoronenko@lovata.com, LOVATA Group
 */
class ShopaholicSorting {
  /**
   * @param {ShopaholicProductList} obProductListHelper
   */
  constructor(obProductListHelper = null) {
    this.obProductListHelper = obProductListHelper;
    this.sEventType = 'change';
    this.sFiledName = 'sort';

    this.sDefaultSelectClass = '_shopaholic-sorting';
    this.sSelectSelector = `.${this.sDefaultSelectClass}`;
  }

  /**
   * Init event handlers
   */
  init() {
    $(document).on(this.sEventType, this.sSelectSelector, (obEvent) => {
      const obSelect = $(obEvent.currentTarget),
        sSorting = obSelect.val();

      _lovata_url_generation__WEBPACK_IMPORTED_MODULE_0__["default"].init();
      _lovata_url_generation__WEBPACK_IMPORTED_MODULE_0__["default"].set(this.sFiledName, [sSorting]);
      _lovata_url_generation__WEBPACK_IMPORTED_MODULE_0__["default"].update();
      if (!this.obProductListHelper) {
        return;
      }

      this.obProductListHelper.send();
    });
  }
}
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! jquery */ "./themes/lovata-shopaholic-sneakers/node_modules/jquery/dist/jquery.js")))

/***/ }),

/***/ "./themes/lovata-shopaholic-sneakers/node_modules/@lovata/url-generation/url-generation.js":
/*!*************************************************************************************************!*\
  !*** ./themes/lovata-shopaholic-sneakers/node_modules/@lovata/url-generation/url-generation.js ***!
  \*************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/**
 * @author  Andrey Kharanenka, a.khoronenko@lovata.com, LOVATA Group
 */
/* harmony default export */ __webpack_exports__["default"] = (new class UrlGeneration {
  constructor() {
    this.sBaseURL = `${location.origin}${location.pathname}`;
    this.init();
  }

  init() {
    this.sSearchString = window.location.search.substring(1);
    this.obParamList = {};
    let arPartList = this.sSearchString.split('&');
    arPartList.forEach((sParam) => {
      let iPosition = sParam.indexOf("=");
      if (iPosition < 0) {
        return;
      }

      let sFiled = sParam.substring(0, iPosition),
        sValue = sParam.substring(iPosition + 1);
      if (!sFiled && !sValue) {
        return;
      }

      this.obParamList[sFiled] = sValue.split('|');
    });
  }

  clear() {
    this.obParamList = {};

    history.pushState(null, null, `${this.sBaseURL}`);
  }

  update() {
    this.generateSearchString();

    if (Object.keys(this.obParamList).length > 0) {
      history.pushState(null, null, `${this.sBaseURL}?${this.sSearchString}`);
    } else {
      history.pushState(null, null, `${this.sBaseURL}`);
    }
  }

  generateSearchString() {
    let arFieldList = Object.keys(this.obParamList);

    this.sSearchString = '';
    arFieldList.forEach((sField) => {
      if (this.sSearchString.length > 0) {
        this.sSearchString += '&'
      }

      this.sSearchString += `${sField}=${this.obParamList[sField].join('|')}`;
    });
  }

  /**
   * Set field value in URL
   * @param sFiled
   * @param obValue
   */
  set(sFiled, obValue) {
    if (!sFiled || !obValue) {
      return;
    }

    if (typeof obValue == 'string') {
      obValue = [obValue];
    }

    this.obParamList[sFiled] = obValue;
  }

  /**
   * Remove field value from URL
   * @param {string} sFiled
   */
  remove(sFiled) {
    if (!sFiled || !this.obParamList.hasOwnProperty(sFiled)) {
      return;
    }

    delete this.obParamList[sFiled];
  }
});

/***/ }),

/***/ "./themes/lovata-shopaholic-sneakers/node_modules/choices.js/public/assets/scripts/choices.min.js":
/*!********************************************************************************************************!*\
  !*** ./themes/lovata-shopaholic-sneakers/node_modules/choices.js/public/assets/scripts/choices.min.js ***!
  \********************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/*! choices.js v4.1.4 | (c) 2019 Josh Johnson | https://github.com/jshjohnson/Choices#readme */ 
!function(e,t){ true?module.exports=t():undefined}("undefined"!=typeof self?self:this,function(){return function(e){function t(i){if(n[i])return n[i].exports;var r=n[i]={i:i,l:!1,exports:{}};return e[i].call(r.exports,r,r.exports,t),r.l=!0,r.exports}var n={};return t.m=e,t.c=n,t.d=function(e,n,i){t.o(e,n)||Object.defineProperty(e,n,{configurable:!1,enumerable:!0,get:i})},t.n=function(e){var n=e&&e.__esModule?function(){return e.default}:function(){return e};return t.d(n,"a",n),n},t.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},t.p="/public/assets/scripts/",t(t.s=37)}([function(e,t,n){var i=n(26)("wks"),r=n(13),o=n(3).Symbol,s="function"==typeof o;(e.exports=function(e){return i[e]||(i[e]=s&&o[e]||(s?o:r)("Symbol."+e))}).store=i},function(e,t,n){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var i=t.getRandomNumber=function(e,t){return Math.floor(Math.random()*(t-e)+e)},r=t.generateChars=function(e){for(var t="",n=0;n<e;n++){t+=i(0,36).toString(36)}return t},o=(t.generateId=function(e,t){var n=e.id||e.name&&e.name+"-"+r(2)||r(4);return n=n.replace(/(:|\.|\[|\]|,)/g,""),n=t+"-"+n},t.getType=function(e){return Object.prototype.toString.call(e).slice(8,-1)}),s=t.isType=function(e,t){var n=o(t);return void 0!==t&&null!==t&&n===e},a=(t.isElement=function(e){return e instanceof Element},t.extend=function e(){for(var t={},n=arguments.length,i=0;i<n;i++){var r=arguments[i];s("Object",r)&&function(n){for(var i in n)Object.prototype.hasOwnProperty.call(n,i)&&(s("Object",n[i])?t[i]=e(!0,t[i],n[i]):t[i]=n[i])}(r)}return t},t.wrap=function(e,t){return t=t||document.createElement("div"),e.nextSibling?e.parentNode.insertBefore(t,e.nextSibling):e.parentNode.appendChild(t),t.appendChild(e)},t.findAncestor=function(e,t){for(;(e=e.parentElement)&&!e.classList.contains(t););return e},t.findAncestorByAttrName=function(e,t){for(var n=e;n;){if(n.hasAttribute(t))return n;n=n.parentElement}return null},t.getAdjacentEl=function(e,t){var n=arguments.length>2&&void 0!==arguments[2]?arguments[2]:1;if(e&&t){var i=e.parentNode.parentNode,r=Array.from(i.querySelectorAll(t));return r[r.indexOf(e)+(n>0?1:-1)]}},t.isScrolledIntoView=function(e,t){var n=arguments.length>2&&void 0!==arguments[2]?arguments[2]:1;if(e){return n>0?t.scrollTop+t.offsetHeight>=e.offsetTop+e.offsetHeight:e.offsetTop>=t.scrollTop}},t.stripHTML=function(e){return e.replace(/&/g,"&amp;").replace(/>/g,"&rt;").replace(/</g,"&lt;").replace(/"/g,"&quot;")}),c=t.strToEl=function(){var e=document.createElement("div");return function(t){var n=t.trim(),i=void 0;for(e.innerHTML=n,i=e.children[0];e.firstChild;)e.removeChild(e.firstChild);return i}}();t.calcWidthOfInput=function(e,t){var n=e.value||e.placeholder,i=e.offsetWidth;if(n){var r=c("<span>"+a(n)+"</span>");if(r.style.position="absolute",r.style.padding="0",r.style.top="-9999px",r.style.left="-9999px",r.style.width="auto",r.style.whiteSpace="pre",document.body.contains(e)&&window.getComputedStyle){var o=window.getComputedStyle(e);o&&(r.style.fontSize=o.fontSize,r.style.fontFamily=o.fontFamily,r.style.fontWeight=o.fontWeight,r.style.fontStyle=o.fontStyle,r.style.letterSpacing=o.letterSpacing,r.style.textTransform=o.textTransform,r.style.padding=o.padding)}document.body.appendChild(r),requestAnimationFrame(function(){n&&r.offsetWidth!==e.offsetWidth&&(i=r.offsetWidth+4),document.body.removeChild(r),t.call(void 0,i+"px")})}else t.call(void 0,i+"px")},t.sortByAlpha=function(e,t){var n=(e.label||e.value).toLowerCase(),i=(t.label||t.value).toLowerCase();return n<i?-1:n>i?1:0},t.sortByScore=function(e,t){return e.score-t.score},t.dispatchEvent=function(e,t){var n=arguments.length>2&&void 0!==arguments[2]?arguments[2]:null,i=new CustomEvent(t,{detail:n,bubbles:!0,cancelable:!0});return e.dispatchEvent(i)},t.regexFilter=function(e,t){return!(!e||!t)&&new RegExp(t.source,"i").test(e)},t.getWindowHeight=function(){var e=document.body,t=document.documentElement;return Math.max(e.scrollHeight,e.offsetHeight,t.clientHeight,t.scrollHeight,t.offsetHeight)},t.reduceToValues=function(e){var t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:"value";return e.reduce(function(e,n){return e.push(n[t]),e},[])},t.fetchFromObject=function e(t,n){var i=n.indexOf(".");return i>-1?e(t[n.substring(0,i)],n.substr(i+1)):t[n]},t.isIE11=function(){return!(!navigator.userAgent.match(/Trident/)||!navigator.userAgent.match(/rv[ :]11/))},t.existsInArray=function(e,t){var n=arguments.length>2&&void 0!==arguments[2]?arguments[2]:"value";return e.some(function(e){return s("String",t)?e[n]===t.trim():e[n]===t})},t.cloneObject=function(e){return JSON.parse(JSON.stringify(e))},t.doKeysMatch=function(e,t){var n=Object.keys(e).sort(),i=Object.keys(t).sort();return JSON.stringify(n)===JSON.stringify(i)}},function(e,t){var n=e.exports={version:"2.5.7"};"number"==typeof __e&&(__e=n)},function(e,t){var n=e.exports="undefined"!=typeof window&&window.Math==Math?window:"undefined"!=typeof self&&self.Math==Math?self:Function("return this")();"number"==typeof __g&&(__g=n)},function(e,t,n){var i=n(7),r=n(12);e.exports=n(10)?function(e,t,n){return i.f(e,t,r(1,n))}:function(e,t,n){return e[t]=n,e}},function(e,t,n){"use strict";Object.defineProperty(t,"__esModule",{value:!0}),t.SCROLLING_SPEED=t.KEY_CODES=t.ACTION_TYPES=t.EVENTS=t.DEFAULT_CONFIG=t.DEFAULT_CLASSNAMES=void 0;var i=n(1),r=t.DEFAULT_CLASSNAMES={containerOuter:"choices",containerInner:"choices__inner",input:"choices__input",inputCloned:"choices__input--cloned",list:"choices__list",listItems:"choices__list--multiple",listSingle:"choices__list--single",listDropdown:"choices__list--dropdown",item:"choices__item",itemSelectable:"choices__item--selectable",itemDisabled:"choices__item--disabled",itemChoice:"choices__item--choice",placeholder:"choices__placeholder",group:"choices__group",groupHeading:"choices__heading",button:"choices__button",activeState:"is-active",focusState:"is-focused",openState:"is-open",disabledState:"is-disabled",highlightedState:"is-highlighted",hiddenState:"is-hidden",flippedState:"is-flipped",loadingState:"is-loading",noResults:"has-no-results",noChoices:"has-no-choices"};t.DEFAULT_CONFIG={items:[],choices:[],silent:!1,renderChoiceLimit:-1,maxItemCount:-1,addItems:!0,removeItems:!0,removeItemButton:!1,editItems:!1,duplicateItemsAllowed:!0,delimiter:",",paste:!0,searchEnabled:!0,searchChoices:!0,searchFloor:1,searchResultLimit:4,searchFields:["label","value"],position:"auto",resetScrollPosition:!0,regexFilter:null,shouldSort:!0,shouldSortItems:!1,sortFn:i.sortByAlpha,placeholder:!0,placeholderValue:null,searchPlaceholderValue:null,prependValue:null,appendValue:null,renderSelectedChoices:"auto",loadingText:"Loading...",noResultsText:"No results found",noChoicesText:"No choices to choose from",itemSelectText:"Press to select",uniqueItemText:"Only unique values can be added",addItemText:function(e){return'Press Enter to add <b>"'+(0,i.stripHTML)(e)+'"</b>'},maxItemText:function(e){return"Only "+e+" values can be added"},itemComparer:function(e,t){return e===t},fuseOptions:{includeScore:!0},callbackOnInit:null,callbackOnCreateTemplates:null,classNames:r},t.EVENTS={showDropdown:"showDropdown",hideDropdown:"hideDropdown",change:"change",choice:"choice",search:"search",addItem:"addItem",removeItem:"removeItem",highlightItem:"highlightItem",highlightChoice:"highlightChoice"},t.ACTION_TYPES={ADD_CHOICE:"ADD_CHOICE",FILTER_CHOICES:"FILTER_CHOICES",ACTIVATE_CHOICES:"ACTIVATE_CHOICES",CLEAR_CHOICES:"CLEAR_CHOICES",ADD_GROUP:"ADD_GROUP",ADD_ITEM:"ADD_ITEM",REMOVE_ITEM:"REMOVE_ITEM",HIGHLIGHT_ITEM:"HIGHLIGHT_ITEM",CLEAR_ALL:"CLEAR_ALL"},t.KEY_CODES={BACK_KEY:46,DELETE_KEY:8,ENTER_KEY:13,A_KEY:65,ESC_KEY:27,UP_KEY:38,DOWN_KEY:40,PAGE_UP_KEY:33,PAGE_DOWN_KEY:34},t.SCROLLING_SPEED=4},function(e,t,n){var i=n(3),r=n(2),o=n(4),s=n(24),a=n(14),c=function(e,t,n){var l,u,h,d,f=e&c.F,p=e&c.G,v=e&c.S,m=e&c.P,g=e&c.B,y=p?i:v?i[t]||(i[t]={}):(i[t]||{}).prototype,_=p?r:r[t]||(r[t]={}),b=_.prototype||(_.prototype={});p&&(n=t);for(l in n)u=!f&&y&&void 0!==y[l],h=(u?y:n)[l],d=g&&u?a(h,i):m&&"function"==typeof h?a(Function.call,h):h,y&&s(y,l,h,e&c.U),_[l]!=h&&o(_,l,d),m&&b[l]!=h&&(b[l]=h)};i.core=r,c.F=1,c.G=2,c.S=4,c.P=8,c.B=16,c.W=32,c.U=64,c.R=128,e.exports=c},function(e,t,n){var i=n(8),r=n(44),o=n(45),s=Object.defineProperty;t.f=n(10)?Object.defineProperty:function(e,t,n){if(i(e),t=o(t,!0),i(n),r)try{return s(e,t,n)}catch(e){}if("get"in n||"set"in n)throw TypeError("Accessors not supported!");return"value"in n&&(e[t]=n.value),e}},function(e,t,n){var i=n(9);e.exports=function(e){if(!i(e))throw TypeError(e+" is not an object!");return e}},function(e,t){e.exports=function(e){return"object"==typeof e?null!==e:"function"==typeof e}},function(e,t,n){e.exports=!n(22)(function(){return 7!=Object.defineProperty({},"a",{get:function(){return 7}}).a})},function(e,t){var n={}.hasOwnProperty;e.exports=function(e,t){return n.call(e,t)}},function(e,t){e.exports=function(e,t){return{enumerable:!(1&e),configurable:!(2&e),writable:!(4&e),value:t}}},function(e,t){var n=0,i=Math.random();e.exports=function(e){return"Symbol(".concat(void 0===e?"":e,")_",(++n+i).toString(36))}},function(e,t,n){var i=n(46);e.exports=function(e,t,n){if(i(e),void 0===t)return e;switch(n){case 1:return function(n){return e.call(t,n)};case 2:return function(n,i){return e.call(t,n,i)};case 3:return function(n,i,r){return e.call(t,n,i,r)}}return function(){return e.apply(t,arguments)}}},function(e,t){var n={}.toString;e.exports=function(e){return n.call(e).slice(8,-1)}},function(e,t,n){var i=n(17);e.exports=function(e){return Object(i(e))}},function(e,t){e.exports=function(e){if(void 0==e)throw TypeError("Can't call method on  "+e);return e}},function(e,t,n){var i=n(19),r=Math.min;e.exports=function(e){return e>0?r(i(e),9007199254740991):0}},function(e,t){var n=Math.ceil,i=Math.floor;e.exports=function(e){return isNaN(e=+e)?0:(e>0?i:n)(e)}},function(e,t){e.exports={}},function(e,t,n){var i=n(26)("keys"),r=n(13);e.exports=function(e){return i[e]||(i[e]=r(e))}},function(e,t){e.exports=function(e){try{return!!e()}catch(e){return!0}}},function(e,t,n){var i=n(9),r=n(3).document,o=i(r)&&i(r.createElement);e.exports=function(e){return o?r.createElement(e):{}}},function(e,t,n){var i=n(3),r=n(4),o=n(11),s=n(13)("src"),a=Function.toString,c=(""+a).split("toString");n(2).inspectSource=function(e){return a.call(e)},(e.exports=function(e,t,n,a){var l="function"==typeof n;l&&(o(n,"name")||r(n,"name",t)),e[t]!==n&&(l&&(o(n,s)||r(n,s,e[t]?""+e[t]:c.join(String(t)))),e===i?e[t]=n:a?e[t]?e[t]=n:r(e,t,n):(delete e[t],r(e,t,n)))})(Function.prototype,"toString",function(){return"function"==typeof this&&this[s]||a.call(this)})},function(e,t,n){var i=n(15);e.exports=Object("z").propertyIsEnumerable(0)?Object:function(e){return"String"==i(e)?e.split(""):Object(e)}},function(e,t,n){var i=n(2),r=n(3),o=r["__core-js_shared__"]||(r["__core-js_shared__"]={});(e.exports=function(e,t){return o[e]||(o[e]=void 0!==t?t:{})})("versions",[]).push({version:i.version,mode:n(27)?"pure":"global",copyright:"© 2018 Denis Pushkarev (zloirock.ru)"})},function(e,t){e.exports=!1},function(e,t,n){var i=n(0)("unscopables"),r=Array.prototype;void 0==r[i]&&n(4)(r,i,{}),e.exports=function(e){r[i][e]=!0}},function(e,t,n){var i=n(25),r=n(17);e.exports=function(e){return i(r(e))}},function(e,t,n){var i=n(29),r=n(18),o=n(60);e.exports=function(e){return function(t,n,s){var a,c=i(t),l=r(c.length),u=o(s,l);if(e&&n!=n){for(;l>u;)if((a=c[u++])!=a)return!0}else for(;l>u;u++)if((e||u in c)&&c[u]===n)return e||u||0;return!e&&-1}}},function(e,t){e.exports="constructor,hasOwnProperty,isPrototypeOf,propertyIsEnumerable,toLocaleString,toString,valueOf".split(",")},function(e,t,n){var i=n(7).f,r=n(11),o=n(0)("toStringTag");e.exports=function(e,t,n){e&&!r(e=n?e:e.prototype,o)&&i(e,o,{configurable:!0,value:t})}},function(e,t,n){"use strict";function i(e){var t=I.call(e,w),n=e[w];try{e[w]=void 0;var i=!0}catch(e){}var r=C.call(e);return i&&(t?e[w]=n:delete e[w]),r}function r(e){return k.call(e)}function o(e){return null==e?void 0===e?P:L:D&&D in Object(e)?A(e):x(e)}function s(e,t){return function(n){return e(t(n))}}function a(e){return null!=e&&"object"==typeof e}function c(e){if(!K(e)||j(e)!=R)return!1;var t=N(e);if(null===t)return!0;var n=Y.call(t,"constructor")&&t.constructor;return"function"==typeof n&&n instanceof n&&B.call(n)==G}function l(e,t,n){function i(){p===f&&(p=f.slice())}function r(){return d}function o(e){if("function"!=typeof e)throw new Error("Expected listener to be a function.");var t=!0;return i(),p.push(e),function(){if(t){t=!1,i();var n=p.indexOf(e);p.splice(n,1)}}}function s(e){if(!W(e))throw new Error("Actions must be plain objects. Use custom middleware for async actions.");if(void 0===e.type)throw new Error('Actions may not have an undefined "type" property. Have you misspelled a constant?');if(v)throw new Error("Reducers may not dispatch actions.");try{v=!0,d=h(d,e)}finally{v=!1}for(var t=f=p,n=0;n<t.length;n++){(0,t[n])()}return e}function a(e){if("function"!=typeof e)throw new Error("Expected the nextReducer to be a function.");h=e,s({type:q.INIT})}function c(){var e,t=o;return e={subscribe:function(e){function n(){e.next&&e.next(r())}if("object"!=typeof e)throw new TypeError("Expected the observer to be an object.");return n(),{unsubscribe:t(n)}}},e[U.a]=function(){return this},e}var u;if("function"==typeof t&&void 0===n&&(n=t,t=void 0),void 0!==n){if("function"!=typeof n)throw new Error("Expected the enhancer to be a function.");return n(l)(e,t)}if("function"!=typeof e)throw new Error("Expected the reducer to be a function.");var h=e,d=t,f=[],p=f,v=!1;return s({type:q.INIT}),u={dispatch:s,subscribe:o,getState:r,replaceReducer:a},u[U.a]=c,u}function u(e,t){var n=t&&t.type;return"Given action "+(n&&'"'+n.toString()+'"'||"an action")+', reducer "'+e+'" returned undefined. To ignore an action, you must explicitly return the previous state. If you want this reducer to hold no value, you can return null instead of undefined.'}function h(e){Object.keys(e).forEach(function(t){var n=e[t];if(void 0===n(void 0,{type:q.INIT}))throw new Error('Reducer "'+t+"\" returned undefined during initialization. If the state passed to the reducer is undefined, you must explicitly return the initial state. The initial state may not be undefined. If you don't want to set a value for this reducer, you can use null instead of undefined.");if(void 0===n(void 0,{type:"@@redux/PROBE_UNKNOWN_ACTION_"+Math.random().toString(36).substring(7).split("").join(".")}))throw new Error('Reducer "'+t+"\" returned undefined when probed with a random type. Don't try to handle "+q.INIT+' or other actions in "redux/*" namespace. They are considered private. Instead, you must return the current state for any unknown actions, unless it is undefined, in which case you must return the initial state, regardless of the action type. The initial state may not be undefined, but can be null.')})}function d(e){for(var t=Object.keys(e),n={},i=0;i<t.length;i++){var r=t[i];"function"==typeof e[r]&&(n[r]=e[r])}var o=Object.keys(n),s=void 0;try{h(n)}catch(e){s=e}return function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{},t=arguments[1];if(s)throw s;for(var i=!1,r={},a=0;a<o.length;a++){var c=o[a],l=n[c],h=e[c],d=l(h,t);if(void 0===d){var f=u(c,t);throw new Error(f)}r[c]=d,i=i||d!==h}return i?r:e}}function f(e,t){return function(){return t(e.apply(void 0,arguments))}}function p(e,t){if("function"==typeof e)return f(e,t);if("object"!=typeof e||null===e)throw new Error("bindActionCreators expected an object or a function, instead received "+(null===e?"null":typeof e)+'. Did you write "import ActionCreators from" instead of "import * as ActionCreators from"?');for(var n=Object.keys(e),i={},r=0;r<n.length;r++){var o=n[r],s=e[o];"function"==typeof s&&(i[o]=f(s,t))}return i}function v(){for(var e=arguments.length,t=Array(e),n=0;n<e;n++)t[n]=arguments[n];return 0===t.length?function(e){return e}:1===t.length?t[0]:t.reduce(function(e,t){return function(){return e(t.apply(void 0,arguments))}})}function m(){for(var e=arguments.length,t=Array(e),n=0;n<e;n++)t[n]=arguments[n];return function(e){return function(n,i,r){var o=e(n,i,r),s=o.dispatch,a=[],c={getState:o.getState,dispatch:function(e){return s(e)}};return a=t.map(function(e){return e(c)}),s=v.apply(void 0,a)(o.dispatch),z({},o,{dispatch:s})}}}Object.defineProperty(t,"__esModule",{value:!0});var g=n(74),y="object"==typeof self&&self&&self.Object===Object&&self,_=g.a||y||Function("return this")(),b=_,E=b.Symbol,S=E,O=Object.prototype,I=O.hasOwnProperty,C=O.toString,w=S?S.toStringTag:void 0,A=i,T=Object.prototype,k=T.toString,x=r,L="[object Null]",P="[object Undefined]",D=S?S.toStringTag:void 0,j=o,M=s,F=M(Object.getPrototypeOf,Object),N=F,K=a,R="[object Object]",V=Function.prototype,H=Object.prototype,B=V.toString,Y=H.hasOwnProperty,G=B.call(Object),W=c,U=n(75),q={INIT:"@@redux/INIT"},z=Object.assign||function(e){for(var t=1;t<arguments.length;t++){var n=arguments[t];for(var i in n)Object.prototype.hasOwnProperty.call(n,i)&&(e[i]=n[i])}return e};n.d(t,"createStore",function(){return l}),n.d(t,"combineReducers",function(){return d}),n.d(t,"bindActionCreators",function(){return p}),n.d(t,"applyMiddleware",function(){return m}),n.d(t,"compose",function(){return v})},function(e,t){var n;n=function(){return this}();try{n=n||Function("return this")()||(0,eval)("this")}catch(e){"object"==typeof window&&(n=window)}e.exports=n},function(e,t,n){"use strict";function i(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}Object.defineProperty(t,"__esModule",{value:!0});var r=function(){function e(e,t){for(var n=0;n<t.length;n++){var i=t[n];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(e,i.key,i)}}return function(t,n,i){return n&&e(t.prototype,n),i&&e(t,i),t}}(),o=n(1),s=function(){function e(t){var n=t.element,r=t.classNames;if(i(this,e),Object.assign(this,{element:n,classNames:r}),!(0,o.isElement)(n))throw new TypeError("Invalid element passed");this.isDisabled=!1}return r(e,[{key:"conceal",value:function(){this.element.classList.add(this.classNames.input),this.element.classList.add(this.classNames.hiddenState),this.element.tabIndex="-1";var e=this.element.getAttribute("style");e&&this.element.setAttribute("data-choice-orig-style",e),this.element.setAttribute("aria-hidden","true"),this.element.setAttribute("data-choice","active")}},{key:"reveal",value:function(){this.element.classList.remove(this.classNames.input),this.element.classList.remove(this.classNames.hiddenState),this.element.removeAttribute("tabindex");var e=this.element.getAttribute("data-choice-orig-style");e?(this.element.removeAttribute("data-choice-orig-style"),this.element.setAttribute("style",e)):this.element.removeAttribute("style"),this.element.removeAttribute("aria-hidden"),this.element.removeAttribute("data-choice"),this.element.value=this.element.value}},{key:"enable",value:function(){this.element.removeAttribute("disabled"),this.element.disabled=!1,this.isDisabled=!1}},{key:"disable",value:function(){this.element.setAttribute("disabled",""),this.element.disabled=!0,this.isDisabled=!0}},{key:"triggerEvent",value:function(e,t){(0,o.dispatchEvent)(this.element,e,t)}},{key:"value",get:function(){return this.element.value}}]),e}();t.default=s},function(e,t,n){"use strict";function i(e,t,n){return t in e?Object.defineProperty(e,t,{value:n,enumerable:!0,configurable:!0,writable:!0}):e[t]=n,e}Object.defineProperty(t,"__esModule",{value:!0}),t.TEMPLATES=void 0;var r=n(89),o=function(e){return e&&e.__esModule?e:{default:e}}(r),s=n(1),a=t.TEMPLATES={containerOuter:function(e,t,n,i,r,o){var a=i?'tabindex="0"':"",c=n?'role="listbox"':"",l="";return n&&r&&(c='role="combobox"',l='aria-autocomplete="list"'),(0,s.strToEl)('\n      <div\n        class="'+e.containerOuter+'"\n        data-type="'+o+'"\n        '+c+"\n        "+a+"\n        "+l+'\n        aria-haspopup="true"\n        aria-expanded="false"\n        dir="'+t+'"\n        >\n      </div>\n    ')},containerInner:function(e){return(0,s.strToEl)('\n      <div class="'+e.containerInner+'"></div>\n    ')},itemList:function(e,t){var n,r=(0,o.default)(e.list,(n={},i(n,e.listSingle,t),i(n,e.listItems,!t),n));return(0,s.strToEl)('\n      <div class="'+r+'"></div>\n    ')},placeholder:function(e,t){return(0,s.strToEl)('\n      <div class="'+e.placeholder+'">\n        '+t+"\n      </div>\n    ")},item:function(e,t,n){var r,a=t.active?'aria-selected="true"':"",c=t.disabled?'aria-disabled="true"':"",l=(0,o.default)(e.item,(r={},i(r,e.highlightedState,t.highlighted),i(r,e.itemSelectable,!t.highlighted),i(r,e.placeholder,t.placeholder),r));if(n){var u;return l=(0,o.default)(e.item,(u={},i(u,e.highlightedState,t.highlighted),i(u,e.itemSelectable,!t.disabled),i(u,e.placeholder,t.placeholder),u)),(0,s.strToEl)('\n        <div\n          class="'+l+'"\n          data-item\n          data-id="'+t.id+'"\n          data-value="'+t.value+'"\n          data-deletable\n          '+a+"\n          "+c+"\n          >\n          "+t.label+'\x3c!--\n       --\x3e<button\n            type="button"\n            class="'+e.button+'"\n            data-button\n            aria-label="Remove item: \''+t.value+"'\"\n            >\n            Remove item\n          </button>\n        </div>\n      ")}return(0,s.strToEl)('\n      <div\n        class="'+l+'"\n        data-item\n        data-id="'+t.id+'"\n        data-value="'+t.value+'"\n        '+a+"\n        "+c+"\n        >\n        "+t.label+"\n      </div>\n    ")},choiceList:function(e,t){var n=t?"":'aria-multiselectable="true"';return(0,s.strToEl)('\n      <div\n        class="'+e.list+'"\n        dir="ltr"\n        role="listbox"\n        '+n+"\n        >\n      </div>\n    ")},choiceGroup:function(e,t){var n=t.disabled?'aria-disabled="true"':"",r=(0,o.default)(e.group,i({},e.itemDisabled,t.disabled));return(0,s.strToEl)('\n      <div\n        class="'+r+'"\n        data-group\n        data-id="'+t.id+'"\n        data-value="'+t.value+'"\n        role="group"\n        '+n+'\n        >\n        <div class="'+e.groupHeading+'">'+t.value+"</div>\n      </div>\n    ")},choice:function(e,t,n){var r,a=t.groupId>0?'role="treeitem"':'role="option"',c=(0,o.default)(e.item,e.itemChoice,(r={},i(r,e.itemDisabled,t.disabled),i(r,e.itemSelectable,!t.disabled),i(r,e.placeholder,t.placeholder),r));return(0,s.strToEl)('\n      <div\n        class="'+c+'"\n        data-select-text="'+n+'"\n        data-choice\n        data-id="'+t.id+'"\n        data-value="'+t.value+'"\n        '+(t.disabled?'data-choice-disabled aria-disabled="true"':"data-choice-selectable")+'\n        id="'+t.elementId+'"\n        '+a+"\n        >\n        "+t.label+"\n      </div>\n    ")},input:function(e){var t=(0,o.default)(e.input,e.inputCloned);return(0,s.strToEl)('\n      <input\n        type="text"\n        class="'+t+'"\n        autocomplete="off"\n        autocapitalize="off"\n        spellcheck="false"\n        role="textbox"\n        aria-autocomplete="list"\n        >\n    ')},dropdown:function(e){var t=(0,o.default)(e.list,e.listDropdown);return(0,s.strToEl)('\n      <div\n        class="'+t+'"\n        aria-expanded="false"\n        >\n      </div>\n    ')},notice:function(e,t){var n,r=arguments.length>2&&void 0!==arguments[2]?arguments[2]:"",a=(0,o.default)(e.item,e.itemChoice,(n={},i(n,e.noResults,"no-results"===r),i(n,e.noChoices,"no-choices"===r),n));return(0,s.strToEl)('\n      <div class="'+a+'">\n        '+t+"\n      </div>\n    ")},option:function(e){return(0,s.strToEl)('\n      <option value="'+e.value+'" '+(e.active?"selected":"")+" "+(e.disabled?"disabled":"")+">"+e.label+"</option>\n    ")}};t.default=a},function(e,t,n){e.exports=n(38)},function(e,t,n){"use strict";function i(e){return e&&e.__esModule?e:{default:e}}function r(e,t,n){return t in e?Object.defineProperty(e,t,{value:n,enumerable:!0,configurable:!0,writable:!0}):e[t]=n,e}function o(e){if(Array.isArray(e)){for(var t=0,n=Array(e.length);t<e.length;t++)n[t]=e[t];return n}return Array.from(e)}function s(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}var a=function(){function e(e,t){for(var n=0;n<t.length;n++){var i=t[n];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(e,i.key,i)}}return function(t,n,i){return n&&e(t.prototype,n),i&&e(t,i),t}}(),c=n(39),l=i(c),u=n(40),h=i(u);n(41);var d=n(73),f=i(d),p=n(82),v=n(5),m=n(36),g=n(90),y=n(91),_=n(92),b=n(93),E=n(1),S=function(){function e(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:"[data-choice]",n=arguments.length>1&&void 0!==arguments[1]?arguments[1]:{};if(s(this,e),(0,E.isType)("String",t)){var i=Array.from(document.querySelectorAll(t));if(i.length>1)return this._generateInstances(i,n)}this.config=h.default.all([v.DEFAULT_CONFIG,e.userDefaults,n],{arrayMerge:function(e,t){return[].concat(o(t))}}),(0,E.doKeysMatch)(this.config,v.DEFAULT_CONFIG)||console.warn("Unknown config option(s) passed"),["auto","always"].includes(this.config.renderSelectedChoices)||(this.config.renderSelectedChoices="auto");var r=(0,E.isType)("String",t)?document.querySelector(t):t;return r?(this._isTextElement="text"===r.type,this._isSelectOneElement="select-one"===r.type,this._isSelectMultipleElement="select-multiple"===r.type,this._isSelectElement=this._isSelectOneElement||this._isSelectMultipleElement,this._isTextElement?this.passedElement=new p.WrappedInput({element:r,classNames:this.config.classNames,delimiter:this.config.delimiter}):this._isSelectElement&&(this.passedElement=new p.WrappedSelect({element:r,classNames:this.config.classNames})),this.passedElement?(!0===this.config.shouldSortItems&&this._isSelectOneElement&&!this.config.silent&&console.warn("shouldSortElements: Type of passed element is 'select-one', falling back to false."),this.initialised=!1,this._store=new f.default(this.render),this._initialState={},this._currentState={},this._prevState={},this._currentValue="",this._canSearch=this.config.searchEnabled,this._isScrollingOnIe=!1,this._highlightPosition=0,this._wasTap=!0,this._placeholderValue=this._generatePlaceholderValue(),this._baseId=(0,E.generateId)(this.passedElement.element,"choices-"),this._direction=this.passedElement.element.getAttribute("dir")||"ltr",this._idNames={itemChoice:"item-choice"},this._presetChoices=this.config.choices,this._presetItems=this.config.items,this.passedElement.value&&(this._presetItems=this._presetItems.concat(this.passedElement.value.split(this.config.delimiter))),this._render=this._render.bind(this),this._onFocus=this._onFocus.bind(this),this._onBlur=this._onBlur.bind(this),this._onKeyUp=this._onKeyUp.bind(this),this._onKeyDown=this._onKeyDown.bind(this),this._onClick=this._onClick.bind(this),this._onTouchMove=this._onTouchMove.bind(this),this._onTouchEnd=this._onTouchEnd.bind(this),this._onMouseDown=this._onMouseDown.bind(this),this._onMouseOver=this._onMouseOver.bind(this),this._onFormReset=this._onFormReset.bind(this),this._onAKey=this._onAKey.bind(this),this._onEnterKey=this._onEnterKey.bind(this),this._onEscapeKey=this._onEscapeKey.bind(this),this._onDirectionKey=this._onDirectionKey.bind(this),this._onDeleteKey=this._onDeleteKey.bind(this),"active"===this.passedElement.element.getAttribute("data-choice")&&console.warn("Trying to initialise Choices on element already initialised"),void this.init()):console.error("Passed element was of an invalid type")):console.error("Could not find passed element or passed element was of an invalid type")}return a(e,[{key:"init",value:function(){if(!this.initialised){this._createTemplates(),this._createElements(),this._createStructure(),this._initialState=(0,E.cloneObject)(this._store.state),this._store.subscribe(this._render),this._render(),this._addEventListeners();(!this.config.addItems||this.passedElement.element.hasAttribute("disabled"))&&this.disable(),this.initialised=!0;var e=this.config.callbackOnInit;e&&(0,E.isType)("Function",e)&&e.call(this)}}},{key:"destroy",value:function(){this.initialised&&(this._removeEventListeners(),this.passedElement.reveal(),this.containerOuter.unwrap(this.passedElement.element),this._isSelectElement&&(this.passedElement.options=this._presetChoices),this.clearStore(),this.config.templates=null,this.initialised=!1)}},{key:"enable",value:function(){return this.passedElement.isDisabled&&this.passedElement.enable(),this.containerOuter.isDisabled&&(this._addEventListeners(),this.input.enable(),this.containerOuter.enable()),this}},{key:"disable",value:function(){return this.passedElement.isDisabled||this.passedElement.disable(),this.containerOuter.isDisabled||(this._removeEventListeners(),this.input.disable(),this.containerOuter.disable()),this}},{key:"highlightItem",value:function(e){var t=!(arguments.length>1&&void 0!==arguments[1])||arguments[1];if(!e)return this;var n=e.id,i=e.groupId,r=void 0===i?-1:i,o=e.value,s=void 0===o?"":o,a=e.label,c=void 0===a?"":a,l=r>=0?this._store.getGroupById(r):null;return this._store.dispatch((0,y.highlightItem)(n,!0)),t&&this.passedElement.triggerEvent(v.EVENTS.highlightItem,{id:n,value:s,label:c,groupValue:l&&l.value?l.value:null}),this}},{key:"unhighlightItem",value:function(e){if(!e)return this;var t=e.id,n=e.groupId,i=void 0===n?-1:n,r=e.value,o=void 0===r?"":r,s=e.label,a=void 0===s?"":s,c=i>=0?this._store.getGroupById(i):null;return this._store.dispatch((0,y.highlightItem)(t,!1)),this.passedElement.triggerEvent(v.EVENTS.highlightItem,{id:t,value:o,label:a,groupValue:c&&c.value?c.value:null}),this}},{key:"highlightAll",value:function(){var e=this;return this._store.items.forEach(function(t){return e.highlightItem(t)}),this}},{key:"unhighlightAll",value:function(){var e=this;return this._store.items.forEach(function(t){return e.unhighlightItem(t)}),this}},{key:"removeActiveItemsByValue",value:function(e){var t=this;return this._store.activeItems.filter(function(t){return t.value===e}).forEach(function(e){return t._removeItem(e)}),this}},{key:"removeActiveItems",value:function(e){var t=this;return this._store.activeItems.filter(function(t){return t.id!==e}).forEach(function(e){return t._removeItem(e)}),this}},{key:"removeHighlightedItems",value:function(){var e=this,t=arguments.length>0&&void 0!==arguments[0]&&arguments[0];return this._store.highlightedActiveItems.forEach(function(n){e._removeItem(n),t&&e._triggerChange(n.value)}),this}},{key:"showDropdown",value:function(e){var t=this;return this.dropdown.isActive?this:(requestAnimationFrame(function(){t.dropdown.show(),t.containerOuter.open(t.dropdown.distanceFromTopWindow()),!e&&t._canSearch&&t.input.focus(),t.passedElement.triggerEvent(v.EVENTS.showDropdown,{})}),this)}},{key:"hideDropdown",value:function(e){var t=this;return this.dropdown.isActive?(requestAnimationFrame(function(){t.dropdown.hide(),t.containerOuter.close(),!e&&t._canSearch&&(t.input.removeActiveDescendant(),t.input.blur()),t.passedElement.triggerEvent(v.EVENTS.hideDropdown,{})}),this):this}},{key:"toggleDropdown",value:function(){return this.dropdown.isActive?this.hideDropdown():this.showDropdown(),this}},{key:"getValue",value:function(){var e=arguments.length>0&&void 0!==arguments[0]&&arguments[0],t=this._store.activeItems.reduce(function(t,n){var i=e?n.value:n;return t.push(i),t},[]);return this._isSelectOneElement?t[0]:t}},{key:"setValue",value:function(e){var t=this;return this.initialised?([].concat(o(e)).forEach(function(e){return t._setChoiceOrItem(e)}),this):this}},{key:"setChoiceByValue",value:function(e){var t=this;return!this.initialised||this._isTextElement?this:(((0,E.isType)("Array",e)?e:[e]).forEach(function(e){return t._findAndSelectChoiceByValue(e)}),this)}},{key:"setChoices",value:function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:[],t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:"",n=this,i=arguments.length>2&&void 0!==arguments[2]?arguments[2]:"",r=arguments.length>3&&void 0!==arguments[3]&&arguments[3];if(!this._isSelectElement||!e.length||!t)return this;r&&this._clearChoices(),this.containerOuter.removeLoadingState();var o=function(e){e.choices?n._addGroup({group:e,id:e.id||null,valueKey:t,labelKey:i}):n._addChoice({value:e[t],label:e[i],isSelected:e.selected,isDisabled:e.disabled,customProperties:e.customProperties,placeholder:e.placeholder})};return e.forEach(o),this}},{key:"clearStore",value:function(){return this._store.dispatch((0,b.clearAll)()),this}},{key:"clearInput",value:function(){var e=!this._isSelectOneElement;return this.input.clear(e),!this._isTextElement&&this._canSearch&&(this._isSearching=!1,this._store.dispatch((0,g.activateChoices)(!0))),this}},{key:"ajax",value:function(e){var t=this;return this.initialised&&this._isSelectElement&&e?(requestAnimationFrame(function(){return t._handleLoadingState(!0)}),e(this._ajaxCallback()),this):this}},{key:"_render",value:function(){this._currentState=this._store.state;var e=this._currentState.choices!==this._prevState.choices||this._currentState.groups!==this._prevState.groups||this._currentState.items!==this._prevState.items,t=this._isSelectElement,n=this._currentState.items!==this._prevState.items;e&&(t&&this._renderChoices(),n&&this._renderItems(),this._prevState=this._currentState)}},{key:"_renderChoices",value:function(){var e=this,t=this._store,n=t.activeGroups,i=t.activeChoices,r=document.createDocumentFragment();if(this.choiceList.clear(),this.config.resetScrollPosition&&requestAnimationFrame(function(){return e.choiceList.scrollToTop()}),n.length>=1&&!this._isSearching){var o=i.filter(function(e){return!0===e.placeholder&&-1===e.groupId});o.length>=1&&(r=this._createChoicesFragment(o,r)),r=this._createGroupsFragment(n,i,r)}else i.length>=1&&(r=this._createChoicesFragment(i,r));if(r.childNodes&&r.childNodes.length>0){var s=this._store.activeItems,a=this._canAddItem(s,this.input.value);a.response?(this.choiceList.append(r),this._highlightChoice()):this.choiceList.append(this._getTemplate("notice",a.notice))}else{var c=void 0,l=void 0;this._isSearching?(l=(0,E.isType)("Function",this.config.noResultsText)?this.config.noResultsText():this.config.noResultsText,c=this._getTemplate("notice",l,"no-results")):(l=(0,E.isType)("Function",this.config.noChoicesText)?this.config.noChoicesText():this.config.noChoicesText,c=this._getTemplate("notice",l,"no-choices")),this.choiceList.append(c)}}},{key:"_renderItems",value:function(){var e=this._store.activeItems||[];this.itemList.clear();var t=this._createItemsFragment(e);t.childNodes&&this.itemList.append(t)}},{key:"_createGroupsFragment",value:function(e,t,n){var i=this,r=n||document.createDocumentFragment(),o=function(e){return t.filter(function(t){return i._isSelectOneElement?t.groupId===e.id:t.groupId===e.id&&("always"===i.config.renderSelectedChoices||!t.selected)})};return this.config.shouldSort&&e.sort(this.config.sortFn),e.forEach(function(e){var t=o(e);if(t.length>=1){var n=i._getTemplate("choiceGroup",e);r.appendChild(n),i._createChoicesFragment(t,r,!0)}}),r}},{key:"_createChoicesFragment",value:function(e,t){var n=this,i=arguments.length>2&&void 0!==arguments[2]&&arguments[2],r=t||document.createDocumentFragment(),s=this.config,a=s.renderSelectedChoices,c=s.searchResultLimit,l=s.renderChoiceLimit,u=this._isSearching?E.sortByScore:this.config.sortFn,h=e;"auto"!==a||this._isSelectOneElement||(h=e.filter(function(e){return!e.selected}));var d=h.reduce(function(e,t){return t.placeholder?e.placeholderChoices.push(t):e.normalChoices.push(t),e},{placeholderChoices:[],normalChoices:[]}),f=d.placeholderChoices,p=d.normalChoices;(this.config.shouldSort||this._isSearching)&&p.sort(u);var v=h.length,m=[].concat(o(f),o(p));this._isSearching?v=c:l>0&&!i&&(v=l);for(var g=0;g<v;g+=1)m[g]&&function(e){if("auto"!==a||(n._isSelectOneElement||!e.selected)){var t=n._getTemplate("choice",e,n.config.itemSelectText);r.appendChild(t)}}(m[g]);return r}},{key:"_createItemsFragment",value:function(e){var t=this,n=arguments.length>1&&void 0!==arguments[1]?arguments[1]:null,i=this.config,r=i.shouldSortItems,o=i.sortFn,s=i.removeItemButton,a=n||document.createDocumentFragment();r&&!this._isSelectOneElement&&e.sort(o),this._isTextElement?this.passedElement.value=e:this.passedElement.options=e;var c=function(e){var n=t._getTemplate("item",e,s);a.appendChild(n)};return e.forEach(function(e){return c(e)}),a}},{key:"_triggerChange",value:function(e){void 0!==e&&null!==e&&this.passedElement.triggerEvent(v.EVENTS.change,{value:e})}},{key:"_selectPlaceholderChoice",value:function(){var e=this._store.placeholderChoice;e&&(this._addItem({value:e.value,label:e.label,choiceId:e.id,groupId:e.groupId,placeholder:e.placeholder}),this._triggerChange(e.value))}},{key:"_handleButtonAction",value:function(e,t){if(e&&t&&this.config.removeItems&&this.config.removeItemButton){var n=t.parentNode.getAttribute("data-id"),i=e.find(function(e){return e.id===parseInt(n,10)});this._removeItem(i),this._triggerChange(i.value),this._isSelectOneElement&&this._selectPlaceholderChoice()}}},{key:"_handleItemAction",value:function(e,t){var n=this,i=arguments.length>2&&void 0!==arguments[2]&&arguments[2];if(e&&t&&this.config.removeItems&&!this._isSelectOneElement){var r=t.getAttribute("data-id");e.forEach(function(e){e.id!==parseInt(r,10)||e.highlighted?!i&&e.highlighted&&n.unhighlightItem(e):n.highlightItem(e)}),this.input.focus()}}},{key:"_handleChoiceAction",value:function(e,t){if(e&&t){var n=t.getAttribute("data-id"),i=this._store.getChoiceById(n),r=e[0]&&e[0].keyCode?e[0].keyCode:null,o=this.dropdown.isActive;if(i.keyCode=r,this.passedElement.triggerEvent(v.EVENTS.choice,{choice:i}),i&&!i.selected&&!i.disabled){this._canAddItem(e,i.value).response&&(this._addItem({value:i.value,label:i.label,choiceId:i.id,groupId:i.groupId,customProperties:i.customProperties,placeholder:i.placeholder,keyCode:i.keyCode}),this._triggerChange(i.value))}this.clearInput(),o&&this._isSelectOneElement&&(this.hideDropdown(!0),this.containerOuter.focus())}}},{key:"_handleBackspace",value:function(e){if(this.config.removeItems&&e){var t=e[e.length-1],n=e.some(function(e){return e.highlighted});this.config.editItems&&!n&&t?(this.input.value=t.value,this.input.setWidth(),this._removeItem(t),this._triggerChange(t.value)):(n||this.highlightItem(t,!1),this.removeHighlightedItems(!0))}}},{key:"_handleLoadingState",value:function(){var e=!(arguments.length>0&&void 0!==arguments[0])||arguments[0],t=this.itemList.getChild("."+this.config.classNames.placeholder);e?(this.disable(),this.containerOuter.addLoadingState(),this._isSelectOneElement?t?t.innerHTML=this.config.loadingText:(t=this._getTemplate("placeholder",this.config.loadingText),this.itemList.append(t)):this.input.placeholder=this.config.loadingText):(this.enable(),this.containerOuter.removeLoadingState(),this._isSelectOneElement?t.innerHTML=this._placeholderValue||"":this.input.placeholder=this._placeholderValue||"")}},{key:"_handleSearch",value:function(e){if(e&&this.input.isFocussed){var t=this._store.choices,n=this.config,i=n.searchFloor,r=n.searchChoices,o=t.some(function(e){return!e.active});if(e&&e.length>=i){var s=r?this._searchChoices(e):0;this.passedElement.triggerEvent(v.EVENTS.search,{value:e,resultCount:s})}else o&&(this._isSearching=!1,this._store.dispatch((0,g.activateChoices)(!0)))}}},{key:"_canAddItem",value:function(e,t){var n=!0,i=(0,E.isType)("Function",this.config.addItemText)?this.config.addItemText(t):this.config.addItemText;if(!this._isSelectOneElement){var r=(0,E.existsInArray)(e,t);this.config.maxItemCount>0&&this.config.maxItemCount<=e.length&&(n=!1,i=(0,E.isType)("Function",this.config.maxItemText)?this.config.maxItemText(this.config.maxItemCount):this.config.maxItemText),this.config.regexFilter&&this._isTextElement&&this.config.addItems&&n&&(n=(0,E.regexFilter)(t,this.config.regexFilter)),!this.config.duplicateItemsAllowed&&r&&n&&(n=!1,i=(0,E.isType)("Function",this.config.uniqueItemText)?this.config.uniqueItemText(t):this.config.uniqueItemText)}return{response:n,notice:i}}},{key:"_ajaxCallback",value:function(){var e=this;return function(t,n,i){if(t&&n){var r=(0,E.isType)("Object",t)?[t]:t;r&&(0,E.isType)("Array",r)&&r.length?(e._handleLoadingState(!1),r.forEach(function(t){t.choices?e._addGroup({group:t,id:t.id||null,valueKey:n,labelKey:i}):e._addChoice({value:(0,E.fetchFromObject)(t,n),label:(0,E.fetchFromObject)(t,i),isSelected:t.selected,isDisabled:t.disabled,customProperties:t.customProperties,placeholder:t.placeholder})}),e._isSelectOneElement&&e._selectPlaceholderChoice()):e._handleLoadingState(!1)}}}},{key:"_searchChoices",value:function(e){var t=(0,E.isType)("String",e)?e.trim():e,n=(0,E.isType)("String",this._currentValue)?this._currentValue.trim():this._currentValue;if(t.length<1&&t===n+" ")return 0;var i=this._store.searchableChoices,r=t,s=[].concat(o(this.config.searchFields)),a=Object.assign(this.config.fuseOptions,{keys:s}),c=new l.default(i,a),u=c.search(r);return this._currentValue=t,this._highlightPosition=0,this._isSearching=!0,this._store.dispatch((0,g.filterChoices)(u)),u.length}},{key:"_addEventListeners",value:function(){document.addEventListener("keyup",this._onKeyUp),document.addEventListener("keydown",this._onKeyDown),document.addEventListener("click",this._onClick),document.addEventListener("touchmove",this._onTouchMove),document.addEventListener("touchend",this._onTouchEnd),document.addEventListener("mousedown",this._onMouseDown),document.addEventListener("mouseover",this._onMouseOver),this._isSelectOneElement&&(this.containerOuter.element.addEventListener("focus",this._onFocus),this.containerOuter.element.addEventListener("blur",this._onBlur)),this.input.element.addEventListener("focus",this._onFocus),this.input.element.addEventListener("blur",this._onBlur),this.input.element.form&&this.input.element.form.addEventListener("reset",this._onFormReset),this.input.addEventListeners()}},{key:"_removeEventListeners",value:function(){document.removeEventListener("keyup",this._onKeyUp),document.removeEventListener("keydown",this._onKeyDown),document.removeEventListener("click",this._onClick),document.removeEventListener("touchmove",this._onTouchMove),document.removeEventListener("touchend",this._onTouchEnd),document.removeEventListener("mousedown",this._onMouseDown),document.removeEventListener("mouseover",this._onMouseOver),this._isSelectOneElement&&(this.containerOuter.element.removeEventListener("focus",this._onFocus),this.containerOuter.element.removeEventListener("blur",this._onBlur)),this.input.element.removeEventListener("focus",this._onFocus),this.input.element.removeEventListener("blur",this._onBlur),this.input.element.form&&this.input.element.form.removeEventListener("reset",this._onFormReset),this.input.removeEventListeners()}},{key:"_onKeyDown",value:function(e){var t,n=e.target,i=e.keyCode,o=e.ctrlKey,s=e.metaKey;if(n===this.input.element||this.containerOuter.element.contains(n)){var a=this._store.activeItems,c=this.input.isFocussed,l=this.dropdown.isActive,u=this.itemList.hasChildren,h=String.fromCharCode(i),d=v.KEY_CODES.BACK_KEY,f=v.KEY_CODES.DELETE_KEY,p=v.KEY_CODES.ENTER_KEY,m=v.KEY_CODES.A_KEY,g=v.KEY_CODES.ESC_KEY,y=v.KEY_CODES.UP_KEY,_=v.KEY_CODES.DOWN_KEY,b=v.KEY_CODES.PAGE_UP_KEY,E=v.KEY_CODES.PAGE_DOWN_KEY,S=o||s;!this._isTextElement&&/[a-zA-Z0-9-_ ]/.test(h)&&this.showDropdown();var O=(t={},r(t,m,this._onAKey),r(t,p,this._onEnterKey),r(t,g,this._onEscapeKey),r(t,y,this._onDirectionKey),r(t,b,this._onDirectionKey),r(t,_,this._onDirectionKey),r(t,E,this._onDirectionKey),r(t,f,this._onDeleteKey),r(t,d,this._onDeleteKey),t);O[i]&&O[i]({event:e,target:n,keyCode:i,metaKey:s,activeItems:a,hasFocusedInput:c,hasActiveDropdown:l,hasItems:u,hasCtrlDownKeyPressed:S})}}},{key:"_onKeyUp",value:function(e){var t=e.target,n=e.keyCode;if(t===this.input.element){var i=this.input.value,r=this._store.activeItems,o=this._canAddItem(r,i);if(this._isTextElement)if(i){if(o.notice){var s=this._getTemplate("notice",o.notice);this.dropdown.element.innerHTML=s.outerHTML}!0===o.response?this.showDropdown(!0):o.notice||this.hideDropdown(!0)}else this.hideDropdown(!0);else{var a=v.KEY_CODES.BACK_KEY,c=v.KEY_CODES.DELETE_KEY;n!==a&&n!==c||t.value?this._canSearch&&o.response&&this._handleSearch(this.input.value):!this._isTextElement&&this._isSearching&&(this._isSearching=!1,this._store.dispatch((0,g.activateChoices)(!0)))}this._canSearch=this.config.searchEnabled}}},{key:"_onAKey",value:function(e){var t=e.hasItems;e.hasCtrlDownKeyPressed&&t&&(this._canSearch=!1,this.config.removeItems&&!this.input.value&&this.input.element===document.activeElement&&this.highlightAll())}},{key:"_onEnterKey",value:function(e){var t=e.event,n=e.target,i=e.activeItems,r=e.hasActiveDropdown,o=v.KEY_CODES.ENTER_KEY;if(this._isTextElement&&n.value){var s=this.input.value;this._canAddItem(i,s).response&&(this.hideDropdown(!0),this._addItem({value:s}),this._triggerChange(s),this.clearInput())}if(n.hasAttribute("data-button")&&(this._handleButtonAction(i,n),t.preventDefault()),r){var a=this.dropdown.getChild("."+this.config.classNames.highlightedState);a&&(i[0]&&(i[0].keyCode=o),this._handleChoiceAction(i,a)),t.preventDefault()}else this._isSelectOneElement&&(this.showDropdown(),t.preventDefault())}},{key:"_onEscapeKey",value:function(e){e.hasActiveDropdown&&(this.hideDropdown(!0),this.containerOuter.focus())}},{key:"_onDirectionKey",value:function(e){var t=e.event,n=e.hasActiveDropdown,i=e.keyCode,r=e.metaKey,o=v.KEY_CODES.DOWN_KEY,s=v.KEY_CODES.PAGE_UP_KEY,a=v.KEY_CODES.PAGE_DOWN_KEY;if(n||this._isSelectOneElement){this.showDropdown(),this._canSearch=!1;var c=i===o||i===a?1:-1,l=r||i===a||i===s,u=void 0;if(l)u=c>0?Array.from(this.dropdown.element.querySelectorAll("[data-choice-selectable]")).pop():this.dropdown.element.querySelector("[data-choice-selectable]");else{var h=this.dropdown.element.querySelector("."+this.config.classNames.highlightedState);u=h?(0,E.getAdjacentEl)(h,"[data-choice-selectable]",c):this.dropdown.element.querySelector("[data-choice-selectable]")}u&&((0,E.isScrolledIntoView)(u,this.choiceList.element,c)||this.choiceList.scrollToChoice(u,c),this._highlightChoice(u)),t.preventDefault()}}},{key:"_onDeleteKey",value:function(e){var t=e.event,n=e.target,i=e.hasFocusedInput,r=e.activeItems;!i||n.value||this._isSelectOneElement||(this._handleBackspace(r),t.preventDefault())}},{key:"_onTouchMove",value:function(){!0===this._wasTap&&(this._wasTap=!1)}},{key:"_onTouchEnd",value:function(e){var t=e.target||e.touches[0].target;if(!0===this._wasTap&&this.containerOuter.element.contains(t)){(t===this.containerOuter.element||t===this.containerInner.element)&&!this._isSelectOneElement&&(this._isTextElement?this.input.focus():this.showDropdown()),e.stopPropagation()}this._wasTap=!0}},{key:"_onMouseDown",value:function(e){var t=e.target,n=e.shiftKey;if(t===this.choiceList&&(0,E.isIE11)()&&(this._isScrollingOnIe=!0),this.containerOuter.element.contains(t)&&t!==this.input.element){var i=this._store.activeItems,r=n,o=(0,E.findAncestorByAttrName)(t,"data-button"),s=(0,E.findAncestorByAttrName)(t,"data-item"),a=(0,E.findAncestorByAttrName)(t,"data-choice");o?this._handleButtonAction(i,o):s?this._handleItemAction(i,s,r):a&&this._handleChoiceAction(i,a),e.preventDefault()}}},{key:"_onMouseOver",value:function(e){var t=e.target;(t===this.dropdown||this.dropdown.element.contains(t))&&t.hasAttribute("data-choice")&&this._highlightChoice(t)}},{key:"_onClick",value:function(e){var t=e.target;if(this.containerOuter.element.contains(t))this.dropdown.isActive||this.containerOuter.isDisabled?this._isSelectOneElement&&t!==this.input.element&&!this.dropdown.element.contains(t)&&this.hideDropdown():this._isTextElement?document.activeElement!==this.input.element&&this.input.focus():(this.showDropdown(),this.containerOuter.focus());else{this._store.highlightedActiveItems&&this.unhighlightAll(),this.containerOuter.removeFocusState(),this.hideDropdown(!0)}}},{key:"_onFocus",value:function(e){var t=this,n=e.target;if(this.containerOuter.element.contains(n)){({text:function(){n===t.input.element&&t.containerOuter.addFocusState()},"select-one":function(){t.containerOuter.addFocusState(),n===t.input.element&&t.showDropdown(!0)},"select-multiple":function(){n===t.input.element&&(t.showDropdown(!0),t.containerOuter.addFocusState())}})[this.passedElement.element.type]()}}},{key:"_onBlur",value:function(e){var t=this,n=e.target;if(this.containerOuter.element.contains(n)&&!this._isScrollingOnIe){var i=this._store.activeItems,r=i.some(function(e){return e.highlighted});({text:function(){n===t.input.element&&(t.containerOuter.removeFocusState(),r&&t.unhighlightAll(),t.hideDropdown(!0))},"select-one":function(){t.containerOuter.removeFocusState(),(n===t.input.element||n===t.containerOuter.element&&!t._canSearch)&&t.hideDropdown(!0)},"select-multiple":function(){n===t.input.element&&(t.containerOuter.removeFocusState(),t.hideDropdown(!0),r&&t.unhighlightAll())}})[this.passedElement.element.type]()}else this._isScrollingOnIe=!1,this.input.element.focus()}},{key:"_onFormReset",value:function(){this._store.dispatch((0,b.resetTo)(this._initialState))}},{key:"_highlightChoice",value:function(){var e=this,t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:null,n=Array.from(this.dropdown.element.querySelectorAll("[data-choice-selectable]"));if(n.length){var i=t;Array.from(this.dropdown.element.querySelectorAll("."+this.config.classNames.highlightedState)).forEach(function(t){t.classList.remove(e.config.classNames.highlightedState),t.setAttribute("aria-selected","false")}),i?this._highlightPosition=n.indexOf(i):(i=n.length>this._highlightPosition?n[this._highlightPosition]:n[n.length-1])||(i=n[0]),i.classList.add(this.config.classNames.highlightedState),i.setAttribute("aria-selected","true"),this.passedElement.triggerEvent(v.EVENTS.highlightChoice,{el:i}),this.dropdown.isActive&&(this.input.setActiveDescendant(i.id),this.containerOuter.setActiveDescendant(i.id))}}},{key:"_addItem",value:function(e){var t=e.value,n=e.label,i=void 0===n?null:n,r=e.choiceId,o=void 0===r?-1:r,s=e.groupId,a=void 0===s?-1:s,c=e.customProperties,l=void 0===c?null:c,u=e.placeholder,h=void 0!==u&&u,d=e.keyCode,f=void 0===d?null:d,p=(0,E.isType)("String",t)?t.trim():t,m=f,g=l,_=this._store.items,b=i||p,S=parseInt(o,10)||-1,O=a>=0?this._store.getGroupById(a):null,I=_?_.length+1:1;return this.config.prependValue&&(p=this.config.prependValue+p.toString()),this.config.appendValue&&(p+=this.config.appendValue.toString()),this._store.dispatch((0,y.addItem)({value:p,label:b,id:I,choiceId:S,groupId:a,customProperties:l,placeholder:h,keyCode:m})),this._isSelectOneElement&&this.removeActiveItems(I),this.passedElement.triggerEvent(v.EVENTS.addItem,{id:I,value:p,label:b,customProperties:g,groupValue:O&&O.value?O.value:void 0,keyCode:m}),this}},{key:"_removeItem",value:function(e){if(!e||!(0,E.isType)("Object",e))return this;var t=e.id,n=e.value,i=e.label,r=e.choiceId,o=e.groupId,s=o>=0?this._store.getGroupById(o):null;return this._store.dispatch((0,y.removeItem)(t,r)),s&&s.value?this.passedElement.triggerEvent(v.EVENTS.removeItem,{id:t,value:n,label:i,groupValue:s.value}):this.passedElement.triggerEvent(v.EVENTS.removeItem,{id:t,value:n,label:i}),this}},{key:"_addChoice",value:function(e){var t=e.value,n=e.label,i=void 0===n?null:n,r=e.isSelected,o=void 0!==r&&r,s=e.isDisabled,a=void 0!==s&&s,c=e.groupId,l=void 0===c?-1:c,u=e.customProperties,h=void 0===u?null:u,d=e.placeholder,f=void 0!==d&&d,p=e.keyCode,v=void 0===p?null:p;if(void 0!==t&&null!==t){var m=this._store.choices,y=i||t,_=m?m.length+1:1,b=this._baseId+"-"+this._idNames.itemChoice+"-"+_;this._store.dispatch((0,g.addChoice)({value:t,label:y,id:_,groupId:l,disabled:a,elementId:b,customProperties:h,placeholder:f,keyCode:v})),o&&this._addItem({value:t,label:y,choiceId:_,customProperties:h,placeholder:f,keyCode:v})}}},{key:"_clearChoices",value:function(){this._store.dispatch((0,g.clearChoices)())}},{key:"_addGroup",value:function(e){var t=this,n=e.group,i=e.id,r=e.valueKey,o=void 0===r?"value":r,s=e.labelKey,a=void 0===s?"label":s,c=(0,E.isType)("Object",n)?n.choices:Array.from(n.getElementsByTagName("OPTION")),l=i||Math.floor((new Date).valueOf()*Math.random()),u=!!n.disabled&&n.disabled;if(c){this._store.dispatch((0,_.addGroup)(n.label,l,!0,u));var h=function(e){var n=e.disabled||e.parentNode&&e.parentNode.disabled;t._addChoice({value:e[o],label:(0,E.isType)("Object",e)?e[a]:e.innerHTML,isSelected:e.selected,isDisabled:n,groupId:l,customProperties:e.customProperties,placeholder:e.placeholder})};c.forEach(h)}else this._store.dispatch((0,_.addGroup)(n.label,n.id,!1,n.disabled))}},{key:"_getTemplate",value:function(e){var t;if(!e)return null;for(var n=this.config,i=n.templates,r=n.classNames,o=arguments.length,s=Array(o>1?o-1:0),a=1;a<o;a++)s[a-1]=arguments[a];return(t=i[e]).call.apply(t,[this,r].concat(s))}},{key:"_createTemplates",value:function(){var e=this.config.callbackOnCreateTemplates,t={};e&&(0,E.isType)("Function",e)&&(t=e.call(this,E.strToEl)),this.config.templates=(0,E.extend)(m.TEMPLATES,t)}},{key:"_createElements",value:function(){this.containerOuter=new p.Container({element:this._getTemplate("containerOuter",this._direction,this._isSelectElement,this._isSelectOneElement,this.config.searchEnabled,this.passedElement.element.type),classNames:this.config.classNames,type:this.passedElement.element.type,position:this.config.position}),this.containerInner=new p.Container({element:this._getTemplate("containerInner"),classNames:this.config.classNames,type:this.passedElement.element.type,position:this.config.position}),this.input=new p.Input({element:this._getTemplate("input"),classNames:this.config.classNames,type:this.passedElement.element.type}),this.choiceList=new p.List({element:this._getTemplate("choiceList",this._isSelectOneElement)}),this.itemList=new p.List({element:this._getTemplate("itemList",this._isSelectOneElement)}),this.dropdown=new p.Dropdown({element:this._getTemplate("dropdown"),classNames:this.config.classNames,type:this.passedElement.element.type})}},{key:"_createStructure",value:function(){this.passedElement.conceal(),this.containerInner.wrap(this.passedElement.element),this.containerOuter.wrap(this.containerInner.element),this._isSelectOneElement?this.input.placeholder=this.config.searchPlaceholderValue||"":this._placeholderValue&&(this.input.placeholder=this._placeholderValue,this.input.setWidth(!0)),this.containerOuter.element.appendChild(this.containerInner.element),this.containerOuter.element.appendChild(this.dropdown.element),this.containerInner.element.appendChild(this.itemList.element),this._isTextElement||this.dropdown.element.appendChild(this.choiceList.element),this._isSelectOneElement?this.config.searchEnabled&&this.dropdown.element.insertBefore(this.input.element,this.dropdown.element.firstChild):this.containerInner.element.appendChild(this.input.element),this._isSelectElement?this._addPredefinedChoices():this._isTextElement&&this._addPredefinedItems()}},{key:"_addPredefinedChoices",value:function(){var e=this,t=this.passedElement.optionGroups;if(this._highlightPosition=0,this._isSearching=!1,t&&t.length){var n=this.passedElement.placeholderOption;n&&"SELECT"===n.parentNode.tagName&&this._addChoice({value:n.value,label:n.innerHTML,isSelected:n.selected,isDisabled:n.disabled,placeholder:!0}),t.forEach(function(t){return e._addGroup({group:t,id:t.id||null})})}else{var i=this.passedElement.options,r=this.config.sortFn,o=this._presetChoices;i.forEach(function(e){o.push({value:e.value,label:e.innerHTML,selected:e.selected,disabled:e.disabled||e.parentNode.disabled,placeholder:e.hasAttribute("placeholder")})}),this.config.shouldSort&&o.sort(r);var s=o.some(function(e){return e.selected}),a=function(t,n){var i=t.value,r=t.label,o=t.customProperties,a=t.placeholder;if(e._isSelectElement)if(t.choices)e._addGroup({group:t,id:t.id||null});else{var c=e._isSelectOneElement&&!s&&0===n,l=!!c||t.selected,u=!c&&t.disabled;e._addChoice({value:i,label:r,isSelected:l,isDisabled:u,customProperties:o,placeholder:a})}else e._addChoice({value:i,label:r,isSelected:t.selected,isDisabled:t.disabled,customProperties:o,placeholder:a})};o.forEach(function(e,t){return a(e,t)})}}},{key:"_addPredefinedItems",value:function(){var e=this,t=function(t){var n=(0,E.getType)(t);"Object"===n&&t.value?e._addItem({value:t.value,label:t.label,choiceId:t.id,customProperties:t.customProperties,placeholder:t.placeholder}):"String"===n&&e._addItem({value:t})};this._presetItems.forEach(function(e){return t(e)})}},{key:"_setChoiceOrItem",value:function(e){var t=this,n=(0,E.getType)(e).toLowerCase();({object:function(){e.value&&(t._isTextElement?t._addItem({value:e.value,label:e.label,choiceId:e.id,customProperties:e.customProperties,placeholder:e.placeholder}):t._addChoice({value:e.value,label:e.label,isSelected:!0,isDisabled:!1,customProperties:e.customProperties,placeholder:e.placeholder}))},string:function(){t._isTextElement?t._addItem({value:e}):t._addChoice({value:e,label:e,isSelected:!0,isDisabled:!1})}})[n]()}},{key:"_findAndSelectChoiceByValue",value:function(e){var t=this,n=this._store.choices,i=n.find(function(n){return t.config.itemComparer(n.value,e)});i&&!i.selected&&this._addItem({value:i.value,label:i.label,choiceId:i.id,groupId:i.groupId,customProperties:i.customProperties,placeholder:i.placeholder,keyCode:i.keyCode})}},{key:"_generateInstances",value:function(t,n){return t.reduce(function(t,i){return t.push(new e(i,n)),t},[this])}},{key:"_generatePlaceholderValue",value:function(){return!this._isSelectOneElement&&(!!this.config.placeholder&&(this.config.placeholderValue||this.passedElement.element.getAttribute("placeholder")))}}]),e}();S.userDefaults={},e.exports=S},function(e,t,n){!function(t,n){e.exports=n()}(0,function(){return function(e){function t(i){if(n[i])return n[i].exports;var r=n[i]={i:i,l:!1,exports:{}};return e[i].call(r.exports,r,r.exports,t),r.l=!0,r.exports}var n={};return t.m=e,t.c=n,t.i=function(e){return e},t.d=function(e,n,i){t.o(e,n)||Object.defineProperty(e,n,{configurable:!1,enumerable:!0,get:i})},t.n=function(e){var n=e&&e.__esModule?function(){return e.default}:function(){return e};return t.d(n,"a",n),n},t.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},t.p="",t(t.s=8)}([function(e,t,n){"use strict";e.exports=function(e){return"[object Array]"===Object.prototype.toString.call(e)}},function(e,t,n){"use strict";function i(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}var r=function(){function e(e,t){for(var n=0;n<t.length;n++){var i=t[n];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(e,i.key,i)}}return function(t,n,i){return n&&e(t.prototype,n),i&&e(t,i),t}}(),o=n(5),s=n(7),a=n(4),c=function(){function e(t,n){var r=n.location,o=void 0===r?0:r,s=n.distance,c=void 0===s?100:s,l=n.threshold,u=void 0===l?.6:l,h=n.maxPatternLength,d=void 0===h?32:h,f=n.isCaseSensitive,p=void 0!==f&&f,v=n.tokenSeparator,m=void 0===v?/ +/g:v,g=n.findAllMatches,y=void 0!==g&&g,_=n.minMatchCharLength,b=void 0===_?1:_;i(this,e),this.options={location:o,distance:c,threshold:u,maxPatternLength:d,isCaseSensitive:p,tokenSeparator:m,findAllMatches:y,minMatchCharLength:b},this.pattern=this.options.isCaseSensitive?t:t.toLowerCase(),this.pattern.length<=d&&(this.patternAlphabet=a(this.pattern))}return r(e,[{key:"search",value:function(e){if(this.options.isCaseSensitive||(e=e.toLowerCase()),this.pattern===e)return{isMatch:!0,score:0,matchedIndices:[[0,e.length-1]]};var t=this.options,n=t.maxPatternLength,i=t.tokenSeparator;if(this.pattern.length>n)return o(e,this.pattern,i);var r=this.options,a=r.location,c=r.distance,l=r.threshold,u=r.findAllMatches,h=r.minMatchCharLength;return s(e,this.pattern,this.patternAlphabet,{location:a,distance:c,threshold:l,findAllMatches:u,minMatchCharLength:h})}}]),e}();e.exports=c},function(e,t,n){"use strict";var i=n(0),r=function e(t,n,r){if(n){var o=n.indexOf("."),s=n,a=null;-1!==o&&(s=n.slice(0,o),a=n.slice(o+1));var c=t[s];if(null!==c&&void 0!==c)if(a||"string"!=typeof c&&"number"!=typeof c)if(i(c))for(var l=0,u=c.length;l<u;l+=1)e(c[l],a,r);else a&&e(c,a,r);else r.push(c.toString())}else r.push(t);return r};e.exports=function(e,t){return r(e,t,[])}},function(e,t,n){"use strict";e.exports=function(){for(var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:[],t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:1,n=[],i=-1,r=-1,o=0,s=e.length;o<s;o+=1){var a=e[o];a&&-1===i?i=o:a||-1===i||(r=o-1,r-i+1>=t&&n.push([i,r]),i=-1)}return e[o-1]&&o-i>=t&&n.push([i,o-1]),n}},function(e,t,n){"use strict";e.exports=function(e){for(var t={},n=e.length,i=0;i<n;i+=1)t[e.charAt(i)]=0;for(var r=0;r<n;r+=1)t[e.charAt(r)]|=1<<n-r-1;return t}},function(e,t,n){"use strict";var i=/[\-\[\]\/\{\}\(\)\*\+\?\.\\\^\$\|]/g;e.exports=function(e,t){var n=arguments.length>2&&void 0!==arguments[2]?arguments[2]:/ +/g,r=new RegExp(t.replace(i,"\\$&").replace(n,"|")),o=e.match(r),s=!!o,a=[];if(s)for(var c=0,l=o.length;c<l;c+=1){var u=o[c];a.push([e.indexOf(u),u.length-1])}return{score:s?.5:1,isMatch:s,matchedIndices:a}}},function(e,t,n){"use strict";e.exports=function(e,t){var n=t.errors,i=void 0===n?0:n,r=t.currentLocation,o=void 0===r?0:r,s=t.expectedLocation,a=void 0===s?0:s,c=t.distance,l=void 0===c?100:c,u=i/e.length,h=Math.abs(a-o);return l?u+h/l:h?1:u}},function(e,t,n){"use strict";var i=n(6),r=n(3);e.exports=function(e,t,n,o){for(var s=o.location,a=void 0===s?0:s,c=o.distance,l=void 0===c?100:c,u=o.threshold,h=void 0===u?.6:u,d=o.findAllMatches,f=void 0!==d&&d,p=o.minMatchCharLength,v=void 0===p?1:p,m=a,g=e.length,y=h,_=e.indexOf(t,m),b=t.length,E=[],S=0;S<g;S+=1)E[S]=0;if(-1!==_){var O=i(t,{errors:0,currentLocation:_,expectedLocation:m,distance:l});if(y=Math.min(O,y),-1!==(_=e.lastIndexOf(t,m+b))){var I=i(t,{errors:0,currentLocation:_,expectedLocation:m,distance:l});y=Math.min(I,y)}}_=-1;for(var C=[],w=1,A=b+g,T=1<<b-1,k=0;k<b;k+=1){for(var x=0,L=A;x<L;){i(t,{errors:k,currentLocation:m+L,expectedLocation:m,distance:l})<=y?x=L:A=L,L=Math.floor((A-x)/2+x)}A=L;var P=Math.max(1,m-L+1),D=f?g:Math.min(m+L,g)+b,j=Array(D+2);j[D+1]=(1<<k)-1;for(var M=D;M>=P;M-=1){var F=M-1,N=n[e.charAt(F)];if(N&&(E[F]=1),j[M]=(j[M+1]<<1|1)&N,0!==k&&(j[M]|=(C[M+1]|C[M])<<1|1|C[M+1]),j[M]&T&&(w=i(t,{errors:k,currentLocation:F,expectedLocation:m,distance:l}))<=y){if(y=w,(_=F)<=m)break;P=Math.max(1,2*m-_)}}if(i(t,{errors:k+1,currentLocation:m,expectedLocation:m,distance:l})>y)break;C=j}return{isMatch:_>=0,score:0===w?.001:w,matchedIndices:r(E,v)}}},function(e,t,n){"use strict";function i(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}var r=function(){function e(e,t){for(var n=0;n<t.length;n++){var i=t[n];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(e,i.key,i)}}return function(t,n,i){return n&&e(t.prototype,n),i&&e(t,i),t}}(),o=n(1),s=n(2),a=n(0),c=function(){function e(t,n){var r=n.location,o=void 0===r?0:r,a=n.distance,c=void 0===a?100:a,l=n.threshold,u=void 0===l?.6:l,h=n.maxPatternLength,d=void 0===h?32:h,f=n.caseSensitive,p=void 0!==f&&f,v=n.tokenSeparator,m=void 0===v?/ +/g:v,g=n.findAllMatches,y=void 0!==g&&g,_=n.minMatchCharLength,b=void 0===_?1:_,E=n.id,S=void 0===E?null:E,O=n.keys,I=void 0===O?[]:O,C=n.shouldSort,w=void 0===C||C,A=n.getFn,T=void 0===A?s:A,k=n.sortFn,x=void 0===k?function(e,t){return e.score-t.score}:k,L=n.tokenize,P=void 0!==L&&L,D=n.matchAllTokens,j=void 0!==D&&D,M=n.includeMatches,F=void 0!==M&&M,N=n.includeScore,K=void 0!==N&&N,R=n.verbose,V=void 0!==R&&R;i(this,e),this.options={location:o,distance:c,threshold:u,maxPatternLength:d,isCaseSensitive:p,tokenSeparator:m,findAllMatches:y,minMatchCharLength:b,id:S,keys:I,includeMatches:F,includeScore:K,shouldSort:w,getFn:T,sortFn:x,verbose:V,tokenize:P,matchAllTokens:j},this.setCollection(t)}return r(e,[{key:"setCollection",value:function(e){return this.list=e,e}},{key:"search",value:function(e){this._log('---------\nSearch pattern: "'+e+'"');var t=this._prepareSearchers(e),n=t.tokenSearchers,i=t.fullSearcher,r=this._search(n,i),o=r.weights,s=r.results;return this._computeScore(o,s),this.options.shouldSort&&this._sort(s),this._format(s)}},{key:"_prepareSearchers",value:function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:"",t=[];if(this.options.tokenize)for(var n=e.split(this.options.tokenSeparator),i=0,r=n.length;i<r;i+=1)t.push(new o(n[i],this.options));return{tokenSearchers:t,fullSearcher:new o(e,this.options)}}},{key:"_search",value:function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:[],t=arguments[1],n=this.list,i={},r=[];if("string"==typeof n[0]){for(var o=0,s=n.length;o<s;o+=1)this._analyze({key:"",value:n[o],record:o,index:o},{resultMap:i,results:r,tokenSearchers:e,fullSearcher:t});return{weights:null,results:r}}for(var a={},c=0,l=n.length;c<l;c+=1)for(var u=n[c],h=0,d=this.options.keys.length;h<d;h+=1){var f=this.options.keys[h];if("string"!=typeof f){if(a[f.name]={weight:1-f.weight||1},f.weight<=0||f.weight>1)throw new Error("Key weight has to be > 0 and <= 1");f=f.name}else a[f]={weight:1};this._analyze({key:f,value:this.options.getFn(u,f),record:u,index:c},{resultMap:i,results:r,tokenSearchers:e,fullSearcher:t})}return{weights:a,results:r}}},{key:"_analyze",value:function(e,t){var n=e.key,i=e.arrayIndex,r=void 0===i?-1:i,o=e.value,s=e.record,c=e.index,l=t.tokenSearchers,u=void 0===l?[]:l,h=t.fullSearcher,d=void 0===h?[]:h,f=t.resultMap,p=void 0===f?{}:f,v=t.results,m=void 0===v?[]:v;if(void 0!==o&&null!==o){var g=!1,y=-1,_=0;if("string"==typeof o){this._log("\nKey: "+(""===n?"-":n));var b=d.search(o);if(this._log('Full text: "'+o+'", score: '+b.score),this.options.tokenize){for(var E=o.split(this.options.tokenSeparator),S=[],O=0;O<u.length;O+=1){var I=u[O];this._log('\nPattern: "'+I.pattern+'"');for(var C=!1,w=0;w<E.length;w+=1){var A=E[w],T=I.search(A),k={};T.isMatch?(k[A]=T.score,g=!0,C=!0,S.push(T.score)):(k[A]=1,this.options.matchAllTokens||S.push(1)),this._log('Token: "'+A+'", score: '+k[A])}C&&(_+=1)}y=S[0];for(var x=S.length,L=1;L<x;L+=1)y+=S[L];y/=x,this._log("Token score average:",y)}var P=b.score;y>-1&&(P=(P+y)/2),this._log("Score average:",P);var D=!this.options.tokenize||!this.options.matchAllTokens||_>=u.length;if(this._log("\nCheck Matches: "+D),(g||b.isMatch)&&D){var j=p[c];j?j.output.push({key:n,arrayIndex:r,value:o,score:P,matchedIndices:b.matchedIndices}):(p[c]={item:s,output:[{key:n,arrayIndex:r,value:o,score:P,matchedIndices:b.matchedIndices}]},m.push(p[c]))}}else if(a(o))for(var M=0,F=o.length;M<F;M+=1)this._analyze({key:n,arrayIndex:M,value:o[M],record:s,index:c},{resultMap:p,results:m,tokenSearchers:u,fullSearcher:d})}}},{key:"_computeScore",value:function(e,t){this._log("\n\nComputing score:\n");for(var n=0,i=t.length;n<i;n+=1){for(var r=t[n].output,o=r.length,s=0,a=1,c=0;c<o;c+=1){var l=e?e[r[c].key].weight:1,u=1===l?r[c].score:r[c].score||.001,h=u*l;1!==l?a=Math.min(a,h):(r[c].nScore=h,s+=h)}t[n].score=1===a?s/o:a,this._log(t[n])}}},{key:"_sort",value:function(e){this._log("\n\nSorting...."),e.sort(this.options.sortFn)}},{key:"_format",value:function(e){var t=[];this._log("\n\nOutput:\n\n",JSON.stringify(e));var n=[];this.options.includeMatches&&n.push(function(e,t){var n=e.output;t.matches=[];for(var i=0,r=n.length;i<r;i+=1){var o=n[i];if(0!==o.matchedIndices.length){var s={indices:o.matchedIndices,value:o.value};o.key&&(s.key=o.key),o.hasOwnProperty("arrayIndex")&&o.arrayIndex>-1&&(s.arrayIndex=o.arrayIndex),t.matches.push(s)}}}),this.options.includeScore&&n.push(function(e,t){t.score=e.score});for(var i=0,r=e.length;i<r;i+=1){var o=e[i];if(this.options.id&&(o.item=this.options.getFn(o.item,this.options.id)[0]),n.length){for(var s={item:o.item},a=0,c=n.length;a<c;a+=1)n[a](o,s);t.push(s)}else t.push(o.item)}return t}},{key:"_log",value:function(){if(this.options.verbose){var e;(e=console).log.apply(e,arguments)}}}]),e}();e.exports=c}])})},function(e,t,n){"use strict";function i(e){return!!e&&"object"==typeof e}function r(e){var t=Object.prototype.toString.call(e);return"[object RegExp]"===t||"[object Date]"===t||o(e)}function o(e){return e.$$typeof===f}function s(e){return Array.isArray(e)?[]:{}}function a(e,t){return!1!==t.clone&&t.isMergeableObject(e)?u(s(e),e,t):e}function c(e,t,n){return e.concat(t).map(function(e){return a(e,n)})}function l(e,t,n){var i={};return n.isMergeableObject(e)&&Object.keys(e).forEach(function(t){i[t]=a(e[t],n)}),Object.keys(t).forEach(function(r){n.isMergeableObject(t[r])&&e[r]?i[r]=u(e[r],t[r],n):i[r]=a(t[r],n)}),i}function u(e,t,n){n=n||{},n.arrayMerge=n.arrayMerge||c,n.isMergeableObject=n.isMergeableObject||h;var i=Array.isArray(t);return i===Array.isArray(e)?i?n.arrayMerge(e,t,n):l(e,t,n):a(t,n)}Object.defineProperty(t,"__esModule",{value:!0});var h=function(e){return i(e)&&!r(e)},d="function"==typeof Symbol&&Symbol.for,f=d?Symbol.for("react.element"):60103;u.all=function(e,t){if(!Array.isArray(e))throw new Error("first argument should be an array");return e.reduce(function(e,n){return u(e,n,t)},{})};var p=u;t.default=p},function(e,t,n){"use strict";n(42),n(51),n(70),n(72)},function(e,t,n){n(43),e.exports=n(2).Array.find},function(e,t,n){"use strict";var i=n(6),r=n(47)(5),o=!0;"find"in[]&&Array(1).find(function(){o=!1}),i(i.P+i.F*o,"Array",{find:function(e){return r(this,e,arguments.length>1?arguments[1]:void 0)}}),n(28)("find")},function(e,t,n){e.exports=!n(10)&&!n(22)(function(){return 7!=Object.defineProperty(n(23)("div"),"a",{get:function(){return 7}}).a})},function(e,t,n){var i=n(9);e.exports=function(e,t){if(!i(e))return e;var n,r;if(t&&"function"==typeof(n=e.toString)&&!i(r=n.call(e)))return r;if("function"==typeof(n=e.valueOf)&&!i(r=n.call(e)))return r;if(!t&&"function"==typeof(n=e.toString)&&!i(r=n.call(e)))return r;throw TypeError("Can't convert object to primitive value")}},function(e,t){e.exports=function(e){if("function"!=typeof e)throw TypeError(e+" is not a function!");return e}},function(e,t,n){var i=n(14),r=n(25),o=n(16),s=n(18),a=n(48);e.exports=function(e,t){var n=1==e,c=2==e,l=3==e,u=4==e,h=6==e,d=5==e||h,f=t||a;return function(t,a,p){for(var v,m,g=o(t),y=r(g),_=i(a,p,3),b=s(y.length),E=0,S=n?f(t,b):c?f(t,0):void 0;b>E;E++)if((d||E in y)&&(v=y[E],m=_(v,E,g),e))if(n)S[E]=m;else if(m)switch(e){case 3:return!0;case 5:return v;case 6:return E;case 2:S.push(v)}else if(u)return!1;return h?-1:l||u?u:S}}},function(e,t,n){var i=n(49);e.exports=function(e,t){return new(i(e))(t)}},function(e,t,n){var i=n(9),r=n(50),o=n(0)("species");e.exports=function(e){var t;return r(e)&&(t=e.constructor,"function"!=typeof t||t!==Array&&!r(t.prototype)||(t=void 0),i(t)&&null===(t=t[o])&&(t=void 0)),void 0===t?Array:t}},function(e,t,n){var i=n(15);e.exports=Array.isArray||function(e){return"Array"==i(e)}},function(e,t,n){n(52),n(63),e.exports=n(2).Array.from},function(e,t,n){"use strict";var i=n(53)(!0);n(54)(String,"String",function(e){this._t=String(e),this._i=0},function(){var e,t=this._t,n=this._i;return n>=t.length?{value:void 0,done:!0}:(e=i(t,n),this._i+=e.length,{value:e,done:!1})})},function(e,t,n){var i=n(19),r=n(17);e.exports=function(e){return function(t,n){var o,s,a=String(r(t)),c=i(n),l=a.length;return c<0||c>=l?e?"":void 0:(o=a.charCodeAt(c),o<55296||o>56319||c+1===l||(s=a.charCodeAt(c+1))<56320||s>57343?e?a.charAt(c):o:e?a.slice(c,c+2):s-56320+(o-55296<<10)+65536)}}},function(e,t,n){"use strict";var i=n(27),r=n(6),o=n(24),s=n(4),a=n(20),c=n(55),l=n(32),u=n(62),h=n(0)("iterator"),d=!([].keys&&"next"in[].keys()),f=function(){return this};e.exports=function(e,t,n,p,v,m,g){c(n,t,p);var y,_,b,E=function(e){if(!d&&e in C)return C[e];switch(e){case"keys":case"values":return function(){return new n(this,e)}}return function(){return new n(this,e)}},S=t+" Iterator",O="values"==v,I=!1,C=e.prototype,w=C[h]||C["@@iterator"]||v&&C[v],A=w||E(v),T=v?O?E("entries"):A:void 0,k="Array"==t?C.entries||w:w;if(k&&(b=u(k.call(new e)))!==Object.prototype&&b.next&&(l(b,S,!0),i||"function"==typeof b[h]||s(b,h,f)),O&&w&&"values"!==w.name&&(I=!0,A=function(){return w.call(this)}),i&&!g||!d&&!I&&C[h]||s(C,h,A),a[t]=A,a[S]=f,v)if(y={values:O?A:E("values"),keys:m?A:E("keys"),entries:T},g)for(_ in y)_ in C||o(C,_,y[_]);else r(r.P+r.F*(d||I),t,y);return y}},function(e,t,n){"use strict";var i=n(56),r=n(12),o=n(32),s={};n(4)(s,n(0)("iterator"),function(){return this}),e.exports=function(e,t,n){e.prototype=i(s,{next:r(1,n)}),o(e,t+" Iterator")}},function(e,t,n){var i=n(8),r=n(57),o=n(31),s=n(21)("IE_PROTO"),a=function(){},c=function(){var e,t=n(23)("iframe"),i=o.length;for(t.style.display="none",n(61).appendChild(t),t.src="javascript:",e=t.contentWindow.document,e.open(),e.write("<script>document.F=Object<\/script>"),e.close(),c=e.F;i--;)delete c.prototype[o[i]];return c()};e.exports=Object.create||function(e,t){var n;return null!==e?(a.prototype=i(e),n=new a,a.prototype=null,n[s]=e):n=c(),void 0===t?n:r(n,t)}},function(e,t,n){var i=n(7),r=n(8),o=n(58);e.exports=n(10)?Object.defineProperties:function(e,t){r(e);for(var n,s=o(t),a=s.length,c=0;a>c;)i.f(e,n=s[c++],t[n]);return e}},function(e,t,n){var i=n(59),r=n(31);e.exports=Object.keys||function(e){return i(e,r)}},function(e,t,n){var i=n(11),r=n(29),o=n(30)(!1),s=n(21)("IE_PROTO");e.exports=function(e,t){var n,a=r(e),c=0,l=[];for(n in a)n!=s&&i(a,n)&&l.push(n);for(;t.length>c;)i(a,n=t[c++])&&(~o(l,n)||l.push(n));return l}},function(e,t,n){var i=n(19),r=Math.max,o=Math.min;e.exports=function(e,t){return e=i(e),e<0?r(e+t,0):o(e,t)}},function(e,t,n){var i=n(3).document;e.exports=i&&i.documentElement},function(e,t,n){var i=n(11),r=n(16),o=n(21)("IE_PROTO"),s=Object.prototype;e.exports=Object.getPrototypeOf||function(e){return e=r(e),i(e,o)?e[o]:"function"==typeof e.constructor&&e instanceof e.constructor?e.constructor.prototype:e instanceof Object?s:null}},function(e,t,n){"use strict";var i=n(14),r=n(6),o=n(16),s=n(64),a=n(65),c=n(18),l=n(66),u=n(67);r(r.S+r.F*!n(69)(function(e){Array.from(e)}),"Array",{from:function(e){var t,n,r,h,d=o(e),f="function"==typeof this?this:Array,p=arguments.length,v=p>1?arguments[1]:void 0,m=void 0!==v,g=0,y=u(d);if(m&&(v=i(v,p>2?arguments[2]:void 0,2)),void 0==y||f==Array&&a(y))for(t=c(d.length),n=new f(t);t>g;g++)l(n,g,m?v(d[g],g):d[g]);else for(h=y.call(d),n=new f;!(r=h.next()).done;g++)l(n,g,m?s(h,v,[r.value,g],!0):r.value);return n.length=g,n}})},function(e,t,n){var i=n(8);e.exports=function(e,t,n,r){try{return r?t(i(n)[0],n[1]):t(n)}catch(t){var o=e.return;throw void 0!==o&&i(o.call(e)),t}}},function(e,t,n){var i=n(20),r=n(0)("iterator"),o=Array.prototype;e.exports=function(e){return void 0!==e&&(i.Array===e||o[r]===e)}},function(e,t,n){"use strict";var i=n(7),r=n(12);e.exports=function(e,t,n){t in e?i.f(e,t,r(0,n)):e[t]=n}},function(e,t,n){var i=n(68),r=n(0)("iterator"),o=n(20);e.exports=n(2).getIteratorMethod=function(e){if(void 0!=e)return e[r]||e["@@iterator"]||o[i(e)]}},function(e,t,n){var i=n(15),r=n(0)("toStringTag"),o="Arguments"==i(function(){return arguments}()),s=function(e,t){try{return e[t]}catch(e){}};e.exports=function(e){var t,n,a;return void 0===e?"Undefined":null===e?"Null":"string"==typeof(n=s(t=Object(e),r))?n:o?i(t):"Object"==(a=i(t))&&"function"==typeof t.callee?"Arguments":a}},function(e,t,n){var i=n(0)("iterator"),r=!1;try{var o=[7][i]();o.return=function(){r=!0},Array.from(o,function(){throw 2})}catch(e){}e.exports=function(e,t){if(!t&&!r)return!1;var n=!1;try{var o=[7],s=o[i]();s.next=function(){return{done:n=!0}},o[i]=function(){return s},e(o)}catch(e){}return n}},function(e,t,n){n(71),e.exports=n(2).Array.includes},function(e,t,n){"use strict";var i=n(6),r=n(30)(!0);i(i.P,"Array",{includes:function(e){return r(this,e,arguments.length>1?arguments[1]:void 0)}}),n(28)("includes")},function(e,t){try{var n=new window.CustomEvent("test");if(n.preventDefault(),!0!==n.defaultPrevented)throw new Error("Could not prevent default")}catch(e){var i=function(e,t){var n,i;return t=t||{bubbles:!1,cancelable:!1,detail:void 0},n=document.createEvent("CustomEvent"),n.initCustomEvent(e,t.bubbles,t.cancelable,t.detail),i=n.preventDefault,n.preventDefault=function(){i.call(this);try{Object.defineProperty(this,"defaultPrevented",{get:function(){return!0}})}catch(e){this.defaultPrevented=!0}},n};i.prototype=window.Event.prototype,window.CustomEvent=i}},function(e,t,n){"use strict";function i(e){if(Array.isArray(e)){for(var t=0,n=Array(e.length);t<e.length;t++)n[t]=e[t];return n}return Array.from(e)}function r(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}Object.defineProperty(t,"__esModule",{value:!0});var o=function(){function e(e,t){for(var n=0;n<t.length;n++){var i=t[n];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(e,i.key,i)}}return function(t,n,i){return n&&e(t.prototype,n),i&&e(t,i),t}}(),s=n(33),a=n(78),c=function(e){return e&&e.__esModule?e:{default:e}}(a),l=function(){function e(){r(this,e),this._store=(0,s.createStore)(c.default,window.devToolsExtension?window.devToolsExtension():void 0)}return o(e,[{key:"subscribe",value:function(e){this._store.subscribe(e)}},{key:"dispatch",value:function(e){this._store.dispatch(e)}},{key:"getChoiceById",value:function(e){if(e){return this.activeChoices.find(function(t){return t.id===parseInt(e,10)})}return!1}},{key:"getGroupById",value:function(e){return this.groups.find(function(t){return t.id===parseInt(e,10)})}},{key:"state",get:function(){return this._store.getState()}},{key:"items",get:function(){return this.state.items}},{key:"activeItems",get:function(){return this.items.filter(function(e){return!0===e.active})}},{key:"highlightedActiveItems",get:function(){return this.items.filter(function(e){return e.active&&e.highlighted})}},{key:"choices",get:function(){return this.state.choices}},{key:"activeChoices",get:function(){return this.choices.filter(function(e){return!0===e.active})}},{key:"selectableChoices",get:function(){return this.choices.filter(function(e){return!0!==e.disabled})}},{key:"searchableChoices",get:function(){return this.selectableChoices.filter(function(e){return!0!==e.placeholder})}},{key:"placeholderChoice",get:function(){return[].concat(i(this.choices)).reverse().find(function(e){return!0===e.placeholder})}},{key:"groups",get:function(){return this.state.groups}},{key:"activeGroups",get:function(){var e=this.groups,t=this.choices;return e.filter(function(e){var n=!0===e.active&&!1===e.disabled,i=t.some(function(e){return!0===e.active&&!1===e.disabled});return n&&i},[])}}]),e}();t.default=l},function(e,t,n){"use strict";(function(e){var n="object"==typeof e&&e&&e.Object===Object&&e;t.a=n}).call(t,n(34))},function(e,t,n){"use strict";(function(e,i){var r,o=n(77);r="undefined"!=typeof self?self:"undefined"!=typeof window?window:void 0!==e?e:i;var s=Object(o.a)(r);t.a=s}).call(t,n(34),n(76)(e))},function(e,t){e.exports=function(e){if(!e.webpackPolyfill){var t=Object.create(e);t.children||(t.children=[]),Object.defineProperty(t,"loaded",{enumerable:!0,get:function(){return t.l}}),Object.defineProperty(t,"id",{enumerable:!0,get:function(){return t.i}}),Object.defineProperty(t,"exports",{enumerable:!0}),t.webpackPolyfill=1}return t}},function(e,t,n){"use strict";function i(e){var t,n=e.Symbol;return"function"==typeof n?n.observable?t=n.observable:(t=n("observable"),n.observable=t):t="@@observable",t}t.a=i},function(e,t,n){"use strict";function i(e){return e&&e.__esModule?e:{default:e}}Object.defineProperty(t,"__esModule",{value:!0});var r=n(33),o=n(79),s=i(o),a=n(80),c=i(a),l=n(81),u=i(l),h=n(1),d=(0,r.combineReducers)({items:s.default,groups:c.default,choices:u.default}),f=function(e,t){var n=e;if("CLEAR_ALL"===t.type)n=void 0;else if("RESET_TO"===t.type)return(0,h.cloneObject)(t.state);return d(n,t)};t.default=f},function(e,t,n){"use strict";function i(e){if(Array.isArray(e)){for(var t=0,n=Array(e.length);t<e.length;t++)n[t]=e[t];return n}return Array.from(e)}function r(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:o,t=arguments[1];switch(t.type){case"ADD_ITEM":return[].concat(i(e),[{id:t.id,choiceId:t.choiceId,groupId:t.groupId,value:t.value,label:t.label,active:!0,highlighted:!1,customProperties:t.customProperties,placeholder:t.placeholder||!1,keyCode:null}]).map(function(e){var t=e;return t.highlighted=!1,t});case"REMOVE_ITEM":return e.map(function(e){var n=e;return n.id===t.id&&(n.active=!1),n});case"HIGHLIGHT_ITEM":return e.map(function(e){var n=e;return n.id===t.id&&(n.highlighted=t.highlighted),n});default:return e}}Object.defineProperty(t,"__esModule",{value:!0}),t.default=r;var o=t.defaultState=[]},function(e,t,n){"use strict";function i(e){if(Array.isArray(e)){for(var t=0,n=Array(e.length);t<e.length;t++)n[t]=e[t];return n}return Array.from(e)}function r(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:o,t=arguments[1];switch(t.type){case"ADD_GROUP":return[].concat(i(e),[{id:t.id,value:t.value,active:t.active,disabled:t.disabled}]);case"CLEAR_CHOICES":return[];default:return e}}Object.defineProperty(t,"__esModule",{value:!0}),t.default=r;var o=t.defaultState=[]},function(e,t,n){"use strict";function i(e){if(Array.isArray(e)){for(var t=0,n=Array(e.length);t<e.length;t++)n[t]=e[t];return n}return Array.from(e)}function r(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:o,t=arguments[1];switch(t.type){case"ADD_CHOICE":return[].concat(i(e),[{id:t.id,elementId:t.elementId,groupId:t.groupId,value:t.value,label:t.label||t.value,disabled:t.disabled||!1,selected:!1,active:!0,score:9999,customProperties:t.customProperties,placeholder:t.placeholder||!1,keyCode:null}]);case"ADD_ITEM":return t.activateOptions?e.map(function(e){var n=e;return n.active=t.active,n}):t.choiceId>-1?e.map(function(e){var n=e;return n.id===parseInt(t.choiceId,10)&&(n.selected=!0),n}):e;case"REMOVE_ITEM":return t.choiceId>-1?e.map(function(e){var n=e;return n.id===parseInt(t.choiceId,10)&&(n.selected=!1),n}):e;case"FILTER_CHOICES":return e.map(function(e){var n=e;return n.active=t.results.some(function(e){var t=e.item,i=e.score;return t.id===n.id&&(n.score=i,!0)}),n});case"ACTIVATE_CHOICES":return e.map(function(e){var n=e;return n.active=t.active,n});case"CLEAR_CHOICES":return o;default:return e}}Object.defineProperty(t,"__esModule",{value:!0}),t.default=r;var o=t.defaultState=[]},function(e,t,n){"use strict";function i(e){return e&&e.__esModule?e:{default:e}}Object.defineProperty(t,"__esModule",{value:!0}),t.WrappedSelect=t.WrappedInput=t.List=t.Input=t.Container=t.Dropdown=void 0;var r=n(83),o=i(r),s=n(84),a=i(s),c=n(85),l=i(c),u=n(86),h=i(u),d=n(87),f=i(d),p=n(88),v=i(p);t.Dropdown=o.default,t.Container=a.default,t.Input=l.default,t.List=h.default,t.WrappedInput=f.default,t.WrappedSelect=v.default},function(e,t,n){"use strict";function i(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}Object.defineProperty(t,"__esModule",{value:!0});var r=function(){function e(e,t){for(var n=0;n<t.length;n++){var i=t[n];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(e,i.key,i)}}return function(t,n,i){return n&&e(t.prototype,n),i&&e(t,i),t}}(),o=function(){function e(t){var n=t.element,r=t.type,o=t.classNames;i(this,e),Object.assign(this,{element:n,type:r,classNames:o}),this.isActive=!1}return r(e,[{key:"distanceFromTopWindow",value:function(){return this.dimensions=this.element.getBoundingClientRect(),this.position=Math.ceil(this.dimensions.top+window.pageYOffset+this.element.offsetHeight),this.position}},{key:"getChild",value:function(e){return this.element.querySelector(e)}},{key:"show",value:function(){return this.element.classList.add(this.classNames.activeState),this.element.setAttribute("aria-expanded","true"),this.isActive=!0,this}},{key:"hide",value:function(){return this.element.classList.remove(this.classNames.activeState),this.element.setAttribute("aria-expanded","false"),this.isActive=!1,this}}]),e}();t.default=o},function(e,t,n){"use strict";function i(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}Object.defineProperty(t,"__esModule",{value:!0});var r=function(){function e(e,t){for(var n=0;n<t.length;n++){var i=t[n];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(e,i.key,i)}}return function(t,n,i){return n&&e(t.prototype,n),i&&e(t,i),t}}(),o=n(1),s=function(){function e(t){var n=t.element,r=t.type,o=t.classNames,s=t.position;i(this,e),Object.assign(this,{element:n,classNames:o,type:r,position:s}),this.isOpen=!1,this.isFlipped=!1,this.isFocussed=!1,this.isDisabled=!1,this.isLoading=!1,this._onFocus=this._onFocus.bind(this),this._onBlur=this._onBlur.bind(this)}return r(e,[{key:"addEventListeners",value:function(){this.element.addEventListener("focus",this._onFocus),this.element.addEventListener("blur",this._onBlur)}},{key:"removeEventListeners",value:function(){this.element.removeEventListener("focus",this._onFocus),this.element.removeEventListener("blur",this._onBlur)}},{key:"shouldFlip",value:function(e){var t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:(0,o.getWindowHeight)();if(void 0===e)return!1;var n=!1;return"auto"===this.position?n=e>=t:"top"===this.position&&(n=!0),n}},{key:"setActiveDescendant",value:function(e){this.element.setAttribute("aria-activedescendant",e)}},{key:"removeActiveDescendant",value:function(){this.element.removeAttribute("aria-activedescendant")}},{key:"open",value:function(e){this.element.classList.add(this.classNames.openState),this.element.setAttribute("aria-expanded","true"),this.isOpen=!0,this.shouldFlip(e)&&(this.element.classList.add(this.classNames.flippedState),this.isFlipped=!0)}},{key:"close",value:function(){this.element.classList.remove(this.classNames.openState),this.element.setAttribute("aria-expanded","false"),this.removeActiveDescendant(),this.isOpen=!1,this.isFlipped&&(this.element.classList.remove(this.classNames.flippedState),this.isFlipped=!1)}},{key:"focus",value:function(){this.isFocussed||this.element.focus()}},{key:"addFocusState",value:function(){this.element.classList.add(this.classNames.focusState)}},{key:"removeFocusState",value:function(){this.element.classList.remove(this.classNames.focusState)}},{key:"enable",value:function(){this.element.classList.remove(this.classNames.disabledState),this.element.removeAttribute("aria-disabled"),"select-one"===this.type&&this.element.setAttribute("tabindex","0"),this.isDisabled=!1}},{key:"disable",value:function(){this.element.classList.add(this.classNames.disabledState),this.element.setAttribute("aria-disabled","true"),"select-one"===this.type&&this.element.setAttribute("tabindex","-1"),this.isDisabled=!0}},{key:"wrap",value:function(e){(0,o.wrap)(e,this.element)}},{key:"unwrap",value:function(e){this.element.parentNode.insertBefore(e,this.element),this.element.parentNode.removeChild(this.element)}},{key:"addLoadingState",value:function(){this.element.classList.add(this.classNames.loadingState),this.element.setAttribute("aria-busy","true"),this.isLoading=!0}},{key:"removeLoadingState",value:function(){this.element.classList.remove(this.classNames.loadingState),this.element.removeAttribute("aria-busy"),this.isLoading=!1}},{key:"_onFocus",value:function(){this.isFocussed=!0}},{key:"_onBlur",value:function(){this.isFocussed=!1}}]),e}();t.default=s},function(e,t,n){"use strict";function i(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}Object.defineProperty(t,"__esModule",{value:!0});var r=function(){function e(e,t){for(var n=0;n<t.length;n++){var i=t[n];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(e,i.key,i)}}return function(t,n,i){return n&&e(t.prototype,n),i&&e(t,i),t}}(),o=n(1),s=function(){function e(t){var n=t.element,r=t.type,o=t.classNames,s=t.placeholderValue;i(this,e),Object.assign(this,{element:n,type:r,classNames:o,placeholderValue:s}),this.element=n,this.classNames=o,this.isFocussed=this.element===document.activeElement,this.isDisabled=!1,this._onPaste=this._onPaste.bind(this),this._onInput=this._onInput.bind(this),this._onFocus=this._onFocus.bind(this),this._onBlur=this._onBlur.bind(this)}return r(e,[{key:"addEventListeners",value:function(){this.element.addEventListener("input",this._onInput),this.element.addEventListener("paste",this._onPaste),this.element.addEventListener("focus",this._onFocus),this.element.addEventListener("blur",this._onBlur),this.element.form&&this.element.form.addEventListener("reset",this._onFormReset)}},{key:"removeEventListeners",value:function(){this.element.removeEventListener("input",this._onInput),this.element.removeEventListener("paste",this._onPaste),this.element.removeEventListener("focus",this._onFocus),this.element.removeEventListener("blur",this._onBlur),this.element.form&&this.element.form.removeEventListener("reset",this._onFormReset)}},{key:"enable",value:function(){this.element.removeAttribute("disabled"),this.isDisabled=!1}},{key:"disable",value:function(){this.element.setAttribute("disabled",""),this.isDisabled=!0}},{key:"focus",value:function(){this.isFocussed||this.element.focus()}},{key:"blur",value:function(){this.isFocussed&&this.element.blur()}},{key:"clear",value:function(){var e=!(arguments.length>0&&void 0!==arguments[0])||arguments[0];return this.element.value&&(this.element.value=""),e&&this.setWidth(),this}},{key:"setWidth",value:function(e){var t=this,n=function(e){t.element.style.width=e};if(this._placeholderValue){var i=this.element.value.length>=this._placeholderValue.length/1.25;(this.element.value&&i||e)&&this.calcWidth(n)}else this.calcWidth(n)}},{key:"calcWidth",value:function(e){return(0,o.calcWidthOfInput)(this.element,e)}},{key:"setActiveDescendant",value:function(e){this.element.setAttribute("aria-activedescendant",e)}},{key:"removeActiveDescendant",value:function(){this.element.removeAttribute("aria-activedescendant")}},{key:"_onInput",value:function(){"select-one"!==this.type&&this.setWidth()}},{key:"_onPaste",value:function(e){e.target===this.element&&this.preventPaste&&e.preventDefault()}},{key:"_onFocus",value:function(){this.isFocussed=!0}},{key:"_onBlur",value:function(){this.isFocussed=!1}},{key:"placeholder",set:function(e){this.element.placeholder=e}},{key:"value",set:function(e){this.element.value=""+e},get:function(){return(0,o.stripHTML)(this.element.value)}}]),e}();t.default=s},function(e,t,n){"use strict";function i(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}Object.defineProperty(t,"__esModule",{value:!0});var r=function(){function e(e,t){for(var n=0;n<t.length;n++){var i=t[n];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(e,i.key,i)}}return function(t,n,i){return n&&e(t.prototype,n),i&&e(t,i),t}}(),o=n(5),s=function(){function e(t){var n=t.element;i(this,e),Object.assign(this,{element:n}),this.scrollPos=this.element.scrollTop,this.height=this.element.offsetHeight,this.hasChildren=!!this.element.children}return r(e,[{key:"clear",value:function(){this.element.innerHTML=""}},{key:"append",value:function(e){this.element.appendChild(e)}},{key:"getChild",value:function(e){return this.element.querySelector(e)}},{key:"scrollToTop",value:function(){this.element.scrollTop=0}},{key:"scrollToChoice",value:function(e,t){var n=this;if(e){var i=this.element.offsetHeight,r=e.offsetHeight,o=e.offsetTop+r,s=this.element.scrollTop+i,a=t>0?this.element.scrollTop+o-s:e.offsetTop;requestAnimationFrame(function(e){n._animateScroll(e,a,t)})}}},{key:"_scrollDown",value:function(e,t,n){var i=(n-e)/t,r=i>1?i:1;this.element.scrollTop=e+r}},{key:"_scrollUp",value:function(e,t,n){var i=(e-n)/t,r=i>1?i:1;this.element.scrollTop=e-r}},{key:"_animateScroll",value:function(e,t,n){var i=this,r=o.SCROLLING_SPEED,s=this.element.scrollTop,a=!1;n>0?(this._scrollDown(s,r,t),s<t&&(a=!0)):(this._scrollUp(s,r,t),s>t&&(a=!0)),a&&requestAnimationFrame(function(){i._animateScroll(e,t,n)})}}]),e}();t.default=s},function(e,t,n){"use strict";function i(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}function r(e,t){if(!e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return!t||"object"!=typeof t&&"function"!=typeof t?e:t}function o(e,t){if("function"!=typeof t&&null!==t)throw new TypeError("Super expression must either be null or a function, not "+typeof t);e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,enumerable:!1,writable:!0,configurable:!0}}),t&&(Object.setPrototypeOf?Object.setPrototypeOf(e,t):e.__proto__=t)}Object.defineProperty(t,"__esModule",{value:!0});var s=function(){function e(e,t){for(var n=0;n<t.length;n++){var i=t[n];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(e,i.key,i)}}return function(t,n,i){return n&&e(t.prototype,n),i&&e(t,i),t}}(),a=function e(t,n,i){null===t&&(t=Function.prototype);var r=Object.getOwnPropertyDescriptor(t,n);if(void 0===r){var o=Object.getPrototypeOf(t);return null===o?void 0:e(o,n,i)}if("value"in r)return r.value;var s=r.get;if(void 0!==s)return s.call(i)},c=n(35),l=function(e){return e&&e.__esModule?e:{default:e}}(c),u=n(1),h=function(e){function t(e){var n=e.element,o=e.classNames,s=e.delimiter;i(this,t);var a=r(this,(t.__proto__||Object.getPrototypeOf(t)).call(this,{element:n,classNames:o}));return a.delimiter=s,a}return o(t,e),s(t,[{key:"value",set:function(e){var t=(0,u.reduceToValues)(e),n=t.join(this.delimiter);this.element.setAttribute("value",n),this.element.value=n},get:function(){return a(t.prototype.__proto__||Object.getPrototypeOf(t.prototype),"value",this)}}]),t}(l.default);t.default=h},function(e,t,n){"use strict";function i(e){return e&&e.__esModule?e:{default:e}}function r(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}function o(e,t){if(!e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return!t||"object"!=typeof t&&"function"!=typeof t?e:t}function s(e,t){if("function"!=typeof t&&null!==t)throw new TypeError("Super expression must either be null or a function, not "+typeof t);e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,enumerable:!1,writable:!0,configurable:!0}}),t&&(Object.setPrototypeOf?Object.setPrototypeOf(e,t):e.__proto__=t)}Object.defineProperty(t,"__esModule",{value:!0});var a=function(){function e(e,t){for(var n=0;n<t.length;n++){var i=t[n];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(e,i.key,i)}}return function(t,n,i){return n&&e(t.prototype,n),i&&e(t,i),t}}(),c=n(35),l=i(c),u=n(36),h=i(u),d=function(e){function t(e){var n=e.element,i=e.classNames;return r(this,t),o(this,(t.__proto__||Object.getPrototypeOf(t)).call(this,{element:n,classNames:i}))}return s(t,e),a(t,[{key:"appendDocFragment",value:function(e){this.element.innerHTML="",this.element.appendChild(e)}},{key:"placeholderOption",get:function(){return this.element.querySelector("option[placeholder]")}},{key:"optionGroups",get:function(){return Array.from(this.element.getElementsByTagName("OPTGROUP"))}},{key:"options",get:function(){return Array.from(this.element.options)},set:function(e){var t=document.createDocumentFragment(),n=function(e){var n=h.default.option(e);t.appendChild(n)};e.forEach(function(e){return n(e)}),this.appendDocFragment(t)}}]),t}(l.default);t.default=d},function(e,t,n){var i,r;!function(){"use strict";function n(){for(var e=[],t=0;t<arguments.length;t++){var i=arguments[t];if(i){var r=typeof i;if("string"===r||"number"===r)e.push(i);else if(Array.isArray(i))e.push(n.apply(null,i));else if("object"===r)for(var s in i)o.call(i,s)&&i[s]&&e.push(s)}}return e.join(" ")}var o={}.hasOwnProperty;void 0!==e&&e.exports?e.exports=n:(i=[],void 0!==(r=function(){return n}.apply(t,i))&&(e.exports=r))}()},function(e,t,n){"use strict";Object.defineProperty(t,"__esModule",{value:!0}),t.clearChoices=t.activateChoices=t.filterChoices=t.addChoice=void 0;var i=n(5);t.addChoice=function(e){var t=e.value,n=e.label,r=e.id,o=e.groupId,s=e.disabled,a=e.elementId,c=e.customProperties,l=e.placeholder,u=e.keyCode;return{type:i.ACTION_TYPES.ADD_CHOICE,value:t,label:n,id:r,groupId:o,disabled:s,elementId:a,customProperties:c,placeholder:l,keyCode:u}},t.filterChoices=function(e){return{type:i.ACTION_TYPES.FILTER_CHOICES,results:e}},t.activateChoices=function(){var e=!(arguments.length>0&&void 0!==arguments[0])||arguments[0];return{type:i.ACTION_TYPES.ACTIVATE_CHOICES,active:e}},t.clearChoices=function(){return{type:i.ACTION_TYPES.CLEAR_CHOICES}}},function(e,t,n){"use strict";Object.defineProperty(t,"__esModule",{value:!0}),t.highlightItem=t.removeItem=t.addItem=void 0;var i=n(5);t.addItem=function(e){var t=e.value,n=e.label,r=e.id,o=e.choiceId,s=e.groupId,a=e.customProperties,c=e.placeholder,l=e.keyCode;return{type:i.ACTION_TYPES.ADD_ITEM,value:t,label:n,id:r,choiceId:o,groupId:s,customProperties:a,placeholder:c,keyCode:l}},t.removeItem=function(e,t){return{type:i.ACTION_TYPES.REMOVE_ITEM,id:e,choiceId:t}},t.highlightItem=function(e,t){return{type:i.ACTION_TYPES.HIGHLIGHT_ITEM,id:e,highlighted:t}}},function(e,t,n){"use strict";Object.defineProperty(t,"__esModule",{value:!0}),t.addGroup=void 0;var i=n(5);t.addGroup=function(e,t,n,r){return{type:i.ACTION_TYPES.ADD_GROUP,value:e,id:t,active:n,disabled:r}}},function(e,t,n){"use strict";Object.defineProperty(t,"__esModule",{value:!0});t.clearAll=function(){return{type:"CLEAR_ALL"}},t.resetTo=function(e){return{type:"RESET_TO",state:e}}}])});

/***/ }),

/***/ "./themes/lovata-shopaholic-sneakers/node_modules/focus-trap/index.js":
/*!****************************************************************************!*\
  !*** ./themes/lovata-shopaholic-sneakers/node_modules/focus-trap/index.js ***!
  \****************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var tabbable = __webpack_require__(/*! tabbable */ "./themes/lovata-shopaholic-sneakers/node_modules/tabbable/index.js");
var xtend = __webpack_require__(/*! xtend */ "./themes/lovata-shopaholic-sneakers/node_modules/xtend/immutable.js");

var activeFocusTraps = (function() {
  var trapQueue = [];
  return {
    activateTrap: function(trap) {
      if (trapQueue.length > 0) {
        var activeTrap = trapQueue[trapQueue.length - 1];
        if (activeTrap !== trap) {
          activeTrap.pause();
        }
      }

      var trapIndex = trapQueue.indexOf(trap);
      if (trapIndex === -1) {
        trapQueue.push(trap);
      } else {
        // move this existing trap to the front of the queue
        trapQueue.splice(trapIndex, 1);
        trapQueue.push(trap);
      }
    },

    deactivateTrap: function(trap) {
      var trapIndex = trapQueue.indexOf(trap);
      if (trapIndex !== -1) {
        trapQueue.splice(trapIndex, 1);
      }

      if (trapQueue.length > 0) {
        trapQueue[trapQueue.length - 1].unpause();
      }
    }
  };
})();

function focusTrap(element, userOptions) {
  var doc = document;
  var container =
    typeof element === 'string' ? doc.querySelector(element) : element;

  var config = xtend(
    {
      returnFocusOnDeactivate: true,
      escapeDeactivates: true
    },
    userOptions
  );

  var state = {
    firstTabbableNode: null,
    lastTabbableNode: null,
    nodeFocusedBeforeActivation: null,
    mostRecentlyFocusedNode: null,
    active: false,
    paused: false
  };

  var trap = {
    activate: activate,
    deactivate: deactivate,
    pause: pause,
    unpause: unpause
  };

  return trap;

  function activate(activateOptions) {
    if (state.active) return;

    updateTabbableNodes();

    state.active = true;
    state.paused = false;
    state.nodeFocusedBeforeActivation = doc.activeElement;

    var onActivate =
      activateOptions && activateOptions.onActivate
        ? activateOptions.onActivate
        : config.onActivate;
    if (onActivate) {
      onActivate();
    }

    addListeners();
    return trap;
  }

  function deactivate(deactivateOptions) {
    if (!state.active) return;

    removeListeners();
    state.active = false;
    state.paused = false;

    activeFocusTraps.deactivateTrap(trap);

    var onDeactivate =
      deactivateOptions && deactivateOptions.onDeactivate !== undefined
        ? deactivateOptions.onDeactivate
        : config.onDeactivate;
    if (onDeactivate) {
      onDeactivate();
    }

    var returnFocus =
      deactivateOptions && deactivateOptions.returnFocus !== undefined
        ? deactivateOptions.returnFocus
        : config.returnFocusOnDeactivate;
    if (returnFocus) {
      delay(function() {
        tryFocus(state.nodeFocusedBeforeActivation);
      });
    }

    return trap;
  }

  function pause() {
    if (state.paused || !state.active) return;
    state.paused = true;
    removeListeners();
  }

  function unpause() {
    if (!state.paused || !state.active) return;
    state.paused = false;
    addListeners();
  }

  function addListeners() {
    if (!state.active) return;

    // There can be only one listening focus trap at a time
    activeFocusTraps.activateTrap(trap);

    updateTabbableNodes();

    // Delay ensures that the focused element doesn't capture the event
    // that caused the focus trap activation.
    delay(function() {
      tryFocus(getInitialFocusNode());
    });
    doc.addEventListener('focusin', checkFocusIn, true);
    doc.addEventListener('mousedown', checkPointerDown, true);
    doc.addEventListener('touchstart', checkPointerDown, true);
    doc.addEventListener('click', checkClick, true);
    doc.addEventListener('keydown', checkKey, true);

    return trap;
  }

  function removeListeners() {
    if (!state.active) return;

    doc.removeEventListener('focusin', checkFocusIn, true);
    doc.removeEventListener('mousedown', checkPointerDown, true);
    doc.removeEventListener('touchstart', checkPointerDown, true);
    doc.removeEventListener('click', checkClick, true);
    doc.removeEventListener('keydown', checkKey, true);

    return trap;
  }

  function getNodeForOption(optionName) {
    var optionValue = config[optionName];
    var node = optionValue;
    if (!optionValue) {
      return null;
    }
    if (typeof optionValue === 'string') {
      node = doc.querySelector(optionValue);
      if (!node) {
        throw new Error('`' + optionName + '` refers to no known node');
      }
    }
    if (typeof optionValue === 'function') {
      node = optionValue();
      if (!node) {
        throw new Error('`' + optionName + '` did not return a node');
      }
    }
    return node;
  }

  function getInitialFocusNode() {
    var node;
    if (getNodeForOption('initialFocus') !== null) {
      node = getNodeForOption('initialFocus');
    } else if (container.contains(doc.activeElement)) {
      node = doc.activeElement;
    } else {
      node = state.firstTabbableNode || getNodeForOption('fallbackFocus');
    }

    if (!node) {
      throw new Error(
        "You can't have a focus-trap without at least one focusable element"
      );
    }

    return node;
  }

  // This needs to be done on mousedown and touchstart instead of click
  // so that it precedes the focus event.
  function checkPointerDown(e) {
    if (container.contains(e.target)) return;
    if (config.clickOutsideDeactivates) {
      deactivate({
        returnFocus: !tabbable.isFocusable(e.target)
      });
    } else {
      e.preventDefault();
    }
  }

  // In case focus escapes the trap for some strange reason, pull it back in.
  function checkFocusIn(e) {
    // In Firefox when you Tab out of an iframe the Document is briefly focused.
    if (container.contains(e.target) || e.target instanceof Document) {
      return;
    }
    e.stopImmediatePropagation();
    tryFocus(state.mostRecentlyFocusedNode || getInitialFocusNode());
  }

  function checkKey(e) {
    if (config.escapeDeactivates !== false && isEscapeEvent(e)) {
      e.preventDefault();
      deactivate();
      return;
    }
    if (isTabEvent(e)) {
      checkTab(e);
      return;
    }
  }

  // Hijack Tab events on the first and last focusable nodes of the trap,
  // in order to prevent focus from escaping. If it escapes for even a
  // moment it can end up scrolling the page and causing confusion so we
  // kind of need to capture the action at the keydown phase.
  function checkTab(e) {
    updateTabbableNodes();
    if (e.shiftKey && e.target === state.firstTabbableNode) {
      e.preventDefault();
      tryFocus(state.lastTabbableNode);
      return;
    }
    if (!e.shiftKey && e.target === state.lastTabbableNode) {
      e.preventDefault();
      tryFocus(state.firstTabbableNode);
      return;
    }
  }

  function checkClick(e) {
    if (config.clickOutsideDeactivates) return;
    if (container.contains(e.target)) return;
    e.preventDefault();
    e.stopImmediatePropagation();
  }

  function updateTabbableNodes() {
    var tabbableNodes = tabbable(container);
    state.firstTabbableNode = tabbableNodes[0] || getInitialFocusNode();
    state.lastTabbableNode =
      tabbableNodes[tabbableNodes.length - 1] || getInitialFocusNode();
  }

  function tryFocus(node) {
    if (node === doc.activeElement) return;
    if (!node || !node.focus) {
      tryFocus(getInitialFocusNode());
      return;
    }

    node.focus();
    state.mostRecentlyFocusedNode = node;
    if (isSelectableInput(node)) {
      node.select();
    }
  }
}

function isSelectableInput(node) {
  return (
    node.tagName &&
    node.tagName.toLowerCase() === 'input' &&
    typeof node.select === 'function'
  );
}

function isEscapeEvent(e) {
  return e.key === 'Escape' || e.key === 'Esc' || e.keyCode === 27;
}

function isTabEvent(e) {
  return e.key === 'Tab' || e.keyCode === 9;
}

function delay(fn) {
  return setTimeout(fn, 0);
}

module.exports = focusTrap;


/***/ }),

/***/ "./themes/lovata-shopaholic-sneakers/node_modules/tabbable/index.js":
/*!**************************************************************************!*\
  !*** ./themes/lovata-shopaholic-sneakers/node_modules/tabbable/index.js ***!
  \**************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

var candidateSelectors = [
  'input',
  'select',
  'textarea',
  'a[href]',
  'button',
  '[tabindex]',
  'audio[controls]',
  'video[controls]',
  '[contenteditable]:not([contenteditable="false"])',
];
var candidateSelector = candidateSelectors.join(',');

var matches = typeof Element === 'undefined'
  ? function () {}
  : Element.prototype.matches || Element.prototype.msMatchesSelector || Element.prototype.webkitMatchesSelector;

function tabbable(el, options) {
  options = options || {};

  var elementDocument = el.ownerDocument || el;
  var regularTabbables = [];
  var orderedTabbables = [];

  var untouchabilityChecker = new UntouchabilityChecker(elementDocument);
  var candidates = el.querySelectorAll(candidateSelector);

  if (options.includeContainer) {
    if (matches.call(el, candidateSelector)) {
      candidates = Array.prototype.slice.apply(candidates);
      candidates.unshift(el);
    }
  }

  var i, candidate, candidateTabindex;
  for (i = 0; i < candidates.length; i++) {
    candidate = candidates[i];

    if (!isNodeMatchingSelectorTabbable(candidate, untouchabilityChecker)) continue;

    candidateTabindex = getTabindex(candidate);
    if (candidateTabindex === 0) {
      regularTabbables.push(candidate);
    } else {
      orderedTabbables.push({
        documentOrder: i,
        tabIndex: candidateTabindex,
        node: candidate,
      });
    }
  }

  var tabbableNodes = orderedTabbables
    .sort(sortOrderedTabbables)
    .map(function(a) { return a.node })
    .concat(regularTabbables);

  return tabbableNodes;
}

tabbable.isTabbable = isTabbable;
tabbable.isFocusable = isFocusable;

function isNodeMatchingSelectorTabbable(node, untouchabilityChecker) {
  if (
    !isNodeMatchingSelectorFocusable(node, untouchabilityChecker)
    || isNonTabbableRadio(node)
    || getTabindex(node) < 0
  ) {
    return false;
  }
  return true;
}

function isTabbable(node, untouchabilityChecker) {
  if (!node) throw new Error('No node provided');
  if (matches.call(node, candidateSelector) === false) return false;
  return isNodeMatchingSelectorTabbable(node, untouchabilityChecker);
}

function isNodeMatchingSelectorFocusable(node, untouchabilityChecker) {
  untouchabilityChecker = untouchabilityChecker || new UntouchabilityChecker(node.ownerDocument || node);
  if (
    node.disabled
    || isHiddenInput(node)
    || untouchabilityChecker.isUntouchable(node)
  ) {
    return false;
  }
  return true;
}

var focusableCandidateSelector = candidateSelectors.concat('iframe').join(',');
function isFocusable(node, untouchabilityChecker) {
  if (!node) throw new Error('No node provided');
  if (matches.call(node, focusableCandidateSelector) === false) return false;
  return isNodeMatchingSelectorFocusable(node, untouchabilityChecker);
}

function getTabindex(node) {
  var tabindexAttr = parseInt(node.getAttribute('tabindex'), 10);
  if (!isNaN(tabindexAttr)) return tabindexAttr;
  // Browsers do not return `tabIndex` correctly for contentEditable nodes;
  // so if they don't have a tabindex attribute specifically set, assume it's 0.
  if (isContentEditable(node)) return 0;
  return node.tabIndex;
}

function sortOrderedTabbables(a, b) {
  return a.tabIndex === b.tabIndex ? a.documentOrder - b.documentOrder : a.tabIndex - b.tabIndex;
}

// Array.prototype.find not available in IE.
function find(list, predicate) {
  for (var i = 0, length = list.length; i < length; i++) {
    if (predicate(list[i])) return list[i];
  }
}

function isContentEditable(node) {
  return node.contentEditable === 'true';
}

function isInput(node) {
  return node.tagName === 'INPUT';
}

function isHiddenInput(node) {
  return isInput(node) && node.type === 'hidden';
}

function isRadio(node) {
  return isInput(node) && node.type === 'radio';
}

function isNonTabbableRadio(node) {
  return isRadio(node) && !isTabbableRadio(node);
}

function getCheckedRadio(nodes) {
  for (var i = 0; i < nodes.length; i++) {
    if (nodes[i].checked) {
      return nodes[i];
    }
  }
}

function isTabbableRadio(node) {
  if (!node.name) return true;
  // This won't account for the edge case where you have radio groups with the same
  // in separate forms on the same page.
  var radioSet = node.ownerDocument.querySelectorAll('input[type="radio"][name="' + node.name + '"]');
  var checked = getCheckedRadio(radioSet);
  return !checked || checked === node;
}

// An element is "untouchable" if *it or one of its ancestors* has
// `visibility: hidden` or `display: none`.
function UntouchabilityChecker(elementDocument) {
  this.doc = elementDocument;
  // Node cache must be refreshed on every check, in case
  // the content of the element has changed. The cache contains tuples
  // mapping nodes to their boolean result.
  this.cache = [];
}

// getComputedStyle accurately reflects `visibility: hidden` of ancestors
// but not `display: none`, so we need to recursively check parents.
UntouchabilityChecker.prototype.hasDisplayNone = function hasDisplayNone(node, nodeComputedStyle) {
  if (node.nodeType !== Node.ELEMENT_NODE) return false;

    // Search for a cached result.
    var cached = find(this.cache, function(item) {
      return item === node;
    });
    if (cached) return cached[1];

    nodeComputedStyle = nodeComputedStyle || this.doc.defaultView.getComputedStyle(node);

    var result = false;

    if (nodeComputedStyle.display === 'none') {
      result = true;
    } else if (node.parentNode) {
      result = this.hasDisplayNone(node.parentNode);
    }

    this.cache.push([node, result]);

    return result;
}

UntouchabilityChecker.prototype.isUntouchable = function isUntouchable(node) {
  if (node === this.doc.documentElement) return false;
  var computedStyle = this.doc.defaultView.getComputedStyle(node);
  if (this.hasDisplayNone(node, computedStyle)) return true;
  return computedStyle.visibility === 'hidden';
}

module.exports = tabbable;


/***/ }),

/***/ "./themes/lovata-shopaholic-sneakers/node_modules/vanilla-lazyload/dist/lazyload.js":
/*!******************************************************************************************!*\
  !*** ./themes/lovata-shopaholic-sneakers/node_modules/vanilla-lazyload/dist/lazyload.js ***!
  \******************************************************************************************/
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

/***/ "./themes/lovata-shopaholic-sneakers/node_modules/xtend/immutable.js":
/*!***************************************************************************!*\
  !*** ./themes/lovata-shopaholic-sneakers/node_modules/xtend/immutable.js ***!
  \***************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = extend

var hasOwnProperty = Object.prototype.hasOwnProperty;

function extend() {
    var target = {}

    for (var i = 0; i < arguments.length; i++) {
        var source = arguments[i]

        for (var key in source) {
            if (hasOwnProperty.call(source, key)) {
                target[key] = source[key]
            }
        }
    }

    return target
}


/***/ }),

/***/ "./themes/lovata-shopaholic-sneakers/pages/catalog.js":
/*!************************************************************!*\
  !*** ./themes/lovata-shopaholic-sneakers/pages/catalog.js ***!
  \************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _partials_product_catalog_filter_filter_drawer__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../partials/product/catalog/filter/filter-drawer */ "./themes/lovata-shopaholic-sneakers/partials/product/catalog/filter/filter-drawer.js");
/* harmony import */ var _partials_product_catalog_catalog_list_catalog_list__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../partials/product/catalog/catalog-list/catalog-list */ "./themes/lovata-shopaholic-sneakers/partials/product/catalog/catalog-list/catalog-list.js");
/* harmony import */ var _partials_product_catalog_filter_bar_filter_checked_filter_checked__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../partials/product/catalog/filter-bar/filter-checked/filter-checked */ "./themes/lovata-shopaholic-sneakers/partials/product/catalog/filter-bar/filter-checked/filter-checked.js");
/* harmony import */ var _partials_form_select_select__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../partials/form/select/select */ "./themes/lovata-shopaholic-sneakers/partials/form/select/select.js");
/* Product */





/***/ }),

/***/ "./themes/lovata-shopaholic-sneakers/partials/form/select/select.js":
/*!**************************************************************************!*\
  !*** ./themes/lovata-shopaholic-sneakers/partials/form/select/select.js ***!
  \**************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var choices_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! choices.js */ "./themes/lovata-shopaholic-sneakers/node_modules/choices.js/public/assets/scripts/choices.min.js");
/* harmony import */ var choices_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(choices_js__WEBPACK_IMPORTED_MODULE_0__);

/* harmony default export */ __webpack_exports__["default"] = (new class Select {
  constructor() {
    this.selectSelector = 'select';
    this.selectNoBorderSelector = 'select_no-border';
    this.mediaQueryString = '(min-width: 769px)';
    this.isInit = false;
    this.customEventType = 'input';
    this.handler();
  }

  handler() {
    document.addEventListener('DOMContentLoaded', () => {
      this.checkSelect();
    });
    window.addEventListener('resize', () => {
      if (this.isDesktop() && !this.isInit) {
        this.checkSelect();
      }
    });
  }

  isDesktop() {
    return window.matchMedia(this.mediaQueryString).matches;
  }

  checkSelect() {
    const select = document.querySelectorAll(".".concat(this.selectSelector));
    if (!select) return;
    [...select].forEach(el => this.init(el));
  }

  init(el) {
    if (!this.isDesktop()) return;
    const border = el.classList.contains(this.selectNoBorderSelector) ? '_no-border' : '';
    this.select = new choices_js__WEBPACK_IMPORTED_MODULE_0___default.a(el, {
      searchEnabled: false,
      shouldSort: false,
      itemSelectText: '',
      classNames: {
        containerOuter: "choices select ".concat(border),
        containerInner: "choices__inner select__inner ".concat(border),
        listDropdown: 'choices__list--dropdown select__list_dropdown',
        list: 'choices__list webkit-scroll_select select__list',
        item: 'choices__item select__item'
      },
      callbackOnInit: this.isInit = true
    });
    el.addEventListener('choice', () => {
      el.dispatchEvent(this.createCustomEvent());
    });
  }

  createCustomEvent() {
    const inputEvent = new Event(this.customEventType, {
      bubbles: true,
      cancelable: false
    });
    return inputEvent;
  }

}());

/***/ }),

/***/ "./themes/lovata-shopaholic-sneakers/partials/product/catalog/catalog-list/catalog-list.js":
/*!*************************************************************************************************!*\
  !*** ./themes/lovata-shopaholic-sneakers/partials/product/catalog/catalog-list/catalog-list.js ***!
  \*************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* WEBPACK VAR INJECTION */(function($) {/* harmony import */ var _lovata_shopaholic_product_list_shopaholic_product_list__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @lovata/shopaholic-product-list/shopaholic-product-list */ "./themes/lovata-shopaholic-sneakers/node_modules/@lovata/shopaholic-product-list/shopaholic-product-list.js");
/* harmony import */ var _lovata_shopaholic_product_list_shopaholic_pagination__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @lovata/shopaholic-product-list/shopaholic-pagination */ "./themes/lovata-shopaholic-sneakers/node_modules/@lovata/shopaholic-product-list/shopaholic-pagination.js");
/* harmony import */ var _lovata_shopaholic_filter_panel_shopaholic_filter_panel__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @lovata/shopaholic-filter-panel/shopaholic-filter-panel */ "./themes/lovata-shopaholic-sneakers/node_modules/@lovata/shopaholic-filter-panel/shopaholic-filter-panel.js");
/* harmony import */ var _lovata_shopaholic_filter_panel_shopaholic_filter_price__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @lovata/shopaholic-filter-panel/shopaholic-filter-price */ "./themes/lovata-shopaholic-sneakers/node_modules/@lovata/shopaholic-filter-panel/shopaholic-filter-price.js");
/* harmony import */ var _lovata_shopaholic_product_list_shopaholic_sorting__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @lovata/shopaholic-product-list/shopaholic-sorting */ "./themes/lovata-shopaholic-sneakers/node_modules/@lovata/shopaholic-product-list/shopaholic-sorting.js");
/* harmony import */ var _js_lazy_load__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ../../../../js/lazy-load */ "./themes/lovata-shopaholic-sneakers/js/lazy-load.js");
/* harmony import */ var _form_select_select__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ../../../form/select/select */ "./themes/lovata-shopaholic-sneakers/partials/form/select/select.js");







/* harmony default export */ __webpack_exports__["default"] = (new class FilterPanel {
  constructor() {
    this.sCatalogWrapper = '.catalog__wrapper';
    this.preLoaderSelector = '.catalog__preloader';
    this.filterPreLoaderElector = '.filter__preloader';
    this.brandWrapperSelector = '._shopaholic-brand-filter-wrapper';
    this.saleFilterWrapper = '._shopaholic-sale-filter-wrapper';
    this.filterBtnWrapperSelector = '.filter-bar__filter-btn-wrapper';
    this.filterPanelWrapper = '.filter__wrapper';
    this.filterBarSelector = '.filter-bar';
    this.mediaQueryList = window.matchMedia('(min-width: 769px)');
    this.handlers();
  }

  handlers() {
    if (!document.querySelector(this.sCatalogWrapper)) return;
    this.initFilterHandlers();
    document.addEventListener('DOMContentLoaded', () => {
      this.chooseAjaxHelper();
    });
    this.mediaQueryList.addListener(() => {
      this.chooseAjaxHelper();
    });
  }

  isDesktop() {
    return this.mediaQueryList.matches;
  }

  chooseAjaxHelper() {
    let updateAll = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : false;

    if (!updateAll && !this.isDesktop()) {
      this.obListHelper = this.updateFilterPanelAjax();
    } else {
      this.obListHelper = this.updateAllAjax();
    }

    this.instanceArray.forEach(el => {
      el.obProductListHelper = this.obListHelper; // eslint-disable-line no-param-reassign
    });
  }

  updateAllAjax() {
    const obListHelper = new _lovata_shopaholic_product_list_shopaholic_product_list__WEBPACK_IMPORTED_MODULE_0__["default"]();
    obListHelper.setAjaxRequestCallback(obRequestData => {
      /* eslint-disable  no-param-reassign */
      obRequestData.update = {
        'product/catalog/catalog-ajax': this.sCatalogWrapper
      };

      obRequestData.complete = () => {
        _js_lazy_load__WEBPACK_IMPORTED_MODULE_5__["default"].update();
        _form_select_select__WEBPACK_IMPORTED_MODULE_6__["default"].checkSelect();

        if (!this.checkWindowPosition()) {
          const bar = $(this.filterBarSelector);
          if (!bar.length) return;
          const distance = bar.offset().top;
          $('body, html').animate({
            scrollTop: distance
          }, 350);
        }
      };

      obRequestData.loading = this.preLoaderSelector;
      /* eslint-enable */

      return obRequestData;
    });
    return obListHelper;
  }

  checkWindowPosition() {
    const docViewTop = $(window).scrollTop();
    const docViewBottom = docViewTop + $(window).height();
    const bar = $(this.filterBarSelector);
    if (!bar.length) return true;
    const elemTop = $(this.filterBarSelector).offset().top;
    const elemBottom = elemTop + $(this.filterBarSelector).height();
    return elemBottom <= docViewBottom && elemTop >= docViewTop;
  }

  updateFilterPanelAjax() {
    const obListHelper = new _lovata_shopaholic_product_list_shopaholic_product_list__WEBPACK_IMPORTED_MODULE_0__["default"]();
    obListHelper.setAjaxRequestCallback(obRequestData => {
      /* eslint-disable  no-param-reassign */
      obRequestData.update = {
        'product/catalog/filter/filter-ajax': this.filterPanelWrapper,
        'product/catalog/filter-bar/filter-bar-btn-ajax': this.filterBtnWrapperSelector
      };
      obRequestData.loading = this.filterPreLoaderElector;
      /* eslint-enable */

      return obRequestData;
    });
    return obListHelper;
  }

  initFilterHandlers() {
    const obListHelper = this.updateAllAjax();
    const obFilterPanel = new _lovata_shopaholic_filter_panel_shopaholic_filter_panel__WEBPACK_IMPORTED_MODULE_2__["default"]();
    obFilterPanel.init();
    const obBrandFilterPanel = new _lovata_shopaholic_filter_panel_shopaholic_filter_panel__WEBPACK_IMPORTED_MODULE_2__["default"]();
    obBrandFilterPanel.setWrapperSelector(this.brandWrapperSelector).setFieldName('brand').init();
    const obSaleFilterPanel = new _lovata_shopaholic_filter_panel_shopaholic_filter_panel__WEBPACK_IMPORTED_MODULE_2__["default"]();
    obSaleFilterPanel.setWrapperSelector(this.saleFilterWrapper).setFieldName('sale').init();
    const obPaginationHelper = new _lovata_shopaholic_product_list_shopaholic_pagination__WEBPACK_IMPORTED_MODULE_1__["default"](obListHelper);
    obPaginationHelper.init();
    const obSortingHelper = new _lovata_shopaholic_product_list_shopaholic_sorting__WEBPACK_IMPORTED_MODULE_4__["default"](obListHelper);
    obSortingHelper.init();
    const obFilterPrice = new _lovata_shopaholic_filter_panel_shopaholic_filter_price__WEBPACK_IMPORTED_MODULE_3__["default"]();
    obFilterPrice.setEventType('input').init();
    this.instanceArray = [obFilterPanel, obBrandFilterPanel, obSaleFilterPanel, obFilterPrice];
  }

}());
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! jquery */ "./themes/lovata-shopaholic-sneakers/node_modules/jquery/dist/jquery.js")))

/***/ }),

/***/ "./themes/lovata-shopaholic-sneakers/partials/product/catalog/filter-bar/filter-checked/filter-checked.js":
/*!****************************************************************************************************************!*\
  !*** ./themes/lovata-shopaholic-sneakers/partials/product/catalog/filter-bar/filter-checked/filter-checked.js ***!
  \****************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* WEBPACK VAR INJECTION */(function($) {/* harmony import */ var _lovata_url_generation__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @lovata/url-generation */ "./themes/lovata-shopaholic-sneakers/node_modules/@lovata/url-generation/url-generation.js");
/* harmony import */ var _catalog_list_catalog_list__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../catalog-list/catalog-list */ "./themes/lovata-shopaholic-sneakers/partials/product/catalog/catalog-list/catalog-list.js");


/* harmony default export */ __webpack_exports__["default"] = (new class FilterChecked {
  constructor() {
    this.sRemoveButtonClass = 'filter-checked__remove';
    this.sClearButtonClass = 'filter-checked__reset';
    this.init();
  }

  init() {
    $(document).on('click', ".".concat(this.sRemoveButtonClass), obEvent => {
      const obButton = $(obEvent.currentTarget);
      const iPropertyID = obButton.attr('data-property-id');
      let sFieldName = obButton.attr('data-filter-name');

      if (iPropertyID.length > 0) {
        sFieldName += "[".concat(iPropertyID, "]");
      }

      _lovata_url_generation__WEBPACK_IMPORTED_MODULE_0__["default"].init();
      _lovata_url_generation__WEBPACK_IMPORTED_MODULE_0__["default"].remove(sFieldName);
      _lovata_url_generation__WEBPACK_IMPORTED_MODULE_0__["default"].update();
      _catalog_list_catalog_list__WEBPACK_IMPORTED_MODULE_1__["default"].obListHelper.send();
    });
    $(document).on('click', ".".concat(this.sClearButtonClass), () => {
      _lovata_url_generation__WEBPACK_IMPORTED_MODULE_0__["default"].clear();
      _catalog_list_catalog_list__WEBPACK_IMPORTED_MODULE_1__["default"].obListHelper.send();
    });
  }

}());
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! jquery */ "./themes/lovata-shopaholic-sneakers/node_modules/jquery/dist/jquery.js")))

/***/ }),

/***/ "./themes/lovata-shopaholic-sneakers/partials/product/catalog/filter/filter-drawer.js":
/*!********************************************************************************************!*\
  !*** ./themes/lovata-shopaholic-sneakers/partials/product/catalog/filter/filter-drawer.js ***!
  \********************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* WEBPACK VAR INJECTION */(function($) {/* harmony import */ var _lovata_url_generation__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @lovata/url-generation */ "./themes/lovata-shopaholic-sneakers/node_modules/@lovata/url-generation/url-generation.js");
/* harmony import */ var _lovata_popup_helper__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @lovata/popup-helper */ "./themes/lovata-shopaholic-sneakers/node_modules/@lovata/popup-helper/popup-helper.js");
/* harmony import */ var _catalog_list_catalog_list__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../catalog-list/catalog-list */ "./themes/lovata-shopaholic-sneakers/partials/product/catalog/catalog-list/catalog-list.js");



/* harmony default export */ __webpack_exports__["default"] = (new class filterDrawer {
  constructor() {
    this.panelSelector = 'filter';
    this.panelOpenSelector = 'filter_open';
    this.drawerBtnSelector = 'js-filter-bar';
    this.drawerParentSelector = 'catalog';
    this.drawerOpenBtnSelector = 'filter__btn-close';
    this.drawerCloseSelector = 'filter__btn-close';
    this.resetBtnSelector = 'filter__reset';
    this.submitSelector = 'filter__submit';
    this.mediaQueryList = window.matchMedia('(min-width: 769px)');
    this.handler();
  }

  handler() {
    const btn = document.querySelector(".".concat(this.drawerCloseSelector));
    $(document).on('click', ".".concat(this.drawerBtnSelector), (_ref) => {
      let {
        currentTarget
      } = _ref;
      this.clickHandler(currentTarget);
    });
    $(document).on('click', ".".concat(this.resetBtnSelector), () => {
      _lovata_url_generation__WEBPACK_IMPORTED_MODULE_0__["default"].clear();
      _catalog_list_catalog_list__WEBPACK_IMPORTED_MODULE_2__["default"].updateFilterPanelAjax().send();
    });
    $(document).on('click', ".".concat(this.submitSelector), e => {
      e.preventDefault();
      const overlay = _lovata_popup_helper__WEBPACK_IMPORTED_MODULE_1__["default"].getOverlay();
      if (!overlay) return;
      overlay.click();
    });
    this.mediaQueryList.addListener(() => {
      this.resizeHandler(btn);
    });
  }

  clickHandler(eventTarget) {
    const panel = $(eventTarget).parents(".".concat(this.drawerParentSelector)).find(".".concat(this.panelSelector));
    const focusTarget = $(eventTarget).hasClass(this.drawerOpenBtnSelector) ? document.querySelector(".".concat(this.drawerCloseSelector)) : document.querySelector(".".concat(this.drawerOpenBtnSelector));
    const isOpen = panel.hasClass(this.panelOpenSelector);
    _lovata_popup_helper__WEBPACK_IMPORTED_MODULE_1__["default"].setBodyScrollState(isOpen);
    _lovata_popup_helper__WEBPACK_IMPORTED_MODULE_1__["default"].overlayHandler(!isOpen, focusTarget, panel[0]);
    panel.toggleClass(this.panelOpenSelector);
    _lovata_popup_helper__WEBPACK_IMPORTED_MODULE_1__["default"].focusTrapManager(!isOpen, panel[0]);
    this.constructor.updateCatalog(isOpen);
  }

  resizeHandler(triggerNode) {
    const vpCondition = this.mediaQueryList.matches;
    const modalCondition = $(".".concat(this.panelSelector)).hasClass(this.panelOpenSelector);

    if (vpCondition && modalCondition) {
      triggerNode.click();
    }
  }

  static updateCatalog(isOpen) {
    if (!isOpen) return;
    const updateAll = _catalog_list_catalog_list__WEBPACK_IMPORTED_MODULE_2__["default"].updateAllAjax();
    updateAll.send();
  }

}());
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! jquery */ "./themes/lovata-shopaholic-sneakers/node_modules/jquery/dist/jquery.js")))

/***/ }),

/***/ 4:
/*!******************************************************************!*\
  !*** multi ./themes/lovata-shopaholic-sneakers/pages/catalog.js ***!
  \******************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /sr/apache/vivankovich.com/october/themes/lovata-shopaholic-sneakers/pages/catalog.js */"./themes/lovata-shopaholic-sneakers/pages/catalog.js");


/***/ })

},[[4,"/js/manifest","/js/vendor"]]]);
//# sourceMappingURL=catalog.js.map