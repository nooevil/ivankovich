(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["/js/common"],{

/***/ "./modules/system/assets/js/framework.js":
/*!***********************************************!*\
  !*** ./modules/system/assets/js/framework.js ***!
  \***********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/* WEBPACK VAR INJECTION */(function(__webpack_provided_window_dot_jQuery, jQuery) {/* ========================================================================
 * OctoberCMS: front-end JavaScript framework
 * http://octobercms.com
 * ========================================================================
 * Copyright 2017 Alexey Bobkov, Samuel Georges
 * ======================================================================== */
if (__webpack_provided_window_dot_jQuery === undefined) {
  throw new Error('The jQuery library is not loaded. The OctoberCMS framework cannot be initialized.');
}

if (__webpack_provided_window_dot_jQuery.request !== undefined) {
  throw new Error('The OctoberCMS framework is already loaded.');
}

+function ($) {
  "use strict";

  var Request = function Request(element, handler, options) {
    var $el = this.$el = $(element);
    this.options = options || {};
    /*
     * Validate handler name
     */

    if (handler === undefined) {
      throw new Error('The request handler name is not specified.');
    }

    if (!handler.match(/^(?:\w+\:{2})?on*/)) {
      throw new Error('Invalid handler name. The correct handler name format is: "onEvent".');
    }
    /*
     * Prepare the options and execute the request
     */


    var $form = options.form ? $(options.form) : $el.closest('form'),
        $triggerEl = !!$form.length ? $form : $el,
        context = {
      handler: handler,
      options: options
    };
    $el.trigger('ajaxSetup', [context]);

    var _event = jQuery.Event('oc.beforeRequest');

    $triggerEl.trigger(_event, context);
    if (_event.isDefaultPrevented()) return;
    var loading = options.loading !== undefined ? options.loading : null,
        url = options.url !== undefined ? options.url : window.location.href,
        isRedirect = options.redirect !== undefined && options.redirect.length,
        useFlash = options.flash !== undefined,
        useFiles = options.files !== undefined;

    if (useFiles && typeof FormData === 'undefined') {
      console.warn('This browser does not support file uploads via FormData');
      useFiles = false;
    }

    if ($.type(loading) == 'string') {
      loading = $(loading);
    }
    /*
     * Request headers
     */


    var requestHeaders = {
      'X-OCTOBER-REQUEST-HANDLER': handler,
      'X-OCTOBER-REQUEST-PARTIALS': this.extractPartials(options.update)
    };

    if (useFlash) {
      requestHeaders['X-OCTOBER-REQUEST-FLASH'] = 1;
    }
    /*
     * Request data
     */


    var requestData,
        inputName,
        data = {};
    $.each($el.parents('[data-request-data]').toArray().reverse(), function extendRequest() {
      $.extend(data, paramToObj('data-request-data', $(this).data('request-data')));
    });

    if ($el.is(':input') && !$form.length) {
      inputName = $el.attr('name');

      if (inputName !== undefined && options.data[inputName] === undefined) {
        options.data[inputName] = $el.val();
      }
    }

    if (options.data !== undefined && !$.isEmptyObject(options.data)) {
      $.extend(data, options.data);
    }

    if (useFiles) {
      requestData = new FormData($form.length ? $form.get(0) : null);

      if ($el.is(':file') && inputName) {
        $.each($el.prop('files'), function () {
          requestData.append(inputName, this);
        });
        delete data[inputName];
      }

      $.each(data, function (key) {
        requestData.append(key, this);
      });
    } else {
      requestData = [$form.serialize(), $.param(data)].filter(Boolean).join('&');
    }
    /*
     * Request options
     */


    var requestOptions = {
      url: url,
      crossDomain: false,
      context: context,
      headers: requestHeaders,
      success: function success(data, textStatus, jqXHR) {
        /*
         * Halt here if beforeUpdate() or data-request-before-update returns false
         */
        if (this.options.beforeUpdate.apply(this, [data, textStatus, jqXHR]) === false) return;
        if (options.evalBeforeUpdate && eval('(function($el, context, data, textStatus, jqXHR) {' + options.evalBeforeUpdate + '}.call($el.get(0), $el, context, data, textStatus, jqXHR))') === false) return;
        /*
         * Trigger 'ajaxBeforeUpdate' on the form, halt if event.preventDefault() is called
         */

        var _event = jQuery.Event('ajaxBeforeUpdate');

        $triggerEl.trigger(_event, [context, data, textStatus, jqXHR]);
        if (_event.isDefaultPrevented()) return;

        if (useFlash && data['X_OCTOBER_FLASH_MESSAGES']) {
          $.each(data['X_OCTOBER_FLASH_MESSAGES'], function (type, message) {
            requestOptions.handleFlashMessage(message, type);
          });
        }
        /*
         * Proceed with the update process
         */


        var updatePromise = requestOptions.handleUpdateResponse(data, textStatus, jqXHR);
        updatePromise.done(function () {
          $triggerEl.trigger('ajaxSuccess', [context, data, textStatus, jqXHR]);
          options.evalSuccess && eval('(function($el, context, data, textStatus, jqXHR) {' + options.evalSuccess + '}.call($el.get(0), $el, context, data, textStatus, jqXHR))');
        });
        return updatePromise;
      },
      error: function error(jqXHR, textStatus, errorThrown) {
        var errorMsg,
            updatePromise = $.Deferred();
        if (window.ocUnloading !== undefined && window.ocUnloading || errorThrown == 'abort') return;
        /*
         * Disable redirects
         */

        isRedirect = false;
        options.redirect = null;
        /*
         * Error 406 is a "smart error" that returns response object that is
         * processed in the same fashion as a successful response.
         */

        if (jqXHR.status == 406 && jqXHR.responseJSON) {
          errorMsg = jqXHR.responseJSON['X_OCTOBER_ERROR_MESSAGE'];
          updatePromise = requestOptions.handleUpdateResponse(jqXHR.responseJSON, textStatus, jqXHR);
        }
        /*
         * Standard error with standard response text
         */
        else {
            errorMsg = jqXHR.responseText ? jqXHR.responseText : jqXHR.statusText;
            updatePromise.resolve();
          }

        updatePromise.done(function () {
          $el.data('error-message', errorMsg);
          /*
           * Trigger 'ajaxError' on the form, halt if event.preventDefault() is called
           */

          var _event = jQuery.Event('ajaxError');

          $triggerEl.trigger(_event, [context, errorMsg, textStatus, jqXHR]);
          if (_event.isDefaultPrevented()) return;
          /*
           * Halt here if the data-request-error attribute returns false
           */

          if (options.evalError && eval('(function($el, context, errorMsg, textStatus, jqXHR) {' + options.evalError + '}.call($el.get(0), $el, context, errorMsg, textStatus, jqXHR))') === false) return;
          requestOptions.handleErrorMessage(errorMsg);
        });
        return updatePromise;
      },
      complete: function complete(data, textStatus, jqXHR) {
        $triggerEl.trigger('ajaxComplete', [context, data, textStatus, jqXHR]);
        options.evalComplete && eval('(function($el, context, data, textStatus, jqXHR) {' + options.evalComplete + '}.call($el.get(0), $el, context, data, textStatus, jqXHR))');
      },

      /*
       * Custom function, requests confirmation from the user
       */
      handleConfirmMessage: function handleConfirmMessage(message) {
        var _event = jQuery.Event('ajaxConfirmMessage');

        _event.promise = $.Deferred();

        if ($(window).triggerHandler(_event, [message]) !== undefined) {
          _event.promise.done(function () {
            options.confirm = null;
            new Request(element, handler, options);
          });

          return false;
        }

        if (_event.isDefaultPrevented()) return;
        if (message) return confirm(message);
      },

      /*
       * Custom function, display an error message to the user
       */
      handleErrorMessage: function handleErrorMessage(message) {
        var _event = jQuery.Event('ajaxErrorMessage');

        $(window).trigger(_event, [message]);
        if (_event.isDefaultPrevented()) return;
        if (message) alert(message);
      },

      /*
       * Custom function, focus fields with errors
       */
      handleValidationMessage: function handleValidationMessage(message, fields) {
        $triggerEl.trigger('ajaxValidation', [context, message, fields]);
        var isFirstInvalidField = true;
        $.each(fields, function focusErrorField(fieldName, fieldMessages) {
          fieldName = fieldName.replace(/\.(\w+)/g, '[$1]');
          var fieldElement = $form.find('[name="' + fieldName + '"], [name="' + fieldName + '[]"], [name$="[' + fieldName + ']"], [name$="[' + fieldName + '][]"]').filter(':enabled').first();

          if (fieldElement.length > 0) {
            var _event = jQuery.Event('ajaxInvalidField');

            $(window).trigger(_event, [fieldElement.get(0), fieldName, fieldMessages, isFirstInvalidField]);

            if (isFirstInvalidField) {
              if (!_event.isDefaultPrevented()) fieldElement.focus();
              isFirstInvalidField = false;
            }
          }
        });
      },

      /*
       * Custom function, display a flash message to the user
       */
      handleFlashMessage: function handleFlashMessage(message, type) {},

      /*
       * Custom function, redirect the browser to another location
       */
      handleRedirectResponse: function handleRedirectResponse(url) {
        window.location.href = url;
      },

      /*
       * Custom function, handle any application specific response values
       * Using a promisary object here in case injected assets need time to load
       */
      handleUpdateResponse: function handleUpdateResponse(data, textStatus, jqXHR) {
        /*
         * Update partials and finish request
         */
        var updatePromise = $.Deferred().done(function () {
          for (var partial in data) {
            /*
             * If a partial has been supplied on the client side that matches the server supplied key, look up
             * it's selector and use that. If not, we assume it is an explicit selector reference.
             */
            var selector = options.update[partial] ? options.update[partial] : partial;

            if ($.type(selector) == 'string' && selector.charAt(0) == '@') {
              $(selector.substring(1)).append(data[partial]).trigger('ajaxUpdate', [context, data, textStatus, jqXHR]);
            } else if ($.type(selector) == 'string' && selector.charAt(0) == '^') {
              $(selector.substring(1)).prepend(data[partial]).trigger('ajaxUpdate', [context, data, textStatus, jqXHR]);
            } else {
              $(selector).trigger('ajaxBeforeReplace');
              $(selector).html(data[partial]).trigger('ajaxUpdate', [context, data, textStatus, jqXHR]);
            }
          }
          /*
           * Wait for .html() method to finish rendering from partial updates
           */


          setTimeout(function () {
            $(window).trigger('ajaxUpdateComplete', [context, data, textStatus, jqXHR]).trigger('resize');
          }, 0);
        });
        /*
         * Handle redirect
         */

        if (data['X_OCTOBER_REDIRECT']) {
          options.redirect = data['X_OCTOBER_REDIRECT'];
          isRedirect = true;
        }

        if (isRedirect) {
          requestOptions.handleRedirectResponse(options.redirect);
        }
        /*
         * Handle validation
         */


        if (data['X_OCTOBER_ERROR_FIELDS']) {
          requestOptions.handleValidationMessage(data['X_OCTOBER_ERROR_MESSAGE'], data['X_OCTOBER_ERROR_FIELDS']);
        }
        /*
         * Handle asset injection
         */


        if (data['X_OCTOBER_ASSETS']) {
          assetManager.load(data['X_OCTOBER_ASSETS'], $.proxy(updatePromise.resolve, updatePromise));
        } else {
          updatePromise.resolve();
        }

        return updatePromise;
      }
    };

    if (useFiles) {
      requestOptions.processData = requestOptions.contentType = false;
    }
    /*
     * Allow default business logic to be called from user functions
     */


    context.success = requestOptions.success;
    context.error = requestOptions.error;
    context.complete = requestOptions.complete;
    requestOptions = $.extend(requestOptions, options);
    requestOptions.data = requestData;
    /*
     * Initiate request
     */

    if (options.confirm && !requestOptions.handleConfirmMessage(options.confirm)) {
      return;
    }

    if (loading) loading.show();
    $(window).trigger('ajaxBeforeSend', [context]);
    $el.trigger('ajaxPromise', [context]);
    return $.ajax(requestOptions).fail(function (jqXHR, textStatus, errorThrown) {
      if (!isRedirect) {
        $el.trigger('ajaxFail', [context, textStatus, jqXHR]);
      }

      if (loading) loading.hide();
    }).done(function (data, textStatus, jqXHR) {
      if (!isRedirect) {
        $el.trigger('ajaxDone', [context, data, textStatus, jqXHR]);
      }

      if (loading) loading.hide();
    }).always(function (dataOrXhr, textStatus, xhrOrError) {
      $el.trigger('ajaxAlways', [context, dataOrXhr, textStatus, xhrOrError]);
    });
  };

  Request.DEFAULTS = {
    update: {},
    type: 'POST',
    beforeUpdate: function beforeUpdate(data, textStatus, jqXHR) {},
    evalBeforeUpdate: null,
    evalSuccess: null,
    evalError: null,
    evalComplete: null
    /*
     * Internal function, build a string of partials and their update elements.
     */

  };

  Request.prototype.extractPartials = function (update) {
    var result = [];

    for (var partial in update) result.push(partial);

    return result.join('&');
  }; // REQUEST PLUGIN DEFINITION
  // ============================


  var old = $.fn.request;

  $.fn.request = function (handler, option) {
    var args = arguments;
    var $this = $(this).first();
    var data = {
      evalBeforeUpdate: $this.data('request-before-update'),
      evalSuccess: $this.data('request-success'),
      evalError: $this.data('request-error'),
      evalComplete: $this.data('request-complete'),
      confirm: $this.data('request-confirm'),
      redirect: $this.data('request-redirect'),
      loading: $this.data('request-loading'),
      flash: $this.data('request-flash'),
      files: $this.data('request-files'),
      form: $this.data('request-form'),
      url: $this.data('request-url'),
      update: paramToObj('data-request-update', $this.data('request-update')),
      data: paramToObj('data-request-data', $this.data('request-data'))
    };
    if (!handler) handler = $this.data('request');
    var options = $.extend(true, {}, Request.DEFAULTS, data, typeof option == 'object' && option);
    return new Request($this, handler, options);
  };

  $.fn.request.Constructor = Request;

  $.request = function (handler, option) {
    return $(document).request(handler, option);
  }; // REQUEST NO CONFLICT
  // =================


  $.fn.request.noConflict = function () {
    $.fn.request = old;
    return this;
  }; // REQUEST DATA-API
  // ==============


  function paramToObj(name, value) {
    if (value === undefined) value = '';
    if (typeof value == 'object') return value;

    try {
      return JSON.parse(JSON.stringify(eval("({" + value + "})")));
    } catch (e) {
      throw new Error('Error parsing the ' + name + ' attribute value. ' + e);
    }
  }

  $(document).on('change', 'select[data-request], input[type=radio][data-request], input[type=checkbox][data-request], input[type=file][data-request]', function documentOnChange() {
    $(this).request();
  });
  $(document).on('click', 'a[data-request], button[data-request], input[type=button][data-request], input[type=submit][data-request]', function documentOnClick(e) {
    e.preventDefault();
    $(this).request();
    if ($(this).is('[type=submit]')) return false;
  });
  $(document).on('keydown', 'input[type=text][data-request], input[type=submit][data-request], input[type=password][data-request]', function documentOnKeydown(e) {
    if (e.keyCode == 13) {
      if (this.dataTrackInputTimer !== undefined) window.clearTimeout(this.dataTrackInputTimer);
      $(this).request();
      return false;
    }
  });
  $(document).on('input', 'input[data-request][data-track-input]', function documentOnKeyup(e) {
    var $el = $(this),
        lastValue = $el.data('oc.lastvalue');
    if (!$el.is('[type=email],[type=number],[type=password],[type=search],[type=text]')) return;
    if (lastValue !== undefined && lastValue == this.value) return;
    $el.data('oc.lastvalue', this.value);
    if (this.dataTrackInputTimer !== undefined) window.clearTimeout(this.dataTrackInputTimer);
    var interval = $(this).data('track-input');
    if (!interval) interval = 300;
    var self = this;
    this.dataTrackInputTimer = window.setTimeout(function () {
      if (self.lastDataTrackInputRequest) {
        self.lastDataTrackInputRequest.abort();
      }

      self.lastDataTrackInputRequest = $(self).request();
    }, interval);
  });
  $(document).on('submit', '[data-request]', function documentOnSubmit() {
    $(this).request();
    return false;
  });
  $(window).on('beforeunload', function documentOnBeforeUnload() {
    window.ocUnloading = true;
  });
  /*
   * Invent our own event that unifies document.ready with window.ajaxUpdateComplete
   *
   * $(document).render(function() { })
   * $(document).on('render', function() { })
   */

  $(document).ready(function triggerRenderOnReady() {
    $(document).trigger('render');
  });
  $(window).on('ajaxUpdateComplete', function triggerRenderOnAjaxUpdateComplete() {
    $(document).trigger('render');
  });

  $.fn.render = function (callback) {
    $(document).on('render', callback);
  };
}(__webpack_provided_window_dot_jQuery);
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js"), __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js")))

/***/ }),

/***/ "./node_modules/@lovata/popup-helper/popup-helper.js":
/*!***********************************************************!*\
  !*** ./node_modules/@lovata/popup-helper/popup-helper.js ***!
  \***********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var focus_trap__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! focus-trap */ "./node_modules/focus-trap/index.js");
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

/***/ "./node_modules/@lovata/shopaholic-cart/shopaholic-cart-position.js":
/*!**************************************************************************!*\
  !*** ./node_modules/@lovata/shopaholic-cart/shopaholic-cart-position.js ***!
  \**************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return ShopaholicCartPosition; });
/**
 * @author  Andrey Kharanenka, <a.khoronenko@lovata.com>, LOVATA Group,
 * @author  Uladzimir Ambrazhey, <v.ambrazhey@lovata.com>, LOVATA Group
 */
