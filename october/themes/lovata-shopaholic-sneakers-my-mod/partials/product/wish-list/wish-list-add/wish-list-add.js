import ShopaholicAddWishList from '@lovata/shopaholic-wish-list/shopaholic-add-wish-list';
import ShopaholicRemoveWishList from '@lovata/shopaholic-wish-list/shopaholic-remove-wish-list';

export default new class WishListAdd {
  constructor() {
    this.iconClass = '_favorite';
    this.iconSelector = 'wish-list-add__icon';
    this.sWishListInfoWrapper = 'userbar__item_wish-list';
    this.isFavoriteSelector = 'wish-list-add_favorite';

    if ($(`.${this.sWishListInfoWrapper}`).length === 0) {
      return;
    }

    this.obAddHelper = new ShopaholicAddWishList();
    this.obRemoveHelper = new ShopaholicRemoveWishList();

    this.initAddHandler();
    this.initRemoveHandler();
  }

  /* eslint-disable no-param-reassign */
  initAddHandler() {
    this.obAddHelper.setAjaxRequestCallback((obRequestData, obButton) => {
      obRequestData.update = { 'product/wish-list/wish-list-info/wish-list-info': `.${this.sWishListInfoWrapper}` };
      obRequestData.complete = () => {
        obButton.removeClass(this.obAddHelper.sDefaultButtonClass);
        obButton.addClass(this.obRemoveHelper.sDefaultButtonClass);
        obButton.find(`.${this.iconSelector}`).addClass(this.iconClass);
        obButton.addClass(this.isFavoriteSelector);
      };

      return obRequestData;
    }).init();
  }

  initRemoveHandler() {
    this.obRemoveHelper.setAjaxRequestCallback((obRequestData, obButton) => {
      obRequestData.update = { 'product/wish-list/wish-list-info/wish-list-info': `.${this.sWishListInfoWrapper}` };
      obRequestData.complete = () => {
        obButton.removeClass(this.obRemoveHelper.sDefaultButtonClass);
        obButton.addClass(this.obAddHelper.sDefaultButtonClass);
        obButton.removeClass(this.isFavoriteSelector);
        obButton.find(`.${this.iconSelector}`).removeClass(this.iconClass);
      };

      return obRequestData;
    }).init();
  }
  /* eslint-enable */
}();
