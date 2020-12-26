import ShopaholicCart from '@lovata/shopaholic-cart/shopaholic-cart';

export default new class UserBar {
  constructor() {
    this.sCartInfoWrapper = '_shopaholic-cart-mini-wrapper';
    this.sWishListInfoWrapper = 'userbar__item_wish-list';

    const obRequest = { update: { 'product/cart/cart-mini/cart-info/cart-info': `.${this.sCartInfoWrapper}` } };
    ShopaholicCart.instance(obRequest);
    if ($(`.${this.sWishListInfoWrapper}`).length > 0) {
      this.updateWishListInfo();
    }
  }

  updateWishListInfo() {
    $.request('ProductList::onAjaxRequest', {
      update: { 'product/wish-list/wish-list-info/wish-list-info': `.${this.sWishListInfoWrapper}` },
    });
  }
}();