class ShopaholicCartPosition {
  constructor(obButton) {
    this.sDefaultWrapperClass = '_shopaholic-product-wrapper';
    this.sWrapperSelector = `.${this.sDefaultWrapperClass}`;

    this.sPositionIDAttr = 'data-position-id';
    this.sOfferIDAttr = 'offer_id';
    this.sQuantityAttr = 'quantity';

    this.obButton = obButton;
    this.obProductCart = obButton.closest(`${this.sWrapperSelector}`);

    this.iPositionID = null;
    this.iOfferID = null;
    this.iQuantity = 1;
    this.obProperty = {};
    this.iRadix = 10;

    this.eventName = 'shopaholic.cart.position.extend';
    if (!this.obProductCart) {
      throw new Error('Product wrapper is empty. It mast contain product card node');
    }

    this.referenceType = 'radio';

    this.initOfferID();
    this.initQuantity();
    this.initCartPositionID();
  }

  /**
   * Get cart position node
   * @returns {*}
   */
  getNode() {
    return this.obProductCart;
  }

  /**
   * Get cart position data
   * @returns {{quantity: number, id: null, offer_id: null}}
   */
  getData() {
    let obData = {
      id: this.iPositionID,
      offer_id: this.iOfferID,
      quantity: this.iQuantity,
      property: this.obProperty
    };
    document.dispatchEvent(this.createCustomEvent(obData));

    return obData;
  }

  /**
   * Get position ID
   * @returns {int}
   */
  getPositionID() {
    return this.iPositionID;
  }

  /**
   * Get quantity
   * @returns {int}
   */
  getQuantity() {
    return this.iQuantity;
  }

  /**
   * Get quantity input node
   * @returns {node}
   */
  getQuantityInput() {
    return this.obProductCart.querySelector(`[name=${this.sQuantityAttr}]`);
  }

  /**
   * Get offer ID from input
   */
  initOfferID() {
    const obOfferIDNodeCollection = this.obProductCart.querySelectorAll(`[name=${this.sOfferIDAttr}]`);
    if (!obOfferIDNodeCollection || obOfferIDNodeCollection.length === 0) {
      return;
    }

    const isRadio = this.getOfferIDInputType(obOfferIDNodeCollection);
    if (isRadio) {
      const obOfferIDNode = [...obOfferIDNodeCollection].filter(node => node.checked);

      this.iOfferID = parseInt(obOfferIDNode[0].value, this.iRadix);
    } else {
      this.iOfferID = parseInt(obOfferIDNodeCollection[0].value, this.iRadix);
    }
  }

  /**
   * Detect type of input with offer id
   */
  getOfferIDInputType(obOfferIDNodeCollection) {
    const firstNode = obOfferIDNodeCollection[0];
    const { type: sType } = firstNode;

    return sType === this.referenceType;
  }

  /**
   * Get offer quantity from cart object
   */
  initQuantity() {
    const obQuantityInput = this.getQuantityInput();
    if (!obQuantityInput) {
      return;
    }

    this.iQuantity = parseInt(obQuantityInput.value, this.iRadix);
  }

  /**
   * Get offer quantity from cart object
   */
  initCartPositionID() {
    const sValue = this.obProductCart.getAttribute(`${this.sPositionIDAttr}`);
    if (!sValue) {
      return;
    }

    this.iPositionID = parseInt(sValue, this.iRadix);
  }

  /**
   * Create event
   * @param options
   * @returns {CustomEvent<any>}
   */
  createCustomEvent(options) {
    const event = new CustomEvent(this.eventName, {
      bubbles: true,
      cancelable: true,
      detail: options,
    });

    return event;
  }
}


/***/ }),

/***/ "./node_modules/@lovata/shopaholic-cart/shopaholic-cart-remove.js":
/*!************************************************************************!*\
  !*** ./node_modules/@lovata/shopaholic-cart/shopaholic-cart-remove.js ***!
  \************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* WEBPACK VAR INJECTION */(function($) {/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return ShopaholicCartRemove; });
/* harmony import */ var _lovata_shopaholic_cart_shopaholic_cart_position__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @lovata/shopaholic-cart/shopaholic-cart-position */ "./node_modules/@lovata/shopaholic-cart/shopaholic-cart-position.js");
/* harmony import */ var _lovata_shopaholic_cart_shopaholic_cart__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @lovata/shopaholic-cart/shopaholic-cart */ "./node_modules/@lovata/shopaholic-cart/shopaholic-cart.js");
/* harmony import */ var _lovata_shopaholic_cart_shopaholic_cart_shipping_type__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @lovata/shopaholic-cart/shopaholic-cart-shipping-type */ "./node_modules/@lovata/shopaholic-cart/shopaholic-cart-shipping-type.js");




/**
 * @author  Uladzimir Ambrazhey, <v.ambrazhey@lovata.com>, LOVATA Group
 * @author  Andrey Kharanenka, a.khoronenko@lovata.com, LOVATA Group
 */
class ShopaholicCartRemove {
  constructor() {
    this.sDefaultButtonClass = '_shopaholic-cart-remove';
    this.sRemoveComponentMethod = 'Cart::onRemove';
    this.obAjaxRequestCallback = null;

    _lovata_shopaholic_cart_shopaholic_cart__WEBPACK_IMPORTED_MODULE_1__["default"].instance();
  }

  /**
  * Init event handlers
  */
  init() {
    $(document).on('click', `.${this.sDefaultButtonClass}`, (obEvent) => {
      obEvent.preventDefault();

      const {currentTarget: obButton} = obEvent;
      if (obButton.hasAttribute('disabled')) {
        return;
      }

      this.sendAjaxRequest(obButton);
    });
  }

  /**
   * Remove cart position
   * @param {node} obButton
   */
  sendAjaxRequest(obButton) {
    if (!obButton) {
      throw new Error('Button node is empty.');
    }

    obButton.setAttribute('disabled', 'disabled');
    const obCartPosition = new _lovata_shopaholic_cart_shopaholic_cart_position__WEBPACK_IMPORTED_MODULE_0__["default"](obButton);
    const iPositionID = obCartPosition.getPositionID();
    const obShippingType = new _lovata_shopaholic_cart_shopaholic_cart_shipping_type__WEBPACK_IMPORTED_MODULE_2__["default"]();

    let obRequestData = {
      data: {
        cart: [iPositionID],
        type: 'position',
        'shipping_type_id': obShippingType.getShippingTypeID()
      },
      complete: ({responseJSON}) => {
        this.completeCallback(responseJSON, obButton);
      },
    };

    if (this.obAjaxRequestCallback !== null) {
      obRequestData = this.obAjaxRequestCallback(obRequestData, obButton);
    }

    $.request(this.sRemoveComponentMethod, obRequestData);
  }

  /**
   * Remove disabled attribute from button
   * Update cart data in ShopaholicCart object
   */
  completeCallback(obResponse, obButton) {
    const {data: obCartData} = obResponse;

    _lovata_shopaholic_cart_shopaholic_cart__WEBPACK_IMPORTED_MODULE_1__["default"].instance().updateCartData(obCartData);

    if (obButton) {
      obButton.removeAttribute('disabled');
    }
  }

  /**
   * Set ajax request callback
   *
   * @param {function} obCallback
   * @returns {ShopaholicCartRemove}
   */
  setAjaxRequestCallback(obCallback) {
    this.obAjaxRequestCallback = obCallback;

    return this;
  }
}

/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js")))

/***/ }),

/***/ "./node_modules/@lovata/shopaholic-cart/shopaholic-cart-restore.js":
/*!*************************************************************************!*\
  !*** ./node_modules/@lovata/shopaholic-cart/shopaholic-cart-restore.js ***!
  \*************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* WEBPACK VAR INJECTION */(function($) {/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return ShopaholicCartRestore; });
/* harmony import */ var _lovata_shopaholic_cart_shopaholic_cart_position__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @lovata/shopaholic-cart/shopaholic-cart-position */ "./node_modules/@lovata/shopaholic-cart/shopaholic-cart-position.js");
/* harmony import */ var _lovata_shopaholic_cart_shopaholic_cart__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @lovata/shopaholic-cart/shopaholic-cart */ "./node_modules/@lovata/shopaholic-cart/shopaholic-cart.js");
/* harmony import */ var _lovata_shopaholic_cart_shopaholic_cart_shipping_type__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @lovata/shopaholic-cart/shopaholic-cart-shipping-type */ "./node_modules/@lovata/shopaholic-cart/shopaholic-cart-shipping-type.js");




/**
 * @author  Uladzimir Ambrazhey, <v.ambrazhey@lovata.com>, LOVATA Group
 * @author  Andrey Kharanenka, a.khoronenko@lovata.com, LOVATA Group
 */
class ShopaholicCartRestore {
  constructor() {
    this.sDefaultButtonClass = '_shopaholic-cart-restore';
    this.sRestoreComponentMethod = 'Cart::onRestore';
    this.obAjaxRequestCallback = null;

    _lovata_shopaholic_cart_shopaholic_cart__WEBPACK_IMPORTED_MODULE_1__["default"].instance();
  }

  /**
  * Init event handlers
  */
  init() {
    $(document).on('click', `.${this.sDefaultButtonClass}`, (obEvent) => {
      obEvent.preventDefault();

      const {currentTarget: obButton} = obEvent;
      if (obButton.hasAttribute('disabled')) {
        return;
      }

      this.sendAjaxRequest(obButton);
    });
  }

  /**
   * Restore cart position
   * @param {node} obButton
   */
  sendAjaxRequest(obButton) {
    if (!obButton) {
      throw new Error('Button node is empty.');
    }

    obButton.setAttribute('disabled', 'disabled');
    const obCartPosition = new _lovata_shopaholic_cart_shopaholic_cart_position__WEBPACK_IMPORTED_MODULE_0__["default"](obButton);
    const iPositionID = obCartPosition.getPositionID();
    const obShippingType = new _lovata_shopaholic_cart_shopaholic_cart_shipping_type__WEBPACK_IMPORTED_MODULE_2__["default"]();

    let obRequestData = {
      data: {
        cart: [iPositionID],
        'shipping_type_id': obShippingType.getShippingTypeID()
      },
      complete: ({responseJSON}) => {
        this.completeCallback(responseJSON, obButton);
      },
    };

    if (this.obAjaxRequestCallback !== null) {
      obRequestData = this.obAjaxRequestCallback(obRequestData, obButton);
    }

    $.request(this.sRestoreComponentMethod, obRequestData);
  }

  /**
   * Restore disabled attribute from button
   * Update cart data in ShopaholicCart object
   */
  completeCallback(obResponse, obButton) {
    const {data: obCartData} = obResponse;

    _lovata_shopaholic_cart_shopaholic_cart__WEBPACK_IMPORTED_MODULE_1__["default"].instance().updateCartData(obCartData);

    if (obButton) {
      obButton.restoreAttribute('disabled');
    }
  }

  /**
   * Set ajax request callback
   *
   * @param {function} obCallback
   * @returns {ShopaholicCartRestore}
   */
  setAjaxRequestCallback(obCallback) {
    this.obAjaxRequestCallback = obCallback;

    return this;
  }
}

/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js")))

/***/ }),

/***/ "./node_modules/@lovata/shopaholic-cart/shopaholic-cart-shipping-type.js":
/*!*******************************************************************************!*\
  !*** ./node_modules/@lovata/shopaholic-cart/shopaholic-cart-shipping-type.js ***!
  \*******************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* WEBPACK VAR INJECTION */(function($) {/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return ShopaholicCartShippingType; });
/* harmony import */ var _lovata_shopaholic_cart_shopaholic_cart__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @lovata/shopaholic-cart/shopaholic-cart */ "./node_modules/@lovata/shopaholic-cart/shopaholic-cart.js");


/**
 * @author  Uladzimir Ambrazhey, <v.ambrazhey@lovata.com>, LOVATA Group
 * @author  Andrey Kharanenka, a.khoronenko@lovata.com, LOVATA Group
 */
class ShopaholicCartShippingType {
  constructor() {
    this.sDefaultInputName = 'shipping_type_id';

    this.obAjaxRequestCallback = null;
    this.iRadix = 10;

    this.sComponentMethod = 'Cart::onSetShippingType';

    _lovata_shopaholic_cart_shopaholic_cart__WEBPACK_IMPORTED_MODULE_0__["default"].instance();
  }

  /**
  * Init event handlers
  */
  init() {
    $(document).on('change', `[name="${this.sDefaultInputName}"]`, (obEvent) => {

      const {currentTarget: obInput} = obEvent;
      this.sendAjaxRequest(obInput);
    });
  }

  /**
   * Send ajax request and update prices with new shipping-type-id
   */
  sendAjaxRequest(obInput) {

    const iShippingTypeID = this.getShippingTypeID();

    let obRequestData = {
      data: {
        'shipping_type_id': iShippingTypeID,
      },
      complete: ({responseJSON}) => {
        this.completeCallback(responseJSON);
      },
    };

    if (this.obAjaxRequestCallback !== null) {
      obRequestData = this.obAjaxRequestCallback(obRequestData, obInput);
    }

    $.request(this.sComponentMethod, obRequestData);
  }

  /**
   * Get active shipping type
   * @returns {null|number}
   */
  getShippingTypeID() {
    let iShippingTypeID = null;
    const obInputList = document.querySelectorAll(`[name=${this.sDefaultInputName}]`);
    if (!obInputList || obInputList.length === 0) {
      return iShippingTypeID;
    }

    const isRadio = this.getInputType(obInputList);
    if (isRadio) {
      const obInputNode = [...obInputList].filter(node => node.checked);

      iShippingTypeID = parseInt(obInputNode[0].value, this.iRadix);
    } else {
      iShippingTypeID = parseInt(obInputList[0].value, this.iRadix);
    }

    return  iShippingTypeID;
  }

  /**
   * Detect type of input with offer id
   */
  getInputType(obInputList) {
    const firstNode = obInputList[0];
    const {type: sType} = firstNode;

    return sType === 'radio';
  }

  /**
   * Update cart data in ShopaholicCart object
   */
  completeCallback(obResponse) {
    const {data: obCartData} = obResponse;

    _lovata_shopaholic_cart_shopaholic_cart__WEBPACK_IMPORTED_MODULE_0__["default"].instance().updateCartData(obCartData);
  }

  /**
   * Set ajax request callback
   *
   * @param {function} obCallback
   * @returns {ShopaholicCartShippingType}
   */
  setAjaxRequestCallback(obCallback) {
    this.obAjaxRequestCallback = obCallback;

    return this;
  }
}

/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js")))

/***/ }),

/***/ "./node_modules/@lovata/shopaholic-cart/shopaholic-cart-update.js":
/*!************************************************************************!*\
  !*** ./node_modules/@lovata/shopaholic-cart/shopaholic-cart-update.js ***!
  \************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* WEBPACK VAR INJECTION */(function($) {/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return ShopaholicCartUpdate; });
/* harmony import */ var _lovata_shopaholic_cart_shopaholic_cart_position__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @lovata/shopaholic-cart/shopaholic-cart-position */ "./node_modules/@lovata/shopaholic-cart/shopaholic-cart-position.js");
/* harmony import */ var _lovata_shopaholic_cart_shopaholic_cart__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @lovata/shopaholic-cart/shopaholic-cart */ "./node_modules/@lovata/shopaholic-cart/shopaholic-cart.js");
/* harmony import */ var _lovata_shopaholic_cart_shopaholic_cart_shipping_type__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @lovata/shopaholic-cart/shopaholic-cart-shipping-type */ "./node_modules/@lovata/shopaholic-cart/shopaholic-cart-shipping-type.js");




/**
 * @author  Uladzimir Ambrazhey, <v.ambrazhey@lovata.com>, LOVATA Group
 * @author  Andrey Kharanenka, a.khoronenko@lovata.com, LOVATA Group
 */
class ShopaholicCartUpdate {
  constructor() {
    this.sDefaultInputClass = '_shopaholic-cart-quantity';
    this.sIncreaseInputClass = '_shopaholic-cart-increase-quantity';
    this.sDecreaseInputClass = '_shopaholic-cart-decrease-quantity';
    this.sUpdateComponentMethod = 'Cart::onUpdate';
    this.obAjaxRequestCallback = null;

    this.iDelayBeforeRequest = 400;
    this.obTimer = null;

    _lovata_shopaholic_cart_shopaholic_cart__WEBPACK_IMPORTED_MODULE_1__["default"].instance();
  }

  /**
  * Init event handlers
  */
  init() {
    this.initUpdateEvent();
    this.initIncreaseEvent();
    this.initDecreaseEvent();
  }

  /**
   * Init update event
   */
  initUpdateEvent() {
    $(document).on('input', `.${this.sDefaultInputClass}`, (obEvent) => {
      if (this.obTimer !== null) {
        clearTimeout(this.obTimer);
      }
      
      this.obTimer = setTimeout(() => {
        const {currentTarget: obInput} = obEvent;
        const iMaxQuantity = this.getMaxQuantity(obInput);
        let iQuantity = this.getQuantity(obInput);
        if (iQuantity < 1) {
          iQuantity = 1;
        }

        if (iQuantity > iMaxQuantity) {
          obInput.value = iMaxQuantity;
          return;
        }

        this.sendAjaxRequest(obInput);
      }, this.iDelayBeforeRequest);
    });
  }

