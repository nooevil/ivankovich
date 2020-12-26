export default new class WysiwygTable {
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
    if (!$(`.${this.wysiwyg}`).length) return;

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

    [...tableCollection].forEach((el) => {
      if (!$(el).parent(`.${this.wysiwygTableWrapperClass}`).length) {
        $(this.wysiwygTable).wrap($wysiwygTableWrapper);
      }
    });
  }

  setPoster() {
    const videoList = $('video');

    [...videoList].forEach(el => $(el).attr('poster', this.posterUrl).attr('preload', 'none'));
  }

  imageDescription() {
    const image = $(`.${this.wysiwyg}`).find('img');

    const imageWithDescr = [...image].filter(img => $(img).attr('alt'));
    this.renderDescription(imageWithDescr);
  }

  addNodeForDescr() {
    const descrNode = document.createElement('div');
    descrNode.classList.add(this.wysiwygDescrClass);

    return descrNode;
  }

  renderDescription(nodeList) {
    [...nodeList].forEach((node) => {
      const text = $(node).attr('alt');
      const parent = $(node).parent();
      const nodeForText = $(this.addNodeForDescr());

      parent.addClass(this.wysiwygDescrParentClass);

      if (parent.find(`.${this.wysiwygDescrClass}`).length) return;

      nodeForText.html(text).appendTo(parent);
    });
  }
}();
