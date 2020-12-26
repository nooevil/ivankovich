import UpdateInfo from '../shopaholic-cart/components/shopaholic-update-info';

export default class ShopaholicCoupon {
  constructor() {
    this.sCouponWrapClass = '_shopaholic_coupon-wrapper';
    this.sCouponBtnClass = '_shopaholic-coupon-submit';
    this.sCouponInputClass = '_shopaholic_coupon-input';

    this.addCouponHandler = 'Cart::onAddCoupon';
    this.removeCouponHandler = 'Cart::onRemoveCoupon';

    this.statusAttr = 'data-shopaholic-coupon';

    this.obAjaxRequestCallback = {};
    this.addCallbackFunc = null;
    this.removeCallbackFunc = null;
  }

  initClickHandler() {
    $(document).on('click', `.${this.sCouponBtnClass}`, (e) => {
      e.preventDefault();
      const { currentTarget } = e;
      const wrapper = currentTarget.closest(`.${this.sCouponWrapClass}`);
      const input = wrapper.querySelector(`.${this.sCouponInputClass}`);
      const { value } = input;

      if (!value) return;

      const hasCode = !input.hasAttribute(this.statusAttr);

      this.getRequestMethod(hasCode, input);
    });
  }

  getRequestMethod(hasCode, input) {
    if (hasCode) {
      this.addCouponRequest(input);
    } else {
      this.removeCouponRequest(input);
    }
  }

  addCouponRequest(input) {
    const { value } = input;
    const data = {
      coupon: value,
    };
    $.request(this.addCouponHandler, {
      data,
      complete: ({ responseJSON }) => {
        this.obCartData = responseJSON;
        this.updateInfo = new UpdateInfo(['data-price'], this.obCartData.data);

        if (this.addCallbackFunc !== null) {
          this.addCallbackFunc();
        }
      },
    });
  }

  removeCouponRequest(input) {
    const { value } = input;
    const data = {
      coupon: value,
    };
    $.request(this.removeCouponHandler, {
      data,
      complete: ({ responseJSON }) => {
        this.obCartData = responseJSON;
        this.updateInfo = new UpdateInfo(['data-price'], this.obCartData.data);

        if (this.removeCallbackFunc !== null) {
          this.removeCallbackFunc();
        }
      },
    });
  }

  set obRequestData(obj) {
    const keys = Object.keys(obj);

    keys.forEach((key) => {
      this.obAjaxRequestCallback[key] = obj[key];
    });
  }

  get obRequestData() {
    return this.obAjaxRequestCallback;
  }
}
