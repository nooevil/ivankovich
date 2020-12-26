import ShopaholicSearch from '@lovata/shopaholic-search';
import Helper from '@lovata/popup-helper';

export default new class Search {
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
    this.obSearchHelper = new ShopaholicSearch();
    this.obSearchHelper.setAjaxRequestCallback((obRequest) => {
      /* eslint-disable no-param-reassign */
      obRequest.update = { 'header/search/search-panel/search-panel-result': `.${this.searchResultWrapper}` };
      obRequest.loading = this.preLoaderSelector;
      /* eslint-enable */

      return obRequest;
    });
    this.obSearchHelper.init();
  }

  handler() {
    const modal = document.querySelector(`.${this.panelSelector}`);

    $(document).on('click', `.${this.drawerBtnSelector}`, ({ currentTarget }) => {
      const btn = document.querySelector(`.${this.drawerCloseSelector}`);
      const panel = $(currentTarget).parents(`.${this.drawerParentSelector}`).children(`.${this.panelSelector}`);
      const isOpen = !panel.hasClass(this.panelOpenSelector);

      Helper.setBodyScrollState(isOpen);
      Helper.overlayHandler(!isOpen, btn, modal);

      panel.toggleClass(this.panelOpenSelector);

      setTimeout(() => {
        Helper.focusTrapManager(!isOpen, modal);
      }, 300);
      this.clearSearchInput(isOpen);
    });
  }

  clearSearchInput(isOpen) {
    if (!isOpen) return;

    $(`.${this.searchInputSelector}`).val('');

    const searchResultWrapper = $(`.${this.searchResultWrapper}`);

    const childrenNode = searchResultWrapper.children();

    if (!childrenNode.length) return;

    childrenNode.remove();
  }
}();
