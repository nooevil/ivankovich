export default new class ProductTab {
  constructor() {
    this.linkTabSelector = 'product-descr__link';
    this.activeLinkTabSelector = 'product-descr__link_active';
    this.contentSelector = 'product-descr__content';
    this.invisibleContentSelector = 'product-descr__content_visually-hidden';

    this.init();
  }

  init() {
    $(document).on('click', `.${this.linkTabSelector}`, (e) => {
      e.preventDefault();

      const { target } = e;

      if ($(target).hasClass(this.activeLinkTabSelector)) return;

      this.showTab(target);
    });
  }

  hideTab() {
    const tabCollection = $(`.${this.linkTabSelector}`);
    const tabContentCollection = $(`.${this.contentSelector}`);

    [...tabCollection].forEach(tab => $(tab).removeClass(this.activeLinkTabSelector));
    [...tabContentCollection].forEach(el => $(el).addClass(this.invisibleContentSelector));
  }

  showTab(target) {
    const id = $(target).attr('href');
    const tabContent = $(id);

    this.hideTab();

    $(target).addClass(this.activeLinkTabSelector);

    tabContent.removeClass(this.invisibleContentSelector);
  }
}();
