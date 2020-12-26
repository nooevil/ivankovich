import ShopaholicCouponAdd from '@lovata/shopaholic-coupon/shopaholic-coupon-add';
import ShopaholicCouponRemove from '@lovata/shopaholic-coupon/shopaholic-coupon-remove';
import ShopaholicCartShippingType from '@lovata/shopaholic-cart/shopaholic-cart-shipping-type';
import ShopaholicOrder from '@lovata/shopaholic-cart/shopaholic-order';

export default new class Cart {
  constructor() {
    this.obShopaholicCartShippingType = new ShopaholicCartShippingType();
    this.obShopaholicOrder = new ShopaholicOrder();
    this.obShopaholicCouponAdd = new ShopaholicCouponAdd();
    this.obShopaholicCouponRemove = new ShopaholicCouponRemove();

    this.tooltipClass = 'cart__coupon-tooltip';
    this.visibleTooltipClass = 'cart__coupon-tooltip_visible';
    this.sButtonClass = 'cart__coupon-btn';

    this.addButtonClass = '_shopaholic-coupon-add';
    this.removeButtonClass = '_shopaholic-coupon-remove';
    this.filledClass = 'input__field_disabled';

    this.initShippingType();
    this.initCreateOrder();

    this.initAddCoupon();
    this.initRemoveCoupon();
    this.initClickHandler();
  }

  initShippingType() {
    this.obShopaholicCartShippingType.init();
  }

  initCreateOrder() {
    document.addEventListener('bouncerFormValid', () => {
      this.obShopaholicOrder.create();
    });
  }

  initAddCoupon() {
    this.obShopaholicCouponAdd.setAjaxRequestCallback((obRequestData, obInput, obButton) => {
      obRequestData.complete = ({ responseJSON }) => { // eslint-disable-line no-param-reassign
        this.obShopaholicCouponAdd.completeCallback(responseJSON, obInput, obButton);
        if (responseJSON.status !== false) {
          obButton.classList.remove(this.addButtonClass);
          obButton.classList.add(this.removeButtonClass);
          obInput.classList.add(this.filledClass);
          obButton.innerHTML = 'Remove Coupon'; // eslint-disable-line no-param-reassign
        } else {
          this.errorHandler(responseJSON.message);
        }
      };
      return obRequestData;
    });
    this.obShopaholicCouponAdd.init();
  }

  initClickHandler() {
    $(document).on('click', `.${this.sButtonClass}`, () => {
      const errorTooltip = document.querySelector(`.${this.visibleTooltipClass}`);

      if (!errorTooltip) return;

      errorTooltip.classList.remove(this.visibleTooltipClass);
    });
  }

  errorHandler(message) {
    clearTimeout(this.timer);
    const tooltip = document.querySelector(`.${this.tooltipClass}`);
    tooltip.classList.add(this.visibleTooltipClass);
    tooltip.innerHTML = message;

    this.timer = setTimeout(() => {
      tooltip.classList.remove(this.visibleTooltipClass);
    }, 2000);
  }

  initRemoveCoupon() {
    this.obShopaholicCouponRemove.setAjaxRequestCallback((obRequestData, obInput, obButton) => {
      obRequestData.complete = ({ responseJSON }) => { // eslint-disable-line no-param-reassign
        if (responseJSON.status !== false) {
          this.obShopaholicCouponRemove.completeCallback(responseJSON, obInput, obButton);
          obButton.classList.add(this.addButtonClass);
          obButton.classList.remove(this.removeButtonClass);
          obInput.classList.remove(this.filledClass);
          obButton.innerHTML = 'Apply Coupon'; // eslint-disable-line no-param-reassign
        } else {
          this.errorHandler(responseJSON.message);
        }
      };
      return obRequestData;
    });
    this.obShopaholicCouponRemove.init();
  }
}();