  /**
   * Init increase event
   */
  initIncreaseEvent() {
    $(document).on('click', `.${this.sIncreaseInputClass}`, (obEvent) => {
      if (this.obTimer !== null) {
        clearTimeout(this.obTimer);
      }

      const {currentTarget: obButton} = obEvent;
      const obCartPosition = new _lovata_shopaholic_cart_shopaholic_cart_position__WEBPACK_IMPORTED_MODULE_0__["default"](obButton);
      const obInput = obCartPosition.getQuantityInput();
      const iMaxQuantity = this.getMaxQuantity(obInput);
      let iQuantity = this.getQuantity(obInput) + 1;
      if (iQuantity > iMaxQuantity) {
        return;
      }

      obInput.value = iQuantity;
      if (iQuantity == iMaxQuantity) {
        obButton.setAttribute('disabled', 'disabled');
      } else {
        obButton.removeAttribute('disabled');
      }
      
      if (iQuantity > 1) {
        const obCartNode = obCartPosition.getNode();
        const obDecreaseButton = obCartNode.querySelector(`.${this.sDecreaseInputClass}`);
        if (obDecreaseButton) {
          obDecreaseButton.removeAttribute('disabled');
        }
      }

      this.obTimer = setTimeout(() => {
        this.sendAjaxRequest(obInput);
      }, this.iDelayBeforeRequest);
    });
  }

  /**
   * Init decrease event
   */
  initDecreaseEvent() {
    $(document).on('click', `.${this.sDecreaseInputClass}`, (obEvent) => {
      if (this.obTimer !== null) {
        clearTimeout(this.obTimer);
      }

      const {currentTarget: obButton} = obEvent;
      const obCartPosition = new _lovata_shopaholic_cart_shopaholic_cart_position__WEBPACK_IMPORTED_MODULE_0__["default"](obButton);
      const obInput = obCartPosition.getQuantityInput();
      const iMaxQuantity = this.getMaxQuantity(obInput);
      let iQuantity = this.getQuantity(obInput) - 1;
      if (iQuantity < 1) {
        return;
      }

      obInput.value = iQuantity;
      if (iQuantity == 1) {
        obButton.setAttribute('disabled', 'disabled');
      } else {
        obButton.removeAttribute('disabled');
      }

      if (iQuantity < iMaxQuantity) {
        const obCartNode = obCartPosition.getNode();
        const obIncreaseButton = obCartNode.querySelector(`.${this.sIncreaseInputClass}`);
        if (obIncreaseButton) {
          obIncreaseButton.removeAttribute('disabled');
        }
      }

      this.obTimer = setTimeout(() => {
        this.sendAjaxRequest(obInput);
      }, this.iDelayBeforeRequest);
    });
  }

  /**
   * Update position data
   * @param {node} obInput
   */
  sendAjaxRequest(obInput) {
    if (!obInput) {
      throw new Error('Input node is empty.');
    }

    const obCartPosition = new _lovata_shopaholic_cart_shopaholic_cart_position__WEBPACK_IMPORTED_MODULE_0__["default"](obInput);
    let obPositionData = obCartPosition.getData();
    const obShippingType = new _lovata_shopaholic_cart_shopaholic_cart_shipping_type__WEBPACK_IMPORTED_MODULE_2__["default"]();

    let obRequestData = {
      data: {
        cart: [obPositionData],
        'shipping_type_id': obShippingType.getShippingTypeID()
      },
      complete: ({responseJSON}) => {
        this.completeCallback(responseJSON);
      },
    };

    if (this.obAjaxRequestCallback !== null) {
      obRequestData = this.obAjaxRequestCallback(obRequestData, obInput);
    }

    $.request(this.sUpdateComponentMethod, obRequestData);
  }

  getQuantity(obInput) {
    return parseInt(obInput.value, this.iRadix);
  }

  /**
   * Get offer quantity from cart object
   */
  getMaxQuantity(obInput) {
    return parseInt(obInput.getAttribute('max'), this.iRadix);
  }

  /**
   * Remove disabled attribute from button
   * Update cart data in ShopaholicCart object
   */
  completeCallback(obResponse) {
    const {data: obCartData} = obResponse;

    _lovata_shopaholic_cart_shopaholic_cart__WEBPACK_IMPORTED_MODULE_1__["default"].instance().updateCartData(obCartData);
  }

  /**
   * Set ajax request callback
   *
   * @param {function} obCallback
   * @returns {ShopaholicCartUpdate}
   */
  setAjaxRequestCallback(obCallback) {
    this.obAjaxRequestCallback = obCallback;

    return this;
  }
}

/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js")))

/***/ }),

/***/ "./node_modules/@lovata/shopaholic-cart/shopaholic-cart.js":
/*!*****************************************************************!*\
  !*** ./node_modules/@lovata/shopaholic-cart/shopaholic-cart.js ***!
  \*****************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* WEBPACK VAR INJECTION */(function($) {/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return ShopaholicCart; });
/* harmony import */ var _lovata_shopaholic_cart_shopaholic_cart_position__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @lovata/shopaholic-cart/shopaholic-cart-position */ "./node_modules/@lovata/shopaholic-cart/shopaholic-cart-position.js");
/**
 * @author  Andrey Kharanenka, <a.khoronenko@lovata.com>, LOVATA Group,
 * @author  Uladzimir Ambrazhey, <v.ambrazhey@lovata.com>, LOVATA Group
 */


class ShopaholicCart {
  constructor() {
    /* Selectors */
    this.sOfferItemType = 'Lovata\\Shopaholic\\Models\\Offer';

    /* Params */
    this.sGetDataHandler = 'Cart::onGetData';
    this.iRadix = 10;

    this.sNodeClass = '_shopaholic-cart';
    this.sOldPriceClass = '_shopaholic-old-price';
    this.sHideOldPriceClass = '_shopaholic-hide-old-price';
    this.sGroupAttribute = 'data-group';
    this.sFieldAttribute = 'data-field';

    this.obCartData = null;
  }

  /**
   * Init singleton object of ShopaholicCart
   * @param {object} obRequestData
   * @returns {ShopaholicCart}
   */
  static instance(obRequestData = null) {
    if (window.ShopaholicCart === undefined) {
      window.ShopaholicCart = new ShopaholicCart();
      window.ShopaholicCart.init(obRequestData);
    }

    return window.ShopaholicCart;
  }

  /**
   * Init cart data object if it is empty
   */
  init(obRequestData) {
    if (this.obCartData !== null) {
      return;
    }

    let obData = {};
    if (!!obRequestData) {
      obData = obRequestData;
    }

    obData.complete = ({responseJSON}) => {
      this.obCartData = responseJSON;
    };

    $.request(this.sGetDataHandler, obData);
  }

  /**
   * Update cart data object
   * @param {object} obCartData
   */
  updateCartData(obCartData) {
    this.obCartData = obCartData;

    this.renderPriceFields();
  }

  /**
   * Get offer quantity from cart object
   * @param {int} iOfferID
   * @param {object} obOfferProperty
   */
  getOfferQuantity(iOfferID, obOfferProperty) {
    let iQuantity = 0;
    const obCartPosition = this.findCartPositionByOfferID(iOfferID, this.sOfferItemType, obOfferProperty);

    if (!!obCartPosition) {
      iQuantity = obCartPosition.quantity;
    }

    return parseInt(iQuantity, this.iRadix);
  }

  /**
   * Get field value from cart position object
   * @param {int} iPositionID
   * @param {string} sField
   */
  getOfferPositionField(iPositionID, sField) {
    const obCartPosition = this.findCartPositionByID(iPositionID);
    if (!!obCartPosition && !!obCartPosition[sField]) {
      return obCartPosition[sField];
    }

    return null;
  }

  /**
   * Get field value from object
   * @param {string} sGroup
   * @param {string} sField
   */
  getField(sGroup, sField) {
    if (!!this.obCartData && !!this.obCartData[sGroup] && !!this.obCartData[sGroup][sField]) {
      return this.obCartData[sGroup][sField];
    }

    return null;
  }

  /**
   * Find cart position by item ID and type
   * @param {int} iItemID
   * @param {string} sItemType
   * @param {object} obOfferProperty
   */
  findCartPositionByOfferID(iItemID, sItemType, obOfferProperty) {
    iItemID = parseInt(iItemID, 10);
    let obPosition = null;

    if (!this.obCartData || !this.obCartData.position) {
      return;
    }

    const obPositionList = this.obCartData.position;
    const arCartPositionIDList = Object.keys(obPositionList);
    for (let iKey of arCartPositionIDList) {
      let obPositionItem = obPositionList[iKey];
      if (obPositionItem.item_id != iItemID || obPositionItem.item_type != sItemType
        || JSON.stringify(obPositionItem.property) != JSON.stringify(obOfferProperty)) {
        continue;
      }

      obPosition = obPositionItem;
      break;
    }

    return obPosition;
  }

  /**
   * Find cart position by position ID
   * @param {int} iPositionID
   */
  findCartPositionByID(iPositionID) {
    iPositionID = parseInt(iPositionID, 10);
    let obPosition = null;

    if (!this.obCartData || !this.obCartData.position) {
      return;
    }

    const obPositionList = this.obCartData.position;
    if (!!obPositionList[iPositionID]) {
      return obPositionList[iPositionID];
    }

    return obPosition;
  }

  /**
   * Find price fields and update price values
   */
  renderPriceFields() {
    const obNodeList = document.querySelectorAll(`.${this.sNodeClass}`);
    if (!obNodeList || obNodeList.length === 0) {
      return;
    }

    obNodeList.forEach((obPriceNode) => {
      const sGroupOriginal = obPriceNode.getAttribute(this.sGroupAttribute);
      const sGroup = !!sGroupOriginal ? sGroupOriginal.replace(/-/g, '_').toLowerCase() : sGroupOriginal;
      const sFieldOriginal = obPriceNode.getAttribute(this.sFieldAttribute);
      const sField = !!sFieldOriginal? sFieldOriginal.replace(/-/g, '_').toLowerCase() : sFieldOriginal;
      let sNewValue = '';

      if (sGroup === 'position') {
        const obCartPosition = new _lovata_shopaholic_cart_shopaholic_cart_position__WEBPACK_IMPORTED_MODULE_0__["default"](obPriceNode);
        const iPositionID = obCartPosition.getPositionID();
        sNewValue = this.getOfferPositionField(iPositionID, sField);

        obPriceNode.textContent = sNewValue;
        this.processPositionOldPriceField(obCartPosition, sField, sFieldOriginal, sGroupOriginal);
      } else {
        sNewValue = this.getField(sGroup, sField);

        obPriceNode.textContent = sNewValue;
        this.processOldPriceField(sField, sFieldOriginal, sGroup, sGroupOriginal);
      }

    });
  }

  /**
   * Process old price field of position
   * @param {ShopaholicCartPosition} obCartPosition
   * @param {string} sField
   * @param {string} sFieldOriginal
   * @param {string} sGroupOriginal
   */
  processPositionOldPriceField(obCartPosition, sField, sFieldOriginal, sGroupOriginal) {
    if (sField.indexOf('old_price') < 0) {
      return;
    }

    const iPositionID = obCartPosition.getPositionID();
    const obCartNode = obCartPosition.getNode();
    const obOldPriceNodeList = obCartNode.querySelectorAll(`.${this.sOldPriceClass}[data-group="${sGroupOriginal}"][data-field="${sFieldOriginal}"]`);
    if (!obOldPriceNodeList || obOldPriceNodeList.length === 0) {
      return;
    }

    const fDiscountPrice = this.getOfferPositionField(iPositionID, sField.replace(/old_price/g, 'discount_price') + '_value');

    obOldPriceNodeList.forEach((obOldPriceNode) => {
      if (fDiscountPrice > 0) {
        obOldPriceNode.classList.remove(this.sHideOldPriceClass);
      } else {
        obOldPriceNode.classList.add(this.sHideOldPriceClass);
      }
    });
  }

  /**
   * Process old price field
   * @param {string} sField
   * @param {string} sFieldOriginal
   * @param {string} sGroup
   * @param {string} sGroupOriginal
   */
  processOldPriceField(sField, sFieldOriginal, sGroup, sGroupOriginal) {
    if (sField.indexOf('old_price') < 0) {
      return;
    }

    const obOldPriceNodeList = document.querySelectorAll(`.${this.sOldPriceClass}[data-group="${sGroupOriginal}"][data-field="${sFieldOriginal}"]`);
    if (!obOldPriceNodeList || obOldPriceNodeList.length === 0) {
      return;
    }

    const fDiscountPrice = this.getField(sGroup, sField.replace(/old_price/g, 'discount_price') + '_value');

    obOldPriceNodeList.forEach((obOldPriceNode) => {
      if (fDiscountPrice > 0) {
        obOldPriceNode.classList.remove(this.sHideOldPriceClass);
      } else {
        obOldPriceNode.classList.add(this.sHideOldPriceClass);
      }
    });
  }
}

/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js")))

/***/ }),

/***/ "./node_modules/@lovata/shopaholic-search/shopaholic-search.js":
/*!*********************************************************************!*\
  !*** ./node_modules/@lovata/shopaholic-search/shopaholic-search.js ***!
  \*********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* WEBPACK VAR INJECTION */(function($) {/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return ShopaholicSearch; });
/**
 * @author  Andrey Kharanenka, a.khoronenko@lovata.com, LOVATA Group
 */
class ShopaholicSearch {
  constructor() {
    this.sDefaultSearchInputClass = '_shopaholic-search-input';
    this.sSearchInput = `.${this.sDefaultSearchInputClass}`;

    this.sComponentMethod = 'ProductList::onAjaxRequest';
    this.obAjaxRequestCallback = null;
    this.sSearchState = '';
    this.sSearchResultState = '';
    this.iSearchDelay = 400;
    this.iSearchLimit = 3;
    this.obTimer = null;
  }

  /**
   * Init event handlers
   */
  init() {
    $(document).on('input', this.sSearchInput, (obEvent) => {
      let sSearchString = $(obEvent.currentTarget).val();
      this.processSearchString(sSearchString);
    });
  }

  /**
   * Process search string and send ajax request
   * @param {string} sSearchString
   */
  processSearchString(sSearchString) {
    sSearchString = sSearchString.trim();
    if (sSearchString.length < this.iSearchLimit && this.sSearchState.length < this.iSearchLimit) {
      return;
    }

    if (sSearchString.length < this.iSearchLimit) {
      sSearchString = '';
    }

    if (!!this.obTimer) {
      clearTimeout(this.obTimer);
    }

    this.sSearchState = sSearchString;
    this.obTimer = setTimeout(() => {
      if (sSearchString !== this.sSearchState) {
        return;
      }

      this.sendAjaxRequest(sSearchString);

    }, this.iSearchDelay);
  }

  /**
   * Send ajax request
   * @param {string} sSearchValue
   */
  sendAjaxRequest(sSearchValue) {
    this.sSearchResultState = sSearchValue;
    let obThis = this;

    let obRequestData = {
      'data': {'search': sSearchValue},
      success: function (obResponse) {
        if (sSearchValue !== obThis.sSearchResultState) {
          return;
        }

        this.success(obResponse);
      }
    };

    if (this.obAjaxRequestCallback !== null) {
      obRequestData = this.obAjaxRequestCallback(obRequestData);
    }

    $.request(this.sComponentMethod, obRequestData);
  }

  /**
   * Set ajax request callback
   *
   * @param {function} obCallback
   * @returns {ShopaholicSearch}
   */
  setAjaxRequestCallback(obCallback) {
    this.obAjaxRequestCallback = obCallback;

    return this;
  }

  /**
   * Redeclare default search limit value
   * Default value is 3 symbols
   * Ajax request will be sent only when user enters the number of characters greater than or equal to specified value.
   *
   * @param {int} iSearchLimit
   * @returns {ShopaholicSearch}
   */
  setSearchLimit(iSearchLimit) {
    if (iSearchLimit > 0) {
      this.iSearchLimit = iSearchLimit;
    }

    return this;
  }

  /**
   * Redeclare default search delay value
   * Default value is 400 ms
   * Ajax request will be sent only when user does not press keys during the delay time.
   *
   * @param {int} iSearchDelay
   * @returns {ShopaholicSearch}
   */
  setSearchDelay(iSearchDelay) {
    if (iSearchDelay > 0) {
      this.iSearchDelay = iSearchDelay;
    }

    return this;
  }
}
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js")))

/***/ }),

/***/ "./node_modules/@lovata/shopaholic-wish-list/shopaholic-add-wish-list.js":
/*!*******************************************************************************!*\
  !*** ./node_modules/@lovata/shopaholic-wish-list/shopaholic-add-wish-list.js ***!
  \*******************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* WEBPACK VAR INJECTION */(function($) {/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return ShopaholicAddWishList; });
/**
 * @author  Andrey Kharanenka, a.khoronenko@lovata.com, LOVATA Group
 */
class ShopaholicAddWishList {
  constructor() {
    this.sDefaultButtonClass = '_shopaholic-add-wish-list-button';
    this.sButtonSelector = `.${this.sDefaultButtonClass}`;

    this.sDefaultWrapperClass = '_shopaholic-product-wrapper';
    this.sWrapperSelector = `.${this.sDefaultWrapperClass}`;
    this.sAttributeName = 'data-product-id';

    this.sComponentMethod = 'ProductList::onAddToWishList';
    this.obAjaxRequestCallback = null;
  }

  /**
   * Init event handlers
   */
  init() {
    $(document).on('click', this.sButtonSelector, (obEvent) => {
      const obButton = $(obEvent.currentTarget),
        iProductID = this.getProductID(obButton);

      this.sendAjaxRequest(iProductID, obButton);
    });
  }

