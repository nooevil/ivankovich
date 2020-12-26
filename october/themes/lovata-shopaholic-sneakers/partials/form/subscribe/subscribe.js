export default new class Subscribe {
  constructor() {
    this.subscribeFormSelector = 'subscribe__form';
    this.subscribeInputSelector = 'subscribe__email';
    this.submitBtnSelector = 'subscribe__submit';
    this.inValidSelector = '_invalid';
    this.successSelector = 'subscribe__success';
    this.successVisibleSelector = 'subscribe__success_visible';
    this.preLoaderSelector = 'subscribe__preloader';
    this.delay = 2000;

    this.handler();
  }

  handler() {
    const form = document.querySelector(`.${this.subscribeFormSelector}`);

    if (!form) return;

    const submitBtn = form.querySelector(`.${this.submitBtnSelector}`);

    submitBtn.addEventListener('click', () => {
      setTimeout(() => {
        this.checkForm(form);
      }, 0);
    });
  }

  checkForm(form) {
    if (form.matches(`.${this.inValidSelector}`)) return;

    const input = form.querySelector(`.${this.subscribeInputSelector}`);
    const email = input.value;

    $.request('mailSignup::onSignup', {
      data: {
        email,
      },
      loading: `.${this.preLoaderSelector}`,
      complete: (res) => {
        this.showTooltip(res);
        setTimeout(() => {
          input.value = '';
          input.dispatchEvent(new Event('change', {
            bubbles: true,
          }));
        }, this.delay);
      },
    });
  }

  showTooltip(res) {
    const { statusText } = res;

    if (statusText !== 'OK') return;

    const successNode = this.getToolTip();

    successNode.classList.add(this.successVisibleSelector);

    setTimeout(() => {
      this.hideToolTip();
    }, this.delay);
  }

  hideToolTip() {
    const successNode = this.getToolTip();

    successNode.classList.remove(this.successVisibleSelector);
  }

  getToolTip() {
    return document.querySelector(`.${this.successSelector}`);
  }
}();
