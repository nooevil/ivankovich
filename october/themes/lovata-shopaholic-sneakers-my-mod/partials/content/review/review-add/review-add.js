import Helper from '@lovata/popup-helper';

export default new class ReviewModal {
  constructor() {
    this.drawerOpenNavSelector = 'review-add_visible';
    this.drawerNavSelector = 'review-add';
    this.drawerContainerSelector = 'review-add__container';
    this.modalContentWrapperSelector = 'review-add__wrapper';
    this.drawerBtnSelector = 'js-review-modal';
    this.drawerCloseBtnSelector = 'review-add__close-btn';
    this.duplicateCloseSelector = 'review-form__close';
    this.linkSelector = 'rating__review-count-wrap';
    this.submitSelector = 'review-form__submit';
    this.formSelector = 'review-form';
    this.invalidSelector = '_invalid';

    this.labelSelector = 'review-form__label';
    this.preHoverLabelSelector = 'review-form__label_pre-hover';
    this.afterHoverLabelSelector = 'review-form__label_after-hover';
    this.preCheckedLabelSelector = 'review-form__label_pre-checked';
    this.inputSelector = 'review-form__input';

    this.tooltipSelector = 'review-form__tooltip';
    this.tooltipVisibleSelector = 'review-form__tooltip_visible';

    this.preLoaderSelector = 'review-add__preloader';

    this.scrollDuration = 400;
    this.messageClearDelay = 2000;

    this.isLoad = false;

    this.handler();
    this.chooseRating();
    this.scrollTo();
  }

  handler() {
    $(document).ready(() => {
      const btn = document.querySelector(`.${this.drawerCloseBtnSelector}`);
      const modal = document.querySelector(`.${this.drawerNavSelector}`);

      $(document).on('click', `.${this.drawerBtnSelector}`, (e) => {
        if (!this.isLoad) {
          this.loadPopupContent();
        }

        this.togglePopup(e, modal);
      });

      $(document).on('click', `.${this.duplicateCloseSelector}`, () => {
        btn.click();
      });

      $(document).on('click', `.${this.drawerNavSelector}`, (event) => {
        if (event.target.matches('.review-add')) {
          document.querySelector('.overlay').click();
        }
      });

      $(document).on('click', `.${this.submitSelector}`, () => {
        clearTimeout(this.timer);
        this.hideTooltip();
        setTimeout(() => {
          const form = document.querySelector(`.${this.formSelector}`);
          const isValid = !form.classList.contains(this.invalidSelector);

          if (!isValid) return;

          $(form).request('MakeReview::onCreate', {
            complete: (res) => {
              this.completeHandler(res);
            },
          });
        }, 0);
      });

      $(window).on('load', () => {
        if (this.isLoad) return;

        this.loadPopupContent();
      });

      this.setRating();
    });
  }

  completeHandler(response) {
    const { responseJSON } = response;

    if (!responseJSON) return;

    const { status, message } = responseJSON;

    if (!status) {
      this.showTooltip(message);
    } else {
      $.request('onAjax', {
        update: {
          'content/review/review-add/review-add-success': `.${this.drawerContainerSelector}`,
        },
        loading: `.${this.preLoaderSelector}`,
      });
    }
  }

  showTooltip(message) {
    const tooltip = $(`.${this.tooltipSelector}`);

    tooltip.addClass(this.tooltipVisibleSelector).text(message);

    this.timer = setTimeout(() => {
      this.hideTooltip();
    }, this.messageClearDelay);
  }

  hideTooltip() {
    const tooltip = $(`.${this.tooltipSelector}`);
    tooltip.removeClass(this.tooltipVisibleSelector).text('');
  }

  loadPopupContent() {
    $.request('onAjax', {
      update: {
        'form/review-form/review-form': `.${this.modalContentWrapperSelector}`,
      },
      success: () => {
        this.isLoad = true;
      },
    });
  }

  togglePopup(eventObject, popup) {
    eventObject.preventDefault();

    const { currentTarget } = eventObject;
    const isOpen = $(popup).hasClass(this.drawerOpenNavSelector);

    Helper.setBodyScrollState(isOpen);
    Helper.overlayHandler(!isOpen, currentTarget, popup);

    $(popup).toggleClass(this.drawerOpenNavSelector);
    Helper.focusTrapManager(!isOpen, popup);
  }

  scrollTo() {
    $(document).on('click', `.${this.linkSelector}`, (e) => {
      e.preventDefault();

      const { currentTarget } = e;
      const id = $(currentTarget).attr('href');

      if (!id.length) return;

      const target = $(id);

      if (!target.length) return;

      const offsetTop = target.offset().top;
      const correctionFactor = target
        .parent()
        .height();
      const scrollDistance = offsetTop - correctionFactor;

      if (!offsetTop) return;

      $('html, body').animate({ scrollTop: scrollDistance }, this.scrollDuration);
    });
  }

  setRating() {
    $(document).on('mouseenter', `.${this.labelSelector}`, ({ currentTarget }) => {
      this.indicateInterval(currentTarget);
    });

    $(document).on('mouseleave', `.${this.labelSelector}`, () => {
      this.clearRating();
    });

    $(document).on('click', `.${this.inputSelector}`, () => {
      this.chooseRating();
    });
  }

  clearRating() {
    $(`.${this.labelSelector}`)
      .removeClass(this.preHoverLabelSelector)
      .removeClass(this.afterHoverLabelSelector);
  }

  indicateInterval(node) {
    this.clearRating();
    const prevElm = $(node).prevAll(`.${this.labelSelector}`);
    const nextElm = $(node).nextAll(`.${this.labelSelector}`);

    $(node).addClass(this.preHoverLabelSelector);
    prevElm.addClass(this.preHoverLabelSelector);
    nextElm.addClass(this.afterHoverLabelSelector);
  }

  chooseRating() {
    const radioCollection = $(`.${this.inputSelector}`);

    $(`.${this.labelSelector}`).removeClass(this.preCheckedLabelSelector);

    const checked = [...radioCollection].filter(el => $(el).prop('checked'));
    if (!checked.length) return;

    const id = checked[0].getAttribute('id');
    const label = $(`[for="${id}"]`);
    const prevElm = label.prevAll(`.${this.labelSelector}`);

    prevElm.addClass(this.preCheckedLabelSelector);
    label.addClass(this.preCheckedLabelSelector);
  }
}();
