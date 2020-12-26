import UrlGeneration from '@lovata/url-generation';
import Helper from '@lovata/popup-helper';
import FilterPanel from '../catalog-list/catalog-list';

export default new class filterDrawer {
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
    const btn = document.querySelector(`.${this.drawerCloseSelector}`);

    $(document).on('click', `.${this.drawerBtnSelector}`, ({ currentTarget }) => {
      this.clickHandler(currentTarget);
    });

    $(document).on('click', `.${this.resetBtnSelector}`, () => {
      UrlGeneration.clear();
      FilterPanel.updateFilterPanelAjax().send();
    });

    $(document).on('click', `.${this.submitSelector}`, (e) => {
      e.preventDefault();
      const overlay = Helper.getOverlay();

      if (!overlay) return;

      overlay.click();
    });

    this.mediaQueryList.addListener(() => {
      this.resizeHandler(btn);
    });
  }

  clickHandler(eventTarget) {
    const panel = $(eventTarget).parents(`.${this.drawerParentSelector}`).find(`.${this.panelSelector}`);
    const focusTarget = $(eventTarget).hasClass(this.drawerOpenBtnSelector)
      ? document.querySelector(`.${this.drawerCloseSelector}`)
      : document.querySelector(`.${this.drawerOpenBtnSelector}`);
    const isOpen = panel.hasClass(this.panelOpenSelector);

    Helper.setBodyScrollState(isOpen);
    Helper.overlayHandler(!isOpen, focusTarget, panel[0]);

    panel.toggleClass(this.panelOpenSelector);
    Helper.focusTrapManager(!isOpen, panel[0]);

    this.constructor.updateCatalog(isOpen);
  }

  resizeHandler(triggerNode) {
    const vpCondition = this.mediaQueryList.matches;
    const modalCondition = $(`.${this.panelSelector}`).hasClass(this.panelOpenSelector);

    if (vpCondition && modalCondition) {
      triggerNode.click();
    }
  }

  static updateCatalog(isOpen) {
    if (!isOpen) return;

    const updateAll = FilterPanel.updateAllAjax();
    updateAll.send();
  }
}();
