export default new class ReviewList {
  constructor() {
    this.sButtonClass = 'review-list__more';
    this.sListWrapper = 'review-list';
    this.preloaderSelector = 'review-list__preloader';

    this.init();
  }

  init() {
    $(document).on('click', `.${this.sButtonClass}`, (obEvent) => {
      const obButton = $(obEvent.currentTarget);
      const iPage = parseInt(obButton.attr('data-page'), 10);
      const iNextPage = iPage + 1;
      const iMaxPage = parseInt(obButton.attr('data-max-page'), 10);

      this.sendAjax(iNextPage);

      if (iNextPage >= iMaxPage) {
        obButton.remove();
      } else {
        obButton.attr('data-page', iNextPage);
      }
    });
  }

  sendAjax(iNextPage) {
    $.request('ProductData::onAjaxRequest', {
      data: { page: iNextPage },
      update: { 'content/review/review-list/review-list-ajax': `@.${this.sListWrapper}` },
      loading: `.${this.preloaderSelector}`,
    });
  }
}();