  /**
   * Add product to wish list
   * @param {int} iProductID
   * @param obButton
   */
  sendAjaxRequest(iProductID, obButton) {
    let obRequestData = {
      'data': {'product_id': iProductID}
    };

    if (this.obAjaxRequestCallback !== null) {
      obRequestData = this.obAjaxRequestCallback(obRequestData, obButton);
    }

    $.request(this.sComponentMethod, obRequestData);
  }

  /**
   * Get product ID from attribute
   * @param obButton
   * @returns {int}
   */
  getProductID(obButton) {
    const obProduct = obButton.parents(this.sWrapperSelector),
      iProductID = obProduct.attr(this.sAttributeName);

    return iProductID;
  }

  /**
   * Set ajax request callback
   *
   * @param {function} obCallback
   * @returns {ShopaholicAddWishList}
   */
  setAjaxRequestCallback(obCallback) {
    this.obAjaxRequestCallback = obCallback;

    return this;
  }

  /**
   * Redeclare default selector of "Add to wish list" button
   * Default value is ._shopaholic-add-wish-list-button
   *
   * @param {string} sSelector
   * @returns {ShopaholicAddWishList}
   */
  setButtonSelector(sSelector) {
    this.sButtonSelector = sSelector;

    return this;
  }
}
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js")))

/***/ }),

/***/ "./node_modules/@lovata/shopaholic-wish-list/shopaholic-remove-wish-list.js":
/*!**********************************************************************************!*\
  !*** ./node_modules/@lovata/shopaholic-wish-list/shopaholic-remove-wish-list.js ***!
  \**********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* WEBPACK VAR INJECTION */(function($) {/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return ShopaholicRemoveWishList; });
/**
 * @author  Andrey Kharanenka, a.khoronenko@lovata.com, LOVATA Group
 */
class ShopaholicRemoveWishList {
  constructor() {
    this.sDefaultButtonClass = '_shopaholic-remove-wish-list-button';
    this.sButtonSelector = `.${this.sDefaultButtonClass}`;

    this.sDefaultWrapperClass = '_shopaholic-product-wrapper';
    this.sWrapperSelector = `.${this.sDefaultWrapperClass}`;
    this.sAttributeName = 'data-product-id';

    this.sComponentMethod = 'ProductList::onRemoveFromWishList';
    this.obAjaxRequestCallback = null;
  }

  /**
   * Init event handlers
   */
  init() {
    $(document).on('click', this.sButtonSelector, (obEvent) => {
      const obButton = $(obEvent.currentTarget),
        iProductID = this.getProductID(obButton);

      this.sendAjaxRequest(iProductID, obButton);
    });
  }

  /**
   * Remove product from wish list
   * @param {int} iProductID
   * @param obButton
   */
  sendAjaxRequest(iProductID, obButton) {
    let obRequestData = {
      'data': {'product_id': iProductID}
    };

    if (this.obAjaxRequestCallback !== null) {
      obRequestData = this.obAjaxRequestCallback(obRequestData, obButton);
    }

    $.request(this.sComponentMethod, obRequestData);
  }

  /**
   * Get product ID from attribute
   * @param obButton
   * @returns {int}
   */
  getProductID(obButton) {
    const obProduct = obButton.parents(this.sWrapperSelector),
      iProductID = obProduct.attr(this.sAttributeName);

    return iProductID;
  }

  /**
   * Set ajax request callback
   *
   * @param {function} obCallback
   * @returns {ShopaholicRemoveWishList}
   */
  setAjaxRequestCallback(obCallback) {
    this.obAjaxRequestCallback = obCallback;

    return this;
  }

  /**
   * Redeclare default selector of "Remove from wish list" button
   * Default value is ._shopaholic-remove-wish-list-button
   *
   * @param {string} sSelector
   * @returns {ShopaholicRemoveWishList}
   */
  setButtonSelector(sSelector) {
    this.sButtonSelector = sSelector;

    return this;
  }
}
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js")))

/***/ }),

/***/ "./node_modules/focus-trap/index.js":
/*!******************************************!*\
  !*** ./node_modules/focus-trap/index.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var tabbable = __webpack_require__(/*! tabbable */ "./node_modules/tabbable/index.js");
var xtend = __webpack_require__(/*! xtend */ "./node_modules/xtend/immutable.js");

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

/***/ "./node_modules/focus-visible/dist/focus-visible.js":
/*!**********************************************************!*\
  !*** ./node_modules/focus-visible/dist/focus-visible.js ***!
  \**********************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

(function (global, factory) {
   true ? factory() :
  undefined;
}(this, (function () { 'use strict';

  /**
   * https://github.com/WICG/focus-visible
   */
  function init() {
    var hadKeyboardEvent = true;
    var hadFocusVisibleRecently = false;
    var hadFocusVisibleRecentlyTimeout = null;

    var inputTypesWhitelist = {
      text: true,
      search: true,
      url: true,
      tel: true,
      email: true,
      password: true,
      number: true,
      date: true,
      month: true,
      week: true,
      time: true,
      datetime: true,
      'datetime-local': true
    };

    /**
     * Helper function for legacy browsers and iframes which sometimes focus
     * elements like document, body, and non-interactive SVG.
     * @param {Element} el
     */
    function isValidFocusTarget(el) {
      if (
        el &&
        el !== document &&
        el.nodeName !== 'HTML' &&
        el.nodeName !== 'BODY' &&
        'classList' in el &&
        'contains' in el.classList
      ) {
        return true;
      }
      return false;
    }

    /**
     * Computes whether the given element should automatically trigger the
     * `focus-visible` class being added, i.e. whether it should always match
     * `:focus-visible` when focused.
     * @param {Element} el
     * @return {boolean}
     */
    function focusTriggersKeyboardModality(el) {
      var type = el.type;
      var tagName = el.tagName;

      if (tagName == 'INPUT' && inputTypesWhitelist[type] && !el.readOnly) {
        return true;
      }

      if (tagName == 'TEXTAREA' && !el.readOnly) {
        return true;
      }

      if (el.isContentEditable) {
        return true;
      }

      return false;
    }

    /**
     * Add the `focus-visible` class to the given element if it was not added by
     * the author.
     * @param {Element} el
     */
    function addFocusVisibleClass(el) {
      if (el.classList.contains('focus-visible')) {
        return;
      }
      el.classList.add('focus-visible');
      el.setAttribute('data-focus-visible-added', '');
    }

    /**
     * Remove the `focus-visible` class from the given element if it was not
     * originally added by the author.
     * @param {Element} el
     */
    function removeFocusVisibleClass(el) {
      if (!el.hasAttribute('data-focus-visible-added')) {
        return;
      }
      el.classList.remove('focus-visible');
      el.removeAttribute('data-focus-visible-added');
    }

    /**
     * Treat `keydown` as a signal that the user is in keyboard modality.
     * Apply `focus-visible` to any current active element and keep track
     * of our keyboard modality state with `hadKeyboardEvent`.
     * @param {Event} e
     */
    function onKeyDown(e) {
      if (isValidFocusTarget(document.activeElement)) {
        addFocusVisibleClass(document.activeElement);
      }

      hadKeyboardEvent = true;
    }

    /**
     * If at any point a user clicks with a pointing device, ensure that we change
     * the modality away from keyboard.
     * This avoids the situation where a user presses a key on an already focused
     * element, and then clicks on a different element, focusing it with a
     * pointing device, while we still think we're in keyboard modality.
     * @param {Event} e
     */
    function onPointerDown(e) {
      hadKeyboardEvent = false;
    }

    /**
     * On `focus`, add the `focus-visible` class to the target if:
     * - the target received focus as a result of keyboard navigation, or
     * - the event target is an element that will likely require interaction
     *   via the keyboard (e.g. a text box)
     * @param {Event} e
     */
    function onFocus(e) {
      // Prevent IE from focusing the document or HTML element.
      if (!isValidFocusTarget(e.target)) {
        return;
      }

      if (hadKeyboardEvent || focusTriggersKeyboardModality(e.target)) {
        addFocusVisibleClass(e.target);
      }
    }

    /**
     * On `blur`, remove the `focus-visible` class from the target.
     * @param {Event} e
     */
    function onBlur(e) {
      if (!isValidFocusTarget(e.target)) {
        return;
      }

      if (
        e.target.classList.contains('focus-visible') ||
        e.target.hasAttribute('data-focus-visible-added')
      ) {
        // To detect a tab/window switch, we look for a blur event followed
        // rapidly by a visibility change.
        // If we don't see a visibility change within 100ms, it's probably a
        // regular focus change.
        hadFocusVisibleRecently = true;
        window.clearTimeout(hadFocusVisibleRecentlyTimeout);
        hadFocusVisibleRecentlyTimeout = window.setTimeout(function() {
          hadFocusVisibleRecently = false;
          window.clearTimeout(hadFocusVisibleRecentlyTimeout);
        }, 100);
        removeFocusVisibleClass(e.target);
      }
    }

    /**
     * If the user changes tabs, keep track of whether or not the previously
     * focused element had .focus-visible.
     * @param {Event} e
     */
    function onVisibilityChange(e) {
      if (document.visibilityState == 'hidden') {
        // If the tab becomes active again, the browser will handle calling focus
        // on the element (Safari actually calls it twice).
        // If this tab change caused a blur on an element with focus-visible,
        // re-apply the class when the user switches back to the tab.
        if (hadFocusVisibleRecently) {
          hadKeyboardEvent = true;
        }
        addInitialPointerMoveListeners();
      }
    }

    /**
     * Add a group of listeners to detect usage of any pointing devices.
     * These listeners will be added when the polyfill first loads, and anytime
     * the window is blurred, so that they are active when the window regains
     * focus.
     */
    function addInitialPointerMoveListeners() {
      document.addEventListener('mousemove', onInitialPointerMove);
      document.addEventListener('mousedown', onInitialPointerMove);
      document.addEventListener('mouseup', onInitialPointerMove);
      document.addEventListener('pointermove', onInitialPointerMove);
      document.addEventListener('pointerdown', onInitialPointerMove);
      document.addEventListener('pointerup', onInitialPointerMove);
      document.addEventListener('touchmove', onInitialPointerMove);
      document.addEventListener('touchstart', onInitialPointerMove);
      document.addEventListener('touchend', onInitialPointerMove);
    }

    function removeInitialPointerMoveListeners() {
      document.removeEventListener('mousemove', onInitialPointerMove);
      document.removeEventListener('mousedown', onInitialPointerMove);
      document.removeEventListener('mouseup', onInitialPointerMove);
      document.removeEventListener('pointermove', onInitialPointerMove);
      document.removeEventListener('pointerdown', onInitialPointerMove);
      document.removeEventListener('pointerup', onInitialPointerMove);
      document.removeEventListener('touchmove', onInitialPointerMove);
      document.removeEventListener('touchstart', onInitialPointerMove);
      document.removeEventListener('touchend', onInitialPointerMove);
    }

    /**
     * When the polfyill first loads, assume the user is in keyboard modality.
     * If any event is received from a pointing device (e.g. mouse, pointer,
     * touch), turn off keyboard modality.
     * This accounts for situations where focus enters the page from the URL bar.
     * @param {Event} e
     */
    function onInitialPointerMove(e) {
      // Work around a Safari quirk that fires a mousemove on <html> whenever the
      // window blurs, even if you're tabbing out of the page. ¯\_(ツ)_/¯
      if (e.target.nodeName.toLowerCase() === 'html') {
        return;
      }

      hadKeyboardEvent = false;
      removeInitialPointerMoveListeners();
    }

    document.addEventListener('keydown', onKeyDown, true);
    document.addEventListener('mousedown', onPointerDown, true);
    document.addEventListener('pointerdown', onPointerDown, true);
    document.addEventListener('touchstart', onPointerDown, true);
    document.addEventListener('focus', onFocus, true);
    document.addEventListener('blur', onBlur, true);
    document.addEventListener('visibilitychange', onVisibilityChange, true);
    addInitialPointerMoveListeners();

    document.body.classList.add('js-focus-visible');
  }

  /**
   * Subscription when the DOM is ready
   * @param {Function} callback
   */
  function onDOMReady(callback) {
    var loaded;

    /**
     * Callback wrapper for check loaded state
     */
    function load() {
      if (!loaded) {
        loaded = true;

        callback();
      }
    }

    if (['interactive', 'complete'].indexOf(document.readyState) >= 0) {
      callback();
    } else {
      loaded = false;
      document.addEventListener('DOMContentLoaded', load, false);
      window.addEventListener('load', load, false);
    }
  }

  if (typeof document !== 'undefined') {
    onDOMReady(init);
  }

})));


/***/ }),

