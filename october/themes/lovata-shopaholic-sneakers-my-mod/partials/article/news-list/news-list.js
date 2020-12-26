import LazyLoad from '../../../js/lazy-load';

export default new class NewsList {
  constructor() {
    this.tabBtnSelector = 'news-list__btn';
    this.tabActiveRtnSelector = 'news-list__btn_active';
    this.ajaxWrapperSelector = 'news-list__wrapper';
    this.preLoaderSelector = 'news-list__preloader';

    this.init();
  }

  init() {
    this.tabCollection = document.querySelectorAll(`.${this.tabBtnSelector}`);

    if (!this.tabCollection) return;

    [...this.tabCollection].forEach(el => this.clickHandler(el));
  }

  clickHandler(button) {
    button.addEventListener('click', () => {
      if (button.matches(`.${this.tabActiveRtnSelector}`)) return;

      const { id } = button.dataset;

      this.updateList(id, button);
    });
  }

  updateList(id, button) {
    const $this = this;
    $.request('ArticleList::onAjaxRequest', {
      data: {
        category_id: id,
      },
      update: { 'article/news-list/news-list-ajax': `.${this.ajaxWrapperSelector}` },
      success: function (res) { // eslint-disable-line object-shorthand, func-names
        this.success(res);
        $this.changeActiveTab(button);
        LazyLoad.update();
      },
      loading: `.${this.preLoaderSelector}`,
    });
  }

  changeActiveTab(button) {
    [...this.tabCollection].forEach(el => el.classList.remove(this.tabActiveRtnSelector));

    button.classList.add(this.tabActiveRtnSelector);
  }
}();