/***/ "./node_modules/formbouncerjs/dist/bouncer.polyfills.min.js":
/*!******************************************************************!*\
  !*** ./node_modules/formbouncerjs/dist/bouncer.polyfills.min.js ***!
  \******************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/* WEBPACK VAR INJECTION */(function(global) {var __WEBPACK_AMD_DEFINE_ARRAY__, __WEBPACK_AMD_DEFINE_RESULT__;/*! formbouncerjs v1.4.5 | (c) 2019 Chris Ferdinandi | MIT License | http://github.com/cferdinandi/bouncer */
"document"in self&&("classList"in document.createElement("_")&&(!document.createElementNS||"classList"in document.createElementNS("http://www.w3.org/2000/svg","g"))||(function(e){"use strict";if("Element"in e){var t="classList",r="prototype",n=e.Element[r],a=Object,i=String[r].trim||function(){return this.replace(/^\s+|\s+$/g,"")},o=Array[r].indexOf||function(e){for(var t=0,r=this.length;t<r;t++)if(t in this&&this[t]===e)return t;return-1},l=function(e,t){this.name=e,this.code=DOMException[e],this.message=t},u=function(e,t){if(""===t)throw new l("SYNTAX_ERR","An invalid or illegal string was specified");if(/\s/.test(t))throw new l("INVALID_CHARACTER_ERR","String contains an invalid character");return o.call(e,t)},s=function(e){for(var t=i.call(e.getAttribute("class")||""),r=t?t.split(/\s+/):[],n=0,a=r.length;n<a;n++)this.push(r[n]);this._updateClassName=function(){e.setAttribute("class",this.toString())}},c=s[r]=[],f=function(){return new s(this)};if(l[r]=Error[r],c.item=function(e){return this[e]||null},c.contains=function(e){return-1!==u(this,e+="")},c.add=function(){for(var e,t=arguments,r=0,n=t.length,a=!1;e=t[r]+"",-1===u(this,e)&&(this.push(e),a=!0),++r<n;);a&&this._updateClassName()},c.remove=function(){var e,t,r=arguments,n=0,a=r.length,i=!1;do{for(e=r[n]+"",t=u(this,e);-1!==t;)this.splice(t,1),i=!0,t=u(this,e)}while(++n<a);i&&this._updateClassName()},c.toggle=function(e,t){e+="";var r=this.contains(e),n=r?!0!==t&&"remove":!1!==t&&"add";return n&&this[n](e),!0===t||!1===t?t:!r},c.toString=function(){return this.join(" ")},a.defineProperty){var d={get:f,enumerable:!0,configurable:!0};try{a.defineProperty(n,t,d)}catch(e){void 0!==e.number&&-2146823252!==e.number||(d.enumerable=!1,a.defineProperty(n,t,d))}}else a[r].__defineGetter__&&n.__defineGetter__(t,f)}})(self),(function(){"use strict";var e=document.createElement("_");if(e.classList.add("c1","c2"),!e.classList.contains("c2")){var t=function(e){var n=DOMTokenList.prototype[e];DOMTokenList.prototype[e]=function(e){var t,r=arguments.length;for(t=0;t<r;t++)e=arguments[t],n.call(this,e)}};t("add"),t("remove")}if(e.classList.toggle("c3",!1),e.classList.contains("c3")){var r=DOMTokenList.prototype.toggle;DOMTokenList.prototype.toggle=function(e,t){return 1 in arguments&&!this.contains(e)==!t?t:r.call(this,e)}}e=null})()),Element.prototype.closest||(Element.prototype.matches||(Element.prototype.matches=Element.prototype.msMatchesSelector||Element.prototype.webkitMatchesSelector),Element.prototype.closest=function(e){var t=this;if(!document.documentElement.contains(this))return null;do{if(t.matches(e))return t;t=t.parentElement}while(null!==t);return null}),(function(){if("function"==typeof window.CustomEvent)return;function e(e,t){t=t||{bubbles:!1,cancelable:!1,detail:void 0};var r=document.createEvent("CustomEvent");return r.initCustomEvent(e,t.bubbles,t.cancelable,t.detail),r}e.prototype=window.Event.prototype,window.CustomEvent=e})(),Element.prototype.matches||(Element.prototype.matches=Element.prototype.msMatchesSelector||Element.prototype.webkitMatchesSelector),(function(e,t){ true?!(__WEBPACK_AMD_DEFINE_ARRAY__ = [], __WEBPACK_AMD_DEFINE_RESULT__ = (function(){return t(e)}).apply(exports, __WEBPACK_AMD_DEFINE_ARRAY__),
				__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__)):undefined})("undefined"!=typeof global?global:"undefined"!=typeof window?window:this,(function(a){"use strict";var u={fieldClass:"error",errorClass:"error-message",fieldPrefix:"bouncer-field_",errorPrefix:"bouncer-error_",patterns:{email:/^([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22))*\x40([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d))*(\.\w{2,})+$/,url:/^(?:(?:https?|HTTPS?|ftp|FTP):\/\/)(?:\S+(?::\S*)?@)?(?:(?!(?:10|127)(?:\.\d{1,3}){3})(?!(?:169\.254|192\.168)(?:\.\d{1,3}){2})(?!172\.(?:1[6-9]|2\d|3[0-1])(?:\.\d{1,3}){2})(?:[1-9]\d?|1\d\d|2[01]\d|22[0-3])(?:\.(?:1?\d{1,2}|2[0-4]\d|25[0-5])){2}(?:\.(?:[1-9]\d?|1\d\d|2[0-4]\d|25[0-4]))|(?:(?:[a-zA-Z\u00a1-\uffff0-9]-*)*[a-zA-Z\u00a1-\uffff0-9]+)(?:\.(?:[a-zA-Z\u00a1-\uffff0-9]-*)*[a-zA-Z\u00a1-\uffff0-9]+)*(?:\.(?:[a-zA-Z\u00a1-\uffff]{2,}))\.?)(?::\d{2,5})?(?:[/?#]\S*)?$/,number:/^(?:[-+]?[0-9]*[.,]?[0-9]+)$/,color:/^#?([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$/,date:/(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))/,time:/^(?:(0[0-9]|1[0-9]|2[0-3])(:[0-5][0-9]))$/,month:/^(?:(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])))$/},customValidations:{},messageAfterField:!0,messageCustom:"data-bouncer-message",messageTarget:"data-bouncer-target",messages:{missingValue:{checkbox:"This field is required.",radio:"Please select a value.",select:"Please select a value.","select-multiple":"Please select at least one value.",default:"Please fill out this field."},patternMismatch:{email:"Please enter a valid email address.",url:"Please enter a URL.",number:"Please enter a number",color:"Please match the following format: #rrggbb",date:"Please use the YYYY-MM-DD format",time:"Please use the 24-hour time format. Ex. 23:00",month:"Please use the YYYY-MM format",default:"Please match the requested format."},outOfRange:{over:"Please select a value that is no more than {max}.",under:"Please select a value that is no less than {min}."},wrongLength:{over:"Please shorten this text to no more than {maxLength} characters. You are currently using {length} characters.",under:"Please lengthen this text to {minLength} characters or more. You are currently using {length} characters."},fallback:"There was an error with this field."},disableSubmit:!1,emitEvents:!0},s=function(e,t){Array.prototype.forEach.call(e,t)},c=function(){var r={};return s(arguments,(function(e){for(var t in e){if(!e.hasOwnProperty(t))return;"[object Object]"===Object.prototype.toString.call(e[t])?r[t]=c(r[t],e[t]):r[t]=e[t]}})),r},f=function(e,t,r){if("function"==typeof a.CustomEvent){var n=new CustomEvent(t,{bubbles:!0,detail:r||{}});e.dispatchEvent(n)}},d=function(e,t){return{missingValue:(function(e){if(!e.hasAttribute("required"))return!1;if("checkbox"===e.type)return!e.checked;var t=e.value.length;return"radio"===e.type&&(t=Array.prototype.filter.call(e.form.querySelectorAll('[name="'+m(e.name)+'"]'),(function(e){return e.checked})).length),t<1})(e),patternMismatch:(r=e,n=t,a=r.getAttribute("pattern"),!(!(a=a?new RegExp("^(?:"+a+")$"):n.patterns[r.type])||!r.value||r.value.length<1||r.value.match(a))),outOfRange:(function(e){if(!e.value||e.value.length<1)return!1;var t=e.getAttribute("max"),r=e.getAttribute("min"),n=parseFloat(e.value);return t&&t<n?"over":!!(r&&n<r)&&"under"})(e),wrongLength:(function(e){if(!e.value||e.value.length<1)return!1;var t=e.getAttribute("maxlength"),r=e.getAttribute("minlength"),n=e.value.length;return t&&t<n?"over":!!(r&&n<r)&&"under"})(e)};var r,n,a},m=function(e){for(var t,r=String(e),n=r.length,a=-1,i="",o=r.charCodeAt(0);++a<n;){if(0===(t=r.charCodeAt(a)))throw new InvalidCharacterError("Invalid character: the input contains U+0000.");1<=t&&t<=31||127==t||0===a&&48<=t&&t<=57||1===a&&48<=t&&t<=57&&45===o?i+="\\"+t.toString(16)+" ":i+=128<=t||45===t||95===t||48<=t&&t<=57||65<=t&&t<=90||97<=t&&t<=122?r.charAt(a):"\\"+r.charAt(a)}return i},h=function(e,t,r){var n=e.name?e.name:e.id;return!n&&r&&(n=t.fieldPrefix+Math.floor(999*Math.random()),e.id=n),"checkbox"===e.type&&(n+="_"+(e.value||e.id)),n},x=function(e,t){var r=document.createElement("div");r.className=t.errorClass,r.id=t.errorPrefix+h(e,t,!0);var n=(function(e,t,r){var n=e.getAttribute(r.messageTarget);if(n){var a=e.form.querySelector(n);if(a)return a.firstChild||a.appendChild(document.createTextNode(""))}return r.messageAfterField?t.nextSibling:t})(e,(function(e){if("radio"===e.type&&e.name){var t=e.form.querySelectorAll('[name="'+m(e.name)+'"]');e=t[t.length-1]}"radio"!==e.type&&"checkbox"!==e.type||(e=e.closest("label")||e.form.querySelector('[for="'+e.id+'"]')||e);return e})(e),t);return n.parentNode.insertBefore(r,n),r},v=function(e,t,r){e.classList.add(r.fieldClass),e.setAttribute("aria-describedby",t.id),e.setAttribute("aria-invalid",!0)},g=function(e,t,r){var n,a,i,o=e.form.querySelector("#"+m(r.errorPrefix+h(e,r)))||x(e,r),l=(function(e,t,r){var n=r.messages;if(t.missingValue)return n.missingValue[e.type]||n.missingValue.default;if(t.outOfRange)return n.outOfRange[t.outOfRange].replace("{max}",e.getAttribute("max")).replace("{min}",e.getAttribute("min")).replace("{length}",e.value.length);if(t.wrongLength)return n.wrongLength[t.wrongLength].replace("{maxLength}",e.getAttribute("maxlength")).replace("{minLength}",e.getAttribute("minlength")).replace("{length}",e.value.length);if(t.patternMismatch){var a=e.getAttribute(r.messageCustom);return a||n.patternMismatch[e.type]||n.patternMismatch.default}for(var i in r.customValidations)if(r.customValidations.hasOwnProperty(i)&&t[i]&&n[i])return n[i];return n.fallback})(e,t,r);o.textContent="function"==typeof l?l(e,r):l,a=o,i=r,"radio"===(n=e).type&&n.name&&Array.prototype.forEach.call(document.querySelectorAll('[name="'+n.name+'"]'),(function(e){v(e,a,i)})),v(n,a,i),r.emitEvents&&f(e,"bouncerShowError",{errors:t})},i=function(e,t){e.classList.remove(t.fieldClass),e.removeAttribute("aria-describedby"),e.removeAttribute("aria-invalid")},p=function(e,t){var r,n,a=e.form.querySelector("#"+m(t.errorPrefix+h(e,t)));a&&(a.parentNode.removeChild(a),n=t,"radio"===(r=e).type&&r.name?Array.prototype.forEach.call(document.querySelectorAll('[name="'+r.name+'"]'),(function(e){i(e,n)})):i(r,n),t.emitEvents&&f(e,"bouncerRemoveError"))};return function(n,e){var l,r={};r.validate=function(e,t){if(!e.disabled&&!e.readOnly&&"reset"!==e.type&&"submit"!==e.type&&"button"!==e.type){var r,n,a,i=c(l,t||{}),o=(a=d(r=e,n=i),{valid:!(function(e){for(var t in e)if(e[t])return!0;return!1})(a=(function(e,t,r,n){for(var a in r)r.hasOwnProperty(a)&&(t[a]=r[a](e,n));return t})(r,a,n.customValidations,n)),errors:a});if(!o.valid)return g(e,o.errors,i),o;p(e,i)}},r.validateAll=function(e){return Array.prototype.filter.call(e.querySelectorAll("input, select, textarea"),(function(e){var t=r.validate(e);return t&&!t.valid}))};var a=function(e){e.target.form&&e.target.form.matches(n)&&r.validate(e.target)},i=function(e){e.target.form&&e.target.form.matches(n)&&e.target.classList.contains(l.fieldClass)&&r.validate(e.target)},o=function(e){if(e.target.matches(n)){e.preventDefault();var t=r.validateAll(e.target);if(0<t.length)return t[0].focus(),void f(e.target,"bouncerFormInvalid",{errors:t});l.disableSubmit||e.target.submit(),l.emitEvents&&f(e.target,"bouncerFormValid")}};r.destroy=function(){var e,t,r;document.removeEventListener("blur",a,!0),document.removeEventListener("input",i,!1),document.removeEventListener("click",i,!1),document.removeEventListener("submit",o,!1),e=n,t=l,s(document.querySelectorAll(e),(function(e){s(e.querySelectorAll("input, select, textarea"),(function(e){p(e,t)}))})),r=n,s(document.querySelectorAll(r),(function(e){e.removeAttribute("novalidate")})),l.emitEvents&&f(document,"bouncerDestroyed",{settings:l}),l=null};var t;return l=c(u,e||{}),t=n,s(document.querySelectorAll(t),(function(e){e.setAttribute("novalidate",!0)})),document.addEventListener("blur",a,!0),document.addEventListener("input",i,!1),document.addEventListener("click",i,!1),document.addEventListener("submit",o,!1),l.emitEvents&&f(document,"bouncerInitialized",{settings:l}),r}}));
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! ./../../webpack/buildin/global.js */ "./node_modules/webpack/buildin/global.js")))

/***/ }),

/***/ "./node_modules/intersection-observer/intersection-observer.js":
/*!*********************************************************************!*\
  !*** ./node_modules/intersection-observer/intersection-observer.js ***!
  \*********************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Copyright 2016 Google Inc. All Rights Reserved.
 *
 * Licensed under the W3C SOFTWARE AND DOCUMENT NOTICE AND LICENSE.
 *
 *  https://www.w3.org/Consortium/Legal/2015/copyright-software-and-document
 *
 */

(function(window, document) {
'use strict';


// Exits early if all IntersectionObserver and IntersectionObserverEntry
// features are natively supported.
if ('IntersectionObserver' in window &&
    'IntersectionObserverEntry' in window &&
    'intersectionRatio' in window.IntersectionObserverEntry.prototype) {

  // Minimal polyfill for Edge 15's lack of `isIntersecting`
  // See: https://github.com/w3c/IntersectionObserver/issues/211
  if (!('isIntersecting' in window.IntersectionObserverEntry.prototype)) {
    Object.defineProperty(window.IntersectionObserverEntry.prototype,
      'isIntersecting', {
      get: function () {
        return this.intersectionRatio > 0;
      }
    });
  }
  return;
}


/**
 * An IntersectionObserver registry. This registry exists to hold a strong
 * reference to IntersectionObserver instances currently observing a target
 * element. Without this registry, instances without another reference may be
 * garbage collected.
 */
var registry = [];


/**
 * Creates the global IntersectionObserverEntry constructor.
 * https://w3c.github.io/IntersectionObserver/#intersection-observer-entry
 * @param {Object} entry A dictionary of instance properties.
 * @constructor
 */
function IntersectionObserverEntry(entry) {
  this.time = entry.time;
  this.target = entry.target;
  this.rootBounds = entry.rootBounds;
  this.boundingClientRect = entry.boundingClientRect;
  this.intersectionRect = entry.intersectionRect || getEmptyRect();
  this.isIntersecting = !!entry.intersectionRect;

  // Calculates the intersection ratio.
  var targetRect = this.boundingClientRect;
  var targetArea = targetRect.width * targetRect.height;
  var intersectionRect = this.intersectionRect;
  var intersectionArea = intersectionRect.width * intersectionRect.height;

  // Sets intersection ratio.
  if (targetArea) {
    // Round the intersection ratio to avoid floating point math issues:
    // https://github.com/w3c/IntersectionObserver/issues/324
    this.intersectionRatio = Number((intersectionArea / targetArea).toFixed(4));
  } else {
    // If area is zero and is intersecting, sets to 1, otherwise to 0
    this.intersectionRatio = this.isIntersecting ? 1 : 0;
  }
}


/**
 * Creates the global IntersectionObserver constructor.
 * https://w3c.github.io/IntersectionObserver/#intersection-observer-interface
 * @param {Function} callback The function to be invoked after intersection
 *     changes have queued. The function is not invoked if the queue has
 *     been emptied by calling the `takeRecords` method.
 * @param {Object=} opt_options Optional configuration options.
 * @constructor
 */
function IntersectionObserver(callback, opt_options) {

  var options = opt_options || {};

  if (typeof callback != 'function') {
    throw new Error('callback must be a function');
  }

  if (options.root && options.root.nodeType != 1) {
    throw new Error('root must be an Element');
  }

  // Binds and throttles `this._checkForIntersections`.
  this._checkForIntersections = throttle(
      this._checkForIntersections.bind(this), this.THROTTLE_TIMEOUT);

  // Private properties.
  this._callback = callback;
  this._observationTargets = [];
  this._queuedEntries = [];
  this._rootMarginValues = this._parseRootMargin(options.rootMargin);

  // Public properties.
  this.thresholds = this._initThresholds(options.threshold);
  this.root = options.root || null;
  this.rootMargin = this._rootMarginValues.map(function(margin) {
    return margin.value + margin.unit;
  }).join(' ');
}


/**
 * The minimum interval within which the document will be checked for
 * intersection changes.
 */
IntersectionObserver.prototype.THROTTLE_TIMEOUT = 100;


/**
 * The frequency in which the polyfill polls for intersection changes.
 * this can be updated on a per instance basis and must be set prior to
 * calling `observe` on the first target.
 */
IntersectionObserver.prototype.POLL_INTERVAL = null;

/**
 * Use a mutation observer on the root element
 * to detect intersection changes.
 */
IntersectionObserver.prototype.USE_MUTATION_OBSERVER = true;


/**
 * Starts observing a target element for intersection changes based on
 * the thresholds values.
 * @param {Element} target The DOM element to observe.
 */
IntersectionObserver.prototype.observe = function(target) {
  var isTargetAlreadyObserved = this._observationTargets.some(function(item) {
    return item.element == target;
  });

  if (isTargetAlreadyObserved) {
    return;
  }

  if (!(target && target.nodeType == 1)) {
    throw new Error('target must be an Element');
  }

  this._registerInstance();
  this._observationTargets.push({element: target, entry: null});
  this._monitorIntersections();
  this._checkForIntersections();
};


/**
 * Stops observing a target element for intersection changes.
 * @param {Element} target The DOM element to observe.
 */
IntersectionObserver.prototype.unobserve = function(target) {
  this._observationTargets =
      this._observationTargets.filter(function(item) {

    return item.element != target;
  });
  if (!this._observationTargets.length) {
    this._unmonitorIntersections();
    this._unregisterInstance();
  }
};


/**
 * Stops observing all target elements for intersection changes.
 */
IntersectionObserver.prototype.disconnect = function() {
  this._observationTargets = [];
  this._unmonitorIntersections();
  this._unregisterInstance();
};


/**
 * Returns any queue entries that have not yet been reported to the
 * callback and clears the queue. This can be used in conjunction with the
 * callback to obtain the absolute most up-to-date intersection information.
 * @return {Array} The currently queued entries.
 */
IntersectionObserver.prototype.takeRecords = function() {
  var records = this._queuedEntries.slice();
  this._queuedEntries = [];
  return records;
};


/**
 * Accepts the threshold value from the user configuration object and
 * returns a sorted array of unique threshold values. If a value is not
 * between 0 and 1 and error is thrown.
 * @private
 * @param {Array|number=} opt_threshold An optional threshold value or
 *     a list of threshold values, defaulting to [0].
 * @return {Array} A sorted list of unique and valid threshold values.
 */
IntersectionObserver.prototype._initThresholds = function(opt_threshold) {
  var threshold = opt_threshold || [0];
  if (!Array.isArray(threshold)) threshold = [threshold];

  return threshold.sort().filter(function(t, i, a) {
    if (typeof t != 'number' || isNaN(t) || t < 0 || t > 1) {
      throw new Error('threshold must be a number between 0 and 1 inclusively');
    }
    return t !== a[i - 1];
  });
};


/**
 * Accepts the rootMargin value from the user configuration object
 * and returns an array of the four margin values as an object containing
 * the value and unit properties. If any of the values are not properly
 * formatted or use a unit other than px or %, and error is thrown.
 * @private
 * @param {string=} opt_rootMargin An optional rootMargin value,
 *     defaulting to '0px'.
 * @return {Array<Object>} An array of margin objects with the keys
 *     value and unit.
 */
IntersectionObserver.prototype._parseRootMargin = function(opt_rootMargin) {
  var marginString = opt_rootMargin || '0px';
  var margins = marginString.split(/\s+/).map(function(margin) {
    var parts = /^(-?\d*\.?\d+)(px|%)$/.exec(margin);
    if (!parts) {
      throw new Error('rootMargin must be specified in pixels or percent');
    }
    return {value: parseFloat(parts[1]), unit: parts[2]};
  });

  // Handles shorthand.
  margins[1] = margins[1] || margins[0];
  margins[2] = margins[2] || margins[0];
  margins[3] = margins[3] || margins[1];

  return margins;
};


/**
 * Starts polling for intersection changes if the polling is not already
 * happening, and if the page's visibility state is visible.
 * @private
 */
IntersectionObserver.prototype._monitorIntersections = function() {
  if (!this._monitoringIntersections) {
    this._monitoringIntersections = true;

    // If a poll interval is set, use polling instead of listening to
    // resize and scroll events or DOM mutations.
    if (this.POLL_INTERVAL) {
      this._monitoringInterval = setInterval(
          this._checkForIntersections, this.POLL_INTERVAL);
    }
    else {
      addEvent(window, 'resize', this._checkForIntersections, true);
      addEvent(document, 'scroll', this._checkForIntersections, true);

      if (this.USE_MUTATION_OBSERVER && 'MutationObserver' in window) {
        this._domObserver = new MutationObserver(this._checkForIntersections);
        this._domObserver.observe(document, {
          attributes: true,
          childList: true,
          characterData: true,
          subtree: true
        });
      }
    }
  }
};


/**
 * Stops polling for intersection changes.
 * @private
 */
IntersectionObserver.prototype._unmonitorIntersections = function() {
  if (this._monitoringIntersections) {
    this._monitoringIntersections = false;

    clearInterval(this._monitoringInterval);
    this._monitoringInterval = null;

    removeEvent(window, 'resize', this._checkForIntersections, true);
    removeEvent(document, 'scroll', this._checkForIntersections, true);

    if (this._domObserver) {
      this._domObserver.disconnect();
      this._domObserver = null;
    }
  }
};


/**
 * Scans each observation target for intersection changes and adds them
 * to the internal entries queue. If new entries are found, it
 * schedules the callback to be invoked.
 * @private
 */
IntersectionObserver.prototype._checkForIntersections = function() {
  var rootIsInDom = this._rootIsInDom();
  var rootRect = rootIsInDom ? this._getRootRect() : getEmptyRect();

  this._observationTargets.forEach(function(item) {
    var target = item.element;
    var targetRect = getBoundingClientRect(target);
    var rootContainsTarget = this._rootContainsTarget(target);
    var oldEntry = item.entry;
    var intersectionRect = rootIsInDom && rootContainsTarget &&
        this._computeTargetAndRootIntersection(target, rootRect);

    var newEntry = item.entry = new IntersectionObserverEntry({
      time: now(),
      target: target,
      boundingClientRect: targetRect,
      rootBounds: rootRect,
      intersectionRect: intersectionRect
    });

    if (!oldEntry) {
      this._queuedEntries.push(newEntry);
    } else if (rootIsInDom && rootContainsTarget) {
      // If the new entry intersection ratio has crossed any of the
      // thresholds, add a new entry.
      if (this._hasCrossedThreshold(oldEntry, newEntry)) {
        this._queuedEntries.push(newEntry);
      }
    } else {
      // If the root is not in the DOM or target is not contained within
      // root but the previous entry for this target had an intersection,
      // add a new record indicating removal.
      if (oldEntry && oldEntry.isIntersecting) {
        this._queuedEntries.push(newEntry);
      }
    }
  }, this);

  if (this._queuedEntries.length) {
    this._callback(this.takeRecords(), this);
  }
};


/**
 * Accepts a target and root rect computes the intersection between then
 * following the algorithm in the spec.
 * TODO(philipwalton): at this time clip-path is not considered.
 * https://w3c.github.io/IntersectionObserver/#calculate-intersection-rect-algo
 * @param {Element} target The target DOM element
 * @param {Object} rootRect The bounding rect of the root after being
 *     expanded by the rootMargin value.
 * @return {?Object} The final intersection rect object or undefined if no
 *     intersection is found.
 * @private
 */
IntersectionObserver.prototype._computeTargetAndRootIntersection =
    function(target, rootRect) {

  // If the element isn't displayed, an intersection can't happen.
  if (window.getComputedStyle(target).display == 'none') return;

  var targetRect = getBoundingClientRect(target);
  var intersectionRect = targetRect;
  var parent = getParentNode(target);
  var atRoot = false;

  while (!atRoot) {
    var parentRect = null;
    var parentComputedStyle = parent.nodeType == 1 ?
        window.getComputedStyle(parent) : {};

    // If the parent isn't displayed, an intersection can't happen.
    if (parentComputedStyle.display == 'none') return;

    if (parent == this.root || parent == document) {
      atRoot = true;
      parentRect = rootRect;
    } else {
      // If the element has a non-visible overflow, and it's not the <body>
      // or <html> element, update the intersection rect.
      // Note: <body> and <html> cannot be clipped to a rect that's not also
      // the document rect, so no need to compute a new intersection.
      if (parent != document.body &&
          parent != document.documentElement &&
          parentComputedStyle.overflow != 'visible') {
        parentRect = getBoundingClientRect(parent);
      }
    }

    // If either of the above conditionals set a new parentRect,
    // calculate new intersection data.
    if (parentRect) {
      intersectionRect = computeRectIntersection(parentRect, intersectionRect);

      if (!intersectionRect) break;
    }
    parent = getParentNode(parent);
  }
  return intersectionRect;
};


/**
 * Returns the root rect after being expanded by the rootMargin value.
 * @return {Object} The expanded root rect.
 * @private
 */
IntersectionObserver.prototype._getRootRect = function() {
  var rootRect;
  if (this.root) {
    rootRect = getBoundingClientRect(this.root);
  } else {
    // Use <html>/<body> instead of window since scroll bars affect size.
    var html = document.documentElement;
    var body = document.body;
    rootRect = {
      top: 0,
      left: 0,
      right: html.clientWidth || body.clientWidth,
      width: html.clientWidth || body.clientWidth,
      bottom: html.clientHeight || body.clientHeight,
      height: html.clientHeight || body.clientHeight
    };
  }
  return this._expandRectByRootMargin(rootRect);
};


/**
 * Accepts a rect and expands it by the rootMargin value.
 * @param {Object} rect The rect object to expand.
 * @return {Object} The expanded rect.
 * @private
 */
IntersectionObserver.prototype._expandRectByRootMargin = function(rect) {
  var margins = this._rootMarginValues.map(function(margin, i) {
    return margin.unit == 'px' ? margin.value :
        margin.value * (i % 2 ? rect.width : rect.height) / 100;
  });
  var newRect = {
    top: rect.top - margins[0],
    right: rect.right + margins[1],
    bottom: rect.bottom + margins[2],
    left: rect.left - margins[3]
  };
  newRect.width = newRect.right - newRect.left;
  newRect.height = newRect.bottom - newRect.top;

  return newRect;
};


/**
 * Accepts an old and new entry and returns true if at least one of the
 * threshold values has been crossed.
 * @param {?IntersectionObserverEntry} oldEntry The previous entry for a
 *    particular target element or null if no previous entry exists.
 * @param {IntersectionObserverEntry} newEntry The current entry for a
 *    particular target element.
 * @return {boolean} Returns true if a any threshold has been crossed.
 * @private
 */
IntersectionObserver.prototype._hasCrossedThreshold =
    function(oldEntry, newEntry) {

  // To make comparing easier, an entry that has a ratio of 0
  // but does not actually intersect is given a value of -1
  var oldRatio = oldEntry && oldEntry.isIntersecting ?
      oldEntry.intersectionRatio || 0 : -1;
  var newRatio = newEntry.isIntersecting ?
      newEntry.intersectionRatio || 0 : -1;

  // Ignore unchanged ratios
  if (oldRatio === newRatio) return;

  for (var i = 0; i < this.thresholds.length; i++) {
    var threshold = this.thresholds[i];

    // Return true if an entry matches a threshold or if the new ratio
    // and the old ratio are on the opposite sides of a threshold.
    if (threshold == oldRatio || threshold == newRatio ||
        threshold < oldRatio !== threshold < newRatio) {
      return true;
    }
  }
};


/**
 * Returns whether or not the root element is an element and is in the DOM.
 * @return {boolean} True if the root element is an element and is in the DOM.
 * @private
 */
IntersectionObserver.prototype._rootIsInDom = function() {
  return !this.root || containsDeep(document, this.root);
};


/**
 * Returns whether or not the target element is a child of root.
 * @param {Element} target The target element to check.
 * @return {boolean} True if the target element is a child of root.
 * @private
 */
IntersectionObserver.prototype._rootContainsTarget = function(target) {
  return containsDeep(this.root || document, target);
};


/**
 * Adds the instance to the global IntersectionObserver registry if it isn't
 * already present.
 * @private
 */
IntersectionObserver.prototype._registerInstance = function() {
  if (registry.indexOf(this) < 0) {
    registry.push(this);
  }
};


/**
 * Removes the instance from the global IntersectionObserver registry.
 * @private
 */
IntersectionObserver.prototype._unregisterInstance = function() {
  var index = registry.indexOf(this);
  if (index != -1) registry.splice(index, 1);
};


/**
 * Returns the result of the performance.now() method or null in browsers
 * that don't support the API.
 * @return {number} The elapsed time since the page was requested.
 */
function now() {
  return window.performance && performance.now && performance.now();
}


/**
 * Throttles a function and delays its execution, so it's only called at most
 * once within a given time period.
 * @param {Function} fn The function to throttle.
 * @param {number} timeout The amount of time that must pass before the
 *     function can be called again.
 * @return {Function} The throttled function.
 */
function throttle(fn, timeout) {
  var timer = null;
  return function () {
    if (!timer) {
      timer = setTimeout(function() {
        fn();
        timer = null;
      }, timeout);
    }
  };
}


/**
 * Adds an event handler to a DOM node ensuring cross-browser compatibility.
 * @param {Node} node The DOM node to add the event handler to.
 * @param {string} event The event name.
 * @param {Function} fn The event handler to add.
 * @param {boolean} opt_useCapture Optionally adds the even to the capture
 *     phase. Note: this only works in modern browsers.
 */
function addEvent(node, event, fn, opt_useCapture) {
  if (typeof node.addEventListener == 'function') {
    node.addEventListener(event, fn, opt_useCapture || false);
  }
  else if (typeof node.attachEvent == 'function') {
    node.attachEvent('on' + event, fn);
  }
}


/**
 * Removes a previously added event handler from a DOM node.
 * @param {Node} node The DOM node to remove the event handler from.
 * @param {string} event The event name.
 * @param {Function} fn The event handler to remove.
 * @param {boolean} opt_useCapture If the event handler was added with this
 *     flag set to true, it should be set to true here in order to remove it.
 */
function removeEvent(node, event, fn, opt_useCapture) {
  if (typeof node.removeEventListener == 'function') {
    node.removeEventListener(event, fn, opt_useCapture || false);
  }
  else if (typeof node.detatchEvent == 'function') {
    node.detatchEvent('on' + event, fn);
  }
}


/**
 * Returns the intersection between two rect objects.
 * @param {Object} rect1 The first rect.
 * @param {Object} rect2 The second rect.
 * @return {?Object} The intersection rect or undefined if no intersection
 *     is found.
 */
function computeRectIntersection(rect1, rect2) {
  var top = Math.max(rect1.top, rect2.top);
  var bottom = Math.min(rect1.bottom, rect2.bottom);
  var left = Math.max(rect1.left, rect2.left);
  var right = Math.min(rect1.right, rect2.right);
  var width = right - left;
  var height = bottom - top;

  return (width >= 0 && height >= 0) && {
    top: top,
    bottom: bottom,
    left: left,
    right: right,
    width: width,
    height: height
  };
}


/**
 * Shims the native getBoundingClientRect for compatibility with older IE.
 * @param {Element} el The element whose bounding rect to get.
 * @return {Object} The (possibly shimmed) rect of the element.
 */
function getBoundingClientRect(el) {
  var rect;

  try {
    rect = el.getBoundingClientRect();
  } catch (err) {
    // Ignore Windows 7 IE11 "Unspecified error"
    // https://github.com/w3c/IntersectionObserver/pull/205
  }

  if (!rect) return getEmptyRect();

  // Older IE
  if (!(rect.width && rect.height)) {
    rect = {
      top: rect.top,
      right: rect.right,
      bottom: rect.bottom,
      left: rect.left,
      width: rect.right - rect.left,
      height: rect.bottom - rect.top
    };
  }
  return rect;
}


/**
 * Returns an empty rect object. An empty rect is returned when an element
 * is not in the DOM.
 * @return {Object} The empty rect.
 */
function getEmptyRect() {
  return {
    top: 0,
    bottom: 0,
    left: 0,
    right: 0,
    width: 0,
    height: 0
  };
}

/**
 * Checks to see if a parent element contains a child element (including inside
 * shadow DOM).
 * @param {Node} parent The parent element.
 * @param {Node} child The child element.
 * @return {boolean} True if the parent node contains the child node.
 */
function containsDeep(parent, child) {
  var node = child;
  while (node) {
    if (node == parent) return true;

    node = getParentNode(node);
  }
  return false;
}


/**
 * Gets the parent node of an element or its host element if the parent node
 * is a shadow root.
 * @param {Node} node The node whose parent to get.
 * @return {Node|null} The parent node or null if no parent exists.
 */
function getParentNode(node) {
  var parent = node.parentNode;

  if (parent && parent.nodeType == 11 && parent.host) {
    // If the parent is a shadow root, return the host element.
    return parent.host;
  }
  return parent;
}


// Exposes the constructors globally.
window.IntersectionObserver = IntersectionObserver;
window.IntersectionObserverEntry = IntersectionObserverEntry;

}(window, document));


/***/ }),

/***/ "./node_modules/tabbable/index.js":
/*!****************************************!*\
  !*** ./node_modules/tabbable/index.js ***!
  \****************************************/
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

/***/ "./node_modules/webpack/buildin/global.js":
/*!***********************************!*\
  !*** (webpack)/buildin/global.js ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports) {

var g;

// This works in non-strict mode
g = (function() {
	return this;
})();

try {
	// This works if eval is allowed (see CSP)
	g = g || new Function("return this")();
} catch (e) {
	// This works if the window reference is available
	if (typeof window === "object") g = window;
}

// g can still be undefined, but nothing to do about it...
// We return undefined, instead of nothing here, so it's
// easier to handle this case. if(!global) { ...}

module.exports = g;


/***/ }),

/***/ "./node_modules/xtend/immutable.js":
/*!*****************************************!*\
  !*** ./node_modules/xtend/immutable.js ***!
  \*****************************************/
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

/***/ "./themes/lovata-shopaholic-sneakers/common.css":
/*!******************************************************!*\
  !*** ./themes/lovata-shopaholic-sneakers/common.css ***!
  \******************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./themes/lovata-shopaholic-sneakers/common.js":
/*!*****************************************************!*\
  !*** ./themes/lovata-shopaholic-sneakers/common.js ***!
  \*****************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var intersection_observer__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! intersection-observer */ "./node_modules/intersection-observer/intersection-observer.js");
/* harmony import */ var intersection_observer__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(intersection_observer__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _modules_system_assets_js_framework__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../modules/system/assets/js/framework */ "./modules/system/assets/js/framework.js");
/* harmony import */ var _modules_system_assets_js_framework__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_modules_system_assets_js_framework__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _js_validation__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./js/validation */ "./themes/lovata-shopaholic-sneakers/js/validation.js");
/* harmony import */ var _js_utils__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./js/utils */ "./themes/lovata-shopaholic-sneakers/js/utils.js");
/* harmony import */ var _js_lazy_load__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./js/lazy-load */ "./themes/lovata-shopaholic-sneakers/js/lazy-load.js");
/* harmony import */ var _node_modules_focus_visible_dist_focus_visible__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ../../node_modules/focus-visible/dist/focus-visible */ "./node_modules/focus-visible/dist/focus-visible.js");
/* harmony import */ var _node_modules_focus_visible_dist_focus_visible__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_node_modules_focus_visible_dist_focus_visible__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var _partials_header_userbar_userbar__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./partials/header/userbar/userbar */ "./themes/lovata-shopaholic-sneakers/partials/header/userbar/userbar.js");
/* harmony import */ var _partials_header_drawer_nav_drawer_nav__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./partials/header/drawer-nav/drawer-nav */ "./themes/lovata-shopaholic-sneakers/partials/header/drawer-nav/drawer-nav.js");
/* harmony import */ var _partials_header_search_search__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ./partials/header/search/search */ "./themes/lovata-shopaholic-sneakers/partials/header/search/search.js");
/* harmony import */ var _partials_product_cart_cart_mini_cart_mini__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! ./partials/product/cart/cart-mini/cart-mini */ "./themes/lovata-shopaholic-sneakers/partials/product/cart/cart-mini/cart-mini.js");
/* harmony import */ var _partials_product_wish_list_wish_list__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! ./partials/product/wish-list/wish-list */ "./themes/lovata-shopaholic-sneakers/partials/product/wish-list/wish-list.js");
/* harmony import */ var _partials_form_input_input__WEBPACK_IMPORTED_MODULE_11__ = __webpack_require__(/*! ./partials/form/input/input */ "./themes/lovata-shopaholic-sneakers/partials/form/input/input.js");
/* harmony import */ var _partials_product_cart_cart_product_cart_product__WEBPACK_IMPORTED_MODULE_12__ = __webpack_require__(/*! ./partials/product/cart/cart-product/cart-product */ "./themes/lovata-shopaholic-sneakers/partials/product/cart/cart-product/cart-product.js");
/* harmony import */ var _partials_product_wish_list_wish_product_wish_product__WEBPACK_IMPORTED_MODULE_13__ = __webpack_require__(/*! ./partials/product/wish-list/wish-product/wish-product */ "./themes/lovata-shopaholic-sneakers/partials/product/wish-list/wish-product/wish-product.js");
/* harmony import */ var _partials_common_wysiwyg_wysiwyg__WEBPACK_IMPORTED_MODULE_14__ = __webpack_require__(/*! ./partials/common/wysiwyg/wysiwyg */ "./themes/lovata-shopaholic-sneakers/partials/common/wysiwyg/wysiwyg.js");
/* Import Libs */






/* * Header * */


/* * Drawer * */





/* * Form * */


/* * Other * */





/***/ }),

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

/***/ "./themes/lovata-shopaholic-sneakers/js/utils.js":
/*!*******************************************************!*\
  !*** ./themes/lovata-shopaholic-sneakers/js/utils.js ***!
  \*******************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = (new class Utils {
  constructor() {
    this.textForCutSelector = '_js-cutted';
    this.handler();
    this.textLength = 75;
  }

  handler() {
    document.addEventListener('DOMContentLoaded', () => {
      this.init();
    });
  }

  init() {
    const textCollection = document.querySelectorAll(".".concat(this.textForCutSelector));
    if (!textCollection.length) return;
    [...textCollection].forEach(el => this.cutText(el));
  }

  cutText(el) {
    const text = el.textContent;
    if (text.length < this.textLength) return;
    const newText = text.slice(0, this.textLength).concat('...');
    el.setAttribute('title', text);
    /* eslint no-param-reassign: ["error", { "props": false }] */

    el.textContent = newText;
  }

}());

/***/ }),

/***/ "./themes/lovata-shopaholic-sneakers/js/validation.js":
/*!************************************************************!*\
  !*** ./themes/lovata-shopaholic-sneakers/js/validation.js ***!
  \************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var formbouncerjs__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! formbouncerjs */ "./node_modules/formbouncerjs/dist/bouncer.polyfills.min.js");
/* harmony import */ var formbouncerjs__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(formbouncerjs__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _constant__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./constant */ "./themes/lovata-shopaholic-sneakers/js/constant.js");


/* harmony default export */ __webpack_exports__["default"] = (new class Validation {
  constructor() {
    this.formForValidationSelector = '._required';
    this.inValidSelector = '_invalid';
    this.handler();
  }

  handler() {
    document.addEventListener('DOMContentLoaded', () => {
      this.validate(this.formForValidationSelector);
    });
  }

  validate(selector) {
    this.validation = new formbouncerjs__WEBPACK_IMPORTED_MODULE_0___default.a(selector, {
      fieldClass: 'validation-error',
      errorClass: 'validation-error__message',
      fieldPrefix: 'validation-error-',
      errorPrefix: 'validation-error-',
      messageAfterField: true,
      messageCustom: 'data-bouncer-message',
      messageTarget: 'data-bouncer-target',
      disableSubmit: true,
      message: _constant__WEBPACK_IMPORTED_MODULE_1__["message"]
    });
    document.addEventListener('bouncerFormValid', (_ref) => {
      let {
        target
      } = _ref;
      target.classList.remove(this.inValidSelector);
    });
    document.addEventListener('bouncerFormInvalid', (_ref2) => {
      let {
        target
      } = _ref2;
      target.classList.add(this.inValidSelector);
    });
  }

}());

/***/ }),

/***/ "./themes/lovata-shopaholic-sneakers/pages/catalog.css":
/*!*************************************************************!*\
  !*** ./themes/lovata-shopaholic-sneakers/pages/catalog.css ***!
  \*************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./themes/lovata-shopaholic-sneakers/pages/checkout.css":
/*!**************************************************************!*\
  !*** ./themes/lovata-shopaholic-sneakers/pages/checkout.css ***!
  \**************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./themes/lovata-shopaholic-sneakers/pages/contact.css":
/*!*************************************************************!*\
  !*** ./themes/lovata-shopaholic-sneakers/pages/contact.css ***!
  \*************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./themes/lovata-shopaholic-sneakers/pages/index.css":
/*!***********************************************************!*\
  !*** ./themes/lovata-shopaholic-sneakers/pages/index.css ***!
  \***********************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./themes/lovata-shopaholic-sneakers/pages/news-list.css":
/*!***************************************************************!*\
  !*** ./themes/lovata-shopaholic-sneakers/pages/news-list.css ***!
  \***************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./themes/lovata-shopaholic-sneakers/pages/news-page.css":
/*!***************************************************************!*\
  !*** ./themes/lovata-shopaholic-sneakers/pages/news-page.css ***!
  \***************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./themes/lovata-shopaholic-sneakers/pages/product.css":
/*!*************************************************************!*\
  !*** ./themes/lovata-shopaholic-sneakers/pages/product.css ***!
  \*************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./themes/lovata-shopaholic-sneakers/partials/common/wysiwyg/wysiwyg.js":
/*!******************************************************************************!*\
  !*** ./themes/lovata-shopaholic-sneakers/partials/common/wysiwyg/wysiwyg.js ***!
  \******************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* WEBPACK VAR INJECTION */(function($) {/* harmony default export */ __webpack_exports__["default"] = (new class WysiwygTable {
  constructor() {
    this.wysiwyg = 'wysiwyg';
    this.wysiwygTable = '.wysiwyg table';
    this.wysiwygDescrClass = 'wysiwyg__img-descr';
    this.wysiwygDescrParentClass = 'wysiwyg__img-wrap';
    this.wysiwygTableWrapperClass = 'wysiwyg__table-wrapper';
    this.delay = 300;
    this.posterUrl = '/themes/lovata-shopaholic-sneakers/assets/img/cap.png';
    this.handleEvents();
  }

  handleEvents() {
    if (!$(".".concat(this.wysiwyg)).length) return;
    this.setPoster();
    $(window).on('resize', () => {
      this.adaptTable();
      clearTimeout(this.timer);
      this.timer = setTimeout(() => {
        this.imageDescription();
      }, this.delay);
    });
    $(document).ready(() => {
      this.adaptTable();
      this.imageDescription();
    });
  }

  adaptTable() {
    const $wysiwygTableWrapper = $('<div>').addClass(this.wysiwygTableWrapperClass);
    const tableCollection = $(this.wysiwygTable);
    [...tableCollection].forEach(el => {
      if (!$(el).parent(".".concat(this.wysiwygTableWrapperClass)).length) {
        $(this.wysiwygTable).wrap($wysiwygTableWrapper);
      }
    });
  }

  setPoster() {
    const videoList = $('video');
    [...videoList].forEach(el => $(el).attr('poster', this.posterUrl).attr('preload', 'none'));
  }

  imageDescription() {
    const image = $(".".concat(this.wysiwyg)).find('img');
    const imageWithDescr = [...image].filter(img => $(img).attr('alt'));
    this.renderDescription(imageWithDescr);
  }

  addNodeForDescr() {
    const descrNode = document.createElement('div');
    descrNode.classList.add(this.wysiwygDescrClass);
    return descrNode;
  }

  renderDescription(nodeList) {
    [...nodeList].forEach(node => {
      const text = $(node).attr('alt');
      const parent = $(node).parent();
      const nodeForText = $(this.addNodeForDescr());
      parent.addClass(this.wysiwygDescrParentClass);
      if (parent.find(".".concat(this.wysiwygDescrClass)).length) return;
      nodeForText.html(text).appendTo(parent);
    });
  }

}());
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js")))

/***/ }),

/***/ "./themes/lovata-shopaholic-sneakers/partials/form/input/input.js":
/*!************************************************************************!*\
  !*** ./themes/lovata-shopaholic-sneakers/partials/form/input/input.js ***!
  \************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* WEBPACK VAR INJECTION */(function($) {/* harmony default export */ __webpack_exports__["default"] = (new class Input {
  constructor() {
    this.inputWrapSelector = 'input';
    this.inputWrapFilledSelector = 'input_filled';
    this.inputFieldSelector = 'input__field';
    this.inputFieldFilledSelector = 'input__field_filled';
    this.inputLabelSelector = 'input__label';
    this.inputLabelElevatedSelector = 'input__label_elevated';
    this.errorSelector = 'validation-error';
    this.handler();
  }

  handler() {
    const input = $(".".concat(this.inputFieldSelector));
    if (!input.length) return;
    $(document).on('focus', ".".concat(this.inputFieldSelector), (_ref) => {
      let {
        target
      } = _ref;
      this.labelUp(target);
    });
    $(document).on('blur', ".".concat(this.inputFieldSelector), (_ref2) => {
      let {
        target
      } = _ref2;
      this.labelDown(target);
      this.checkChange(target);
    });
    $(document).on('change', ".".concat(this.inputFieldSelector), (_ref3) => {
      let {
        target
      } = _ref3;
      this.labelDown(target);
      this.checkChange(target);
    });
  }

  static checkInputState(input) {
    const value = $(input).val().trim();
    return value.length > 0;
  }

  checkChange(target) {
    if (!target.hasAttribute('required')) return;

    if ($(target).val().trim().length > 0) {
      $(target).addClass(this.inputFieldFilledSelector);
    } else {
      $(target).removeClass(this.inputFieldFilledSelector);
    }
  }

  findLabel(input) {
    return $(input).siblings(".".concat(this.inputLabelSelector));
  }

  labelUp(input) {
    this.findLabel(input).addClass(this.inputLabelElevatedSelector);
  }

  labelDown(input) {
    const inputState = this.constructor.checkInputState(input);

    if (!inputState) {
      this.findLabel(input).removeClass(this.inputLabelElevatedSelector);
    }
  }

}());
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js")))

/***/ }),

/***/ "./themes/lovata-shopaholic-sneakers/partials/header/drawer-nav/drawer-nav.js":
/*!************************************************************************************!*\
  !*** ./themes/lovata-shopaholic-sneakers/partials/header/drawer-nav/drawer-nav.js ***!
  \************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* WEBPACK VAR INJECTION */(function($) {/* harmony import */ var _lovata_popup_helper__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @lovata/popup-helper */ "./node_modules/@lovata/popup-helper/popup-helper.js");

/* harmony default export */ __webpack_exports__["default"] = (new class NavigationDrawer {
  constructor() {
    this.hiddenSelector = 'drawer-nav__wrapper_hidden';
    this.drawerNavSelector = 'drawer-nav';
    this.drawerOpenNavSelector = 'drawer-nav_open';
    this.drawerBtnSelector = 'drawer__btn';
    this.drawerCloseBtnSelector = 'drawer-nav__btn';
    this.drawerControllerBtn = 'js-drawer-btn';
    this.drawerCloseBtnVisibleSelector = 'drawer-nav__btn_close';
    this.subNavHeaderSelector = 'header-nav__title';
    this.subNavHeaderOpenSelector = 'header-nav__title_open';
    this.subNavListSelector = 'drawer-nav__category';
    this.subNavListOpenSelector = 'drawer-nav__category_open';
    this.drawerWrapperSelector = 'drawer-nav__wrapper';
    this.handler();
  }

  handler() {
    $(document).on('click', ".".concat(this.drawerControllerBtn), (_ref) => {
      let {
        currentTarget
      } = _ref;
      const isOpen = $(currentTarget).hasClass(this.drawerCloseBtnVisibleSelector);
      const wrapper = $(".".concat(this.drawerWrapperSelector));
      const modal = document.querySelector(".".concat(this.drawerNavSelector));
      const openBtn = document.querySelector(".".concat(this.drawerBtnSelector));
      const focusTarget = isOpen ? $(".".concat(this.drawerCloseBtnSelector))[0] : openBtn;
      _lovata_popup_helper__WEBPACK_IMPORTED_MODULE_0__["default"].overlayHandler(!isOpen, focusTarget, modal);
      _lovata_popup_helper__WEBPACK_IMPORTED_MODULE_0__["default"].setBodyScrollState(isOpen);
      $(".".concat(this.drawerControllerBtn)).toggleClass(this.drawerCloseBtnVisibleSelector);
      wrapper.toggleClass(this.hiddenSelector);
      $(".".concat(this.drawerNavSelector)).toggleClass(this.drawerOpenNavSelector);
      _lovata_popup_helper__WEBPACK_IMPORTED_MODULE_0__["default"].focusTrapManager(!isOpen, modal);
    });
    $(document).on('click', ".".concat(this.subNavHeaderSelector), (_ref2) => {
      let {
        currentTarget
      } = _ref2;
      const list = $(currentTarget).siblings(".".concat(this.subNavListSelector));
      if (!list.length) return;
      $(currentTarget).toggleClass(this.subNavHeaderOpenSelector);
      list.toggleClass(this.subNavListOpenSelector);
    });
  }

}());
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js")))

/***/ }),

/***/ "./themes/lovata-shopaholic-sneakers/partials/header/search/search.js":
/*!****************************************************************************!*\
  !*** ./themes/lovata-shopaholic-sneakers/partials/header/search/search.js ***!
  \****************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* WEBPACK VAR INJECTION */(function($) {/* harmony import */ var _lovata_shopaholic_search__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @lovata/shopaholic-search */ "./node_modules/@lovata/shopaholic-search/shopaholic-search.js");
/* harmony import */ var _lovata_popup_helper__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @lovata/popup-helper */ "./node_modules/@lovata/popup-helper/popup-helper.js");


/* harmony default export */ __webpack_exports__["default"] = (new class Search {
  constructor() {
    this.panelSelector = 'search-panel';
    this.panelOpenSelector = 'search-panel_hidden';
    this.drawerBtnSelector = 'js-search-popup';
    this.drawerParentSelector = 'header__search';
    this.drawerCloseSelector = 'search-panel__close';
    this.searchResultWrapper = 'search-panel__result';
    this.searchInputSelector = 'search-panel__input-field';
    this.preLoaderSelector = '.search-panel__preloader';
    this.init();
    this.handler();
  }

  init() {
    this.obSearchHelper = new _lovata_shopaholic_search__WEBPACK_IMPORTED_MODULE_0__["default"]();
    this.obSearchHelper.setAjaxRequestCallback(obRequest => {
      /* eslint-disable no-param-reassign */
      obRequest.update = {
        'header/search/search-panel/search-panel-result': ".".concat(this.searchResultWrapper)
      };
      obRequest.loading = this.preLoaderSelector;
      /* eslint-enable */

      return obRequest;
    });
    this.obSearchHelper.init();
  }

  handler() {
    const modal = document.querySelector(".".concat(this.panelSelector));
    $(document).on('click', ".".concat(this.drawerBtnSelector), (_ref) => {
      let {
        currentTarget
      } = _ref;
      const btn = document.querySelector(".".concat(this.drawerCloseSelector));
      const panel = $(currentTarget).parents(".".concat(this.drawerParentSelector)).children(".".concat(this.panelSelector));
      const isOpen = !panel.hasClass(this.panelOpenSelector);
      _lovata_popup_helper__WEBPACK_IMPORTED_MODULE_1__["default"].setBodyScrollState(isOpen);
      _lovata_popup_helper__WEBPACK_IMPORTED_MODULE_1__["default"].overlayHandler(!isOpen, btn, modal);
      panel.toggleClass(this.panelOpenSelector);
      setTimeout(() => {
        _lovata_popup_helper__WEBPACK_IMPORTED_MODULE_1__["default"].focusTrapManager(!isOpen, modal);
      }, 300);
      this.clearSearchInput(isOpen);
    });
  }

  clearSearchInput(isOpen) {
    if (!isOpen) return;
    $(".".concat(this.searchInputSelector)).val('');
    const searchResultWrapper = $(".".concat(this.searchResultWrapper));
    const childrenNode = searchResultWrapper.children();
    if (!childrenNode.length) return;
    childrenNode.remove();
  }

}());
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js")))

/***/ }),

/***/ "./themes/lovata-shopaholic-sneakers/partials/header/userbar/userbar.js":
/*!******************************************************************************!*\
  !*** ./themes/lovata-shopaholic-sneakers/partials/header/userbar/userbar.js ***!
  \******************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* WEBPACK VAR INJECTION */(function($) {/* harmony import */ var _lovata_shopaholic_cart_shopaholic_cart__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @lovata/shopaholic-cart/shopaholic-cart */ "./node_modules/@lovata/shopaholic-cart/shopaholic-cart.js");

/* harmony default export */ __webpack_exports__["default"] = (new class UserBar {
  constructor() {
    this.sCartInfoWrapper = '_shopaholic-cart-mini-wrapper';
    this.sWishListInfoWrapper = 'userbar__item_wish-list';
    const obRequest = {
      update: {
        'product/cart/cart-mini/cart-info/cart-info': ".".concat(this.sCartInfoWrapper)
      }
    };
    _lovata_shopaholic_cart_shopaholic_cart__WEBPACK_IMPORTED_MODULE_0__["default"].instance(obRequest);

    if ($(".".concat(this.sWishListInfoWrapper)).length > 0) {
      this.updateWishListInfo();
    }
  }

  updateWishListInfo() {
    $.request('ProductList::onAjaxRequest', {
      update: {
        'product/wish-list/wish-list-info/wish-list-info': ".".concat(this.sWishListInfoWrapper)
      }
    });
  }

}());
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js")))

/***/ }),

/***/ "./themes/lovata-shopaholic-sneakers/partials/product/cart/cart-mini/cart-mini.js":
/*!****************************************************************************************!*\
  !*** ./themes/lovata-shopaholic-sneakers/partials/product/cart/cart-mini/cart-mini.js ***!
  \****************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* WEBPACK VAR INJECTION */(function($) {/* harmony import */ var _lovata_popup_helper__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @lovata/popup-helper */ "./node_modules/@lovata/popup-helper/popup-helper.js");

/* harmony default export */ __webpack_exports__["default"] = (new class cartMini {
  constructor() {
    this.panelSelector = 'cart-info__panel';
    this.panelOpenSelector = 'cart-info__panel_visible';
    this.drawerBtnSelector = 'js-cart-mini';
    this.drawerParentSelector = 'header';
    this.drawerDisableSelector = 'cart-info_empty';
    this.drawerCloseSelector = 'cart-mini-panel__close';
    this.preLoaderSelector = 'cart-mini-panel__preloader';
    this.panelPartialSelector = 'product/cart/cart-mini/cart-mini-panel/cart-mini-panel-ajax';
    this.listWrapperSelector = '_shopaholic-cart-list';
    this.pageIdAttr = 'data-page-id';
    this.cartPageId = 'checkout';
    this.disableMiniCart();
    this.handler();
  }

  disableMiniCart() {
    const isCartPage = document.body.getAttribute(this.pageIdAttr) === this.cartPageId;
    if (!isCartPage) return;
    document.querySelector(".".concat(this.drawerBtnSelector)).classList.add(this.drawerDisableSelector);
  }

  handler() {
    $(document).on('click', ".".concat(this.drawerBtnSelector), (_ref) => {
      let {
        currentTarget
      } = _ref;
      const isDisable = $(currentTarget).hasClass(this.drawerDisableSelector);
      if (isDisable) return;
      const panel = $(currentTarget).parents(".".concat(this.drawerParentSelector)).find(".".concat(this.panelSelector));
      const isOpen = panel.hasClass(this.panelOpenSelector);
      const closeBtnNode = document.querySelector(".".concat(this.drawerCloseSelector));
      _lovata_popup_helper__WEBPACK_IMPORTED_MODULE_0__["default"].setBodyScrollState(isOpen);
      _lovata_popup_helper__WEBPACK_IMPORTED_MODULE_0__["default"].overlayController(!isOpen);
      panel.toggleClass(this.panelOpenSelector);
      _lovata_popup_helper__WEBPACK_IMPORTED_MODULE_0__["default"].overlayHandler(!isOpen, closeBtnNode, panel[0]);
      setTimeout(() => {
        _lovata_popup_helper__WEBPACK_IMPORTED_MODULE_0__["default"].focusTrapManager(!isOpen, panel[0]);
      }, 300);

      if (!isOpen) {// this.loadCart();
      }
    });
  }

  loadCart() {
    $.request('onAjax', {
      update: {
        [this.panelPartialSelector]: ".".concat(this.listWrapperSelector)
      },
      success: function success(res) {
        // eslint-disable-line object-shorthand, func-names
        this.success(res);
      },
      loading: ".".concat(this.preLoaderSelector)
    });
  }

}());
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js")))

/***/ }),

/***/ "./themes/lovata-shopaholic-sneakers/partials/product/cart/cart-product/cart-product.js":
/*!**********************************************************************************************!*\
  !*** ./themes/lovata-shopaholic-sneakers/partials/product/cart/cart-product/cart-product.js ***!
  \**********************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* WEBPACK VAR INJECTION */(function($) {/* harmony import */ var _lovata_shopaholic_cart_shopaholic_cart_update__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @lovata/shopaholic-cart/shopaholic-cart-update */ "./node_modules/@lovata/shopaholic-cart/shopaholic-cart-update.js");
/* harmony import */ var _lovata_shopaholic_cart_shopaholic_cart_remove__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @lovata/shopaholic-cart/shopaholic-cart-remove */ "./node_modules/@lovata/shopaholic-cart/shopaholic-cart-remove.js");
/* harmony import */ var _lovata_shopaholic_cart_shopaholic_cart_restore__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @lovata/shopaholic-cart/shopaholic-cart-restore */ "./node_modules/@lovata/shopaholic-cart/shopaholic-cart-restore.js");



/* harmony default export */ __webpack_exports__["default"] = (new class cartProduct {
  constructor() {
    this.obShopaholicCartUpdate = new _lovata_shopaholic_cart_shopaholic_cart_update__WEBPACK_IMPORTED_MODULE_0__["default"]();
    this.obShopaholicCartRemove = new _lovata_shopaholic_cart_shopaholic_cart_remove__WEBPACK_IMPORTED_MODULE_1__["default"]();
    this.obShopaholicCartRestore = new _lovata_shopaholic_cart_shopaholic_cart_restore__WEBPACK_IMPORTED_MODULE_2__["default"]();
    this.positionNodeSelector = '_shopaholic-product-wrapper';
    this.cardNodeSelector = 'cart-product';
    this.restoreHiddenNodeSelector = '_visually-hidden';
    this.restoreNodeSelector = 'js-item-restore';
    this.cardHiddenSelector = 'cart-product_hidden';
    this.sShippingTypeWrapper = '_cart_delivery_wrapper';
    this.sShippingTypePartial = 'product/cart/cart-delivery';
    this.sMiniCartWrapper = '_shopaholic-cart-mini-wrapper';
    this.isCartPage = document.body.getAttribute('data-page-id') === 'checkout';
    this.init();
  }

  init() {
    this.initUpdateButton();
    this.initRemoveButton();
    this.initRestoreButton();
  }

  initUpdateButton() {
    if (this.isCartPage) {
      this.obShopaholicCartUpdate.setAjaxRequestCallback(obRequestData => {
        /* eslint-disable  no-param-reassign */
        obRequestData.update = {};
        obRequestData.update[this.sShippingTypePartial] = ".".concat(this.sShippingTypeWrapper);
        /* eslint-enable */

        return obRequestData;
      });
    }

    this.obShopaholicCartUpdate.init();
  }

  initRemoveButton() {
    this.obShopaholicCartRemove.setAjaxRequestCallback((obRequestData, obButton) => {
      /* eslint-disable  no-param-reassign */
      if (this.isCartPage) {
        obRequestData.update = {
          'product/cart/cart-mini/cart-info/cart-info': ".".concat(this.sMiniCartWrapper)
        };
        obRequestData.update[this.sShippingTypePartial] = ".".concat(this.sShippingTypeWrapper);
      }

      obRequestData.complete = (_ref) => {
        let {
          responseJSON
        } = _ref;
        const obCard = $(obButton).parents(".".concat(this.positionNodeSelector));
        this.showRestoreSection(obCard);
        this.obShopaholicCartRemove.completeCallback(responseJSON, obButton);
      };
      /* eslint-enable */


      return obRequestData;
    }).init();
  }

  initRestoreButton() {
    this.obShopaholicCartRestore.setAjaxRequestCallback((obRequestData, obButton) => {
      /* eslint-disable  no-param-reassign */
      if (this.isCartPage) {
        obRequestData.update = {
          'product/cart/cart-mini/cart-info/cart-info': ".".concat(this.sMiniCartWrapper)
        };
        obRequestData.update[this.sShippingTypePartial] = ".".concat(this.sShippingTypeWrapper);
      }

      obRequestData.complete = (_ref2) => {
        let {
          responseJSON
        } = _ref2;
        const obCard = $(obButton).parents(".".concat(this.positionNodeSelector));
        this.hideRestoreSection(obCard);
        this.obShopaholicCartRemove.completeCallback(responseJSON, obButton);
      };
      /* eslint-enable */


      return obRequestData;
    }).init();
  }

  hideRestoreSection(obCard) {
    const restoreNode = $(obCard).find(".".concat(this.restoreNodeSelector));
    const cartNode = $(obCard).find(".".concat(this.cardNodeSelector));
    cartNode.removeClass(this.cardHiddenSelector);
    restoreNode.addClass(this.restoreHiddenNodeSelector).attr('aria-hidden', true).find(".".concat(this.obShopaholicCartRestore.sDefaultButtonClass)).attr('tabindex', '-1');
  }

  showRestoreSection(obCard) {
    const restoreNode = $(obCard).find(".".concat(this.restoreNodeSelector));
    const cartNode = $(obCard).find(".".concat(this.cardNodeSelector));
    cartNode.addClass(this.cardHiddenSelector);
    restoreNode.removeClass(this.restoreHiddenNodeSelector).attr('aria-hidden', false).find(".".concat(this.obShopaholicCartRestore.sDefaultButtonClass)).attr('tabindex', '0').focus();
  }

}());
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js")))

/***/ }),

/***/ "./themes/lovata-shopaholic-sneakers/partials/product/wish-list/wish-list.js":
/*!***********************************************************************************!*\
  !*** ./themes/lovata-shopaholic-sneakers/partials/product/wish-list/wish-list.js ***!
  \***********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* WEBPACK VAR INJECTION */(function($) {/* harmony import */ var _lovata_popup_helper__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @lovata/popup-helper */ "./node_modules/@lovata/popup-helper/popup-helper.js");

/* harmony default export */ __webpack_exports__["default"] = (new class wishList {
  constructor() {
    this.panelSelector = 'wish-list-info__panel';
    this.panelOpenSelector = 'wish-list-info__panel_visible';
    this.drawerBtnSelector = 'js-wish-list';
    this.drawerParentSelector = 'header';
    this.drawerOpenBtnSelector = 'wish-list-info';
    this.drawerDisableSelector = 'wish-list-info_empty';
    this.drawerCloseSelector = 'wish-list-panel__close';
    this.handler();
  }

  handler() {
    $(document).on('click', ".".concat(this.drawerBtnSelector), (_ref) => {
      let {
        currentTarget
      } = _ref;
      if ($(currentTarget).hasClass(this.drawerDisableSelector)) return;
      const panel = $(currentTarget).parents(".".concat(this.drawerParentSelector)).find(".".concat(this.panelSelector));
      const focusTarget = !panel.hasClass(this.drawerOpenBtnSelector) ? document.querySelector(".".concat(this.drawerCloseSelector)) : document.querySelector(".".concat(this.drawerOpenBtnSelector));
      const isOpen = panel.hasClass(this.panelOpenSelector);
      _lovata_popup_helper__WEBPACK_IMPORTED_MODULE_0__["default"].setBodyScrollState(isOpen);
      _lovata_popup_helper__WEBPACK_IMPORTED_MODULE_0__["default"].overlayHandler(!isOpen, focusTarget, panel[0]);
      panel.toggleClass(this.panelOpenSelector);
      setTimeout(() => {
        _lovata_popup_helper__WEBPACK_IMPORTED_MODULE_0__["default"].focusTrapManager(!isOpen, panel[0]);
      }, 300);
    });
  }

}());
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js")))

/***/ }),

/***/ "./themes/lovata-shopaholic-sneakers/partials/product/wish-list/wish-product/wish-product.js":
/*!***************************************************************************************************!*\
  !*** ./themes/lovata-shopaholic-sneakers/partials/product/wish-list/wish-product/wish-product.js ***!
  \***************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* WEBPACK VAR INJECTION */(function($) {/* harmony import */ var _lovata_shopaholic_wish_list_shopaholic_add_wish_list__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @lovata/shopaholic-wish-list/shopaholic-add-wish-list */ "./node_modules/@lovata/shopaholic-wish-list/shopaholic-add-wish-list.js");
/* harmony import */ var _lovata_shopaholic_wish_list_shopaholic_remove_wish_list__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @lovata/shopaholic-wish-list/shopaholic-remove-wish-list */ "./node_modules/@lovata/shopaholic-wish-list/shopaholic-remove-wish-list.js");


/* harmony default export */ __webpack_exports__["default"] = (new class wishProduct {
  constructor() {
    this.cardSelector = 'wish-product';
    this.restoreHiddenNodeSelector = 'wish-list-panel__restore_visually-hidden';
    this.restoreNodeSelector = 'wish-list-panel__restore';
    this.cardHiddenSelector = 'wish-product_hidden';
    this.removeBtnSelector = 'wish-product__remove';
    this.restoreBtnSelector = 'wish-list-panel__restore-btn';
    this.sWishListCounterWrapper = 'wish-list-info-wrapper';
    this.productPageWrapper = 'product-info';
    this.productPageIconClass = '_favorite';
    this.productPageIconSelector = 'wish-list-add__icon';
    this.obRemoveHelper = new _lovata_shopaholic_wish_list_shopaholic_remove_wish_list__WEBPACK_IMPORTED_MODULE_1__["default"]();
    this.obAddHelper = new _lovata_shopaholic_wish_list_shopaholic_add_wish_list__WEBPACK_IMPORTED_MODULE_0__["default"]();
    this.removeDelay = 3000;
    this.init();
  }

  init() {
    this.removeHandler();
    this.restoreHandler();
  }

  removeHandler() {
    this.obRemoveHelper.setButtonSelector(".".concat(this.removeBtnSelector)).setAjaxRequestCallback((obRequestData, obButton) => {
      /* eslint-disable no-param-reassign */
      obRequestData.update = {
        'product/wish-list/wish-list-info/wish-list-info-button': ".".concat(this.sWishListCounterWrapper)
      };

      obRequestData.complete = () => {
        const obCard = $(obButton).parents(".".concat(this.cardSelector));
        const iProductID = this.obRemoveHelper.getProductID(obButton);
        this.showRestoreSection(obCard);
        const obProductPageButton = $(".".concat(this.productPageWrapper, ".").concat(this.obRemoveHelper.sDefaultWrapperClass, "[").concat(this.obRemoveHelper.sAttributeName, "=").concat(iProductID, "]")).find(".".concat(this.obRemoveHelper.sDefaultButtonClass));
        obProductPageButton.removeClass(this.obRemoveHelper.sDefaultButtonClass);
        obProductPageButton.addClass(this.obAddHelper.sDefaultButtonClass);
        obProductPageButton.find(".".concat(this.productPageIconSelector)).removeClass(this.productPageIconClass);
      };

      return obRequestData;
    }).init();
  }

  restoreHandler() {
    this.obAddHelper.setButtonSelector(".".concat(this.restoreNodeSelector)).setAjaxRequestCallback((obRequestData, obButton) => {
      obRequestData.update = {
        'product/wish-list/wish-list-info/wish-list-info-button': ".".concat(this.sWishListCounterWrapper)
      };

      obRequestData.complete = () => {
        const iProductID = this.obAddHelper.getProductID(obButton);
        this.hideRestoreSection(obButton);
        /* eslint-enable */

        const obProductPageButton = $(".".concat(this.productPageWrapper, ".").concat(this.obAddHelper.sDefaultWrapperClass, "[").concat(this.obAddHelper.sAttributeName, "=").concat(iProductID, "]")).find(".".concat(this.obAddHelper.sDefaultButtonClass));
        obProductPageButton.removeClass(this.obAddHelper.sDefaultButtonClass);
        obProductPageButton.addClass(this.obRemoveHelper.sDefaultButtonClass);
        obProductPageButton.find(".".concat(this.productPageIconSelector)).addClass(this.productPageIconClass);
      };

      return obRequestData;
    }).init();
  }

  hideRestoreSection(restoreNode) {
    clearTimeout(this.removeTimer);
    const card = restoreNode.siblings(".".concat(this.cardSelector));
    card.removeClass(this.cardHiddenSelector);
    restoreNode.addClass(this.restoreHiddenNodeSelector).attr('aria-hidden', true).find(".".concat(this.restoreBtnSelector)).attr('tabindex', '-1');
  }

  showRestoreSection(card) {
    card.addClass(this.cardHiddenSelector);
    const restoreNode = card.siblings(".".concat(this.restoreNodeSelector));
    restoreNode.removeClass(this.restoreHiddenNodeSelector).attr('aria-hidden', false).find(".".concat(this.restoreBtnSelector)).attr('tabindex', '0').focus();
    this.removeTimer = setTimeout(() => {
      restoreNode.parent().remove();
    }, this.removeDelay);
  }

}());
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js")))

/***/ }),

/***/ 0:
/*!*******************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** multi ./themes/lovata-shopaholic-sneakers/common.js ./themes/lovata-shopaholic-sneakers/common.css ./themes/lovata-shopaholic-sneakers/pages/index.css ./themes/lovata-shopaholic-sneakers/pages/product.css ./themes/lovata-shopaholic-sneakers/pages/catalog.css ./themes/lovata-shopaholic-sneakers/pages/news-list.css ./themes/lovata-shopaholic-sneakers/pages/news-page.css ./themes/lovata-shopaholic-sneakers/pages/checkout.css ./themes/lovata-shopaholic-sneakers/pages/contact.css ***!
  \*******************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! /sr/apache/vivankovich.com/october/themes/lovata-shopaholic-sneakers/common.js */"./themes/lovata-shopaholic-sneakers/common.js");
__webpack_require__(/*! /sr/apache/vivankovich.com/october/themes/lovata-shopaholic-sneakers/common.css */"./themes/lovata-shopaholic-sneakers/common.css");
__webpack_require__(/*! /sr/apache/vivankovich.com/october/themes/lovata-shopaholic-sneakers/pages/index.css */"./themes/lovata-shopaholic-sneakers/pages/index.css");
__webpack_require__(/*! /sr/apache/vivankovich.com/october/themes/lovata-shopaholic-sneakers/pages/product.css */"./themes/lovata-shopaholic-sneakers/pages/product.css");
__webpack_require__(/*! /sr/apache/vivankovich.com/october/themes/lovata-shopaholic-sneakers/pages/catalog.css */"./themes/lovata-shopaholic-sneakers/pages/catalog.css");
__webpack_require__(/*! /sr/apache/vivankovich.com/october/themes/lovata-shopaholic-sneakers/pages/news-list.css */"./themes/lovata-shopaholic-sneakers/pages/news-list.css");
__webpack_require__(/*! /sr/apache/vivankovich.com/october/themes/lovata-shopaholic-sneakers/pages/news-page.css */"./themes/lovata-shopaholic-sneakers/pages/news-page.css");
__webpack_require__(/*! /sr/apache/vivankovich.com/october/themes/lovata-shopaholic-sneakers/pages/checkout.css */"./themes/lovata-shopaholic-sneakers/pages/checkout.css");
module.exports = __webpack_require__(/*! /sr/apache/vivankovich.com/october/themes/lovata-shopaholic-sneakers/pages/contact.css */"./themes/lovata-shopaholic-sneakers/pages/contact.css");


/***/ })

},[[0,"/js/manifest","/js/vendor"]]]);
//# sourceMappingURL=common.js.map