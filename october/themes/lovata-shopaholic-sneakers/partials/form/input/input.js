export default new class Input {
  constructor() {
    this.inputWrapSelector = 'input';
    this.inputWrapFilledSelector = 'input_filled';
    this.inputFieldSelector = 'input__field';
    this.inputFieldFilledSelector = 'input__field_filled';
    this.inputLabelSelector = 'input__label';
    this.inputLabelElevatedSelector = 'input__label_elevated';
    this.errorSelector = 'validation-error';

    this.handler();
  }

  handler() {
    const input = $(`.${this.inputFieldSelector}`);

    if (!input.length) return;

    $(document).on('focus', `.${this.inputFieldSelector}`, ({ target }) => {
      this.labelUp(target);
    });

    $(document).on('blur', `.${this.inputFieldSelector}`, ({ target }) => {
      this.labelDown(target);
      this.checkChange(target);
    });

    $(document).on('change', `.${this.inputFieldSelector}`, ({ target }) => {
      this.labelDown(target);
      this.checkChange(target);
    });
  }

  static checkInputState(input) {
    const value = $(input).val().trim();
    return value.length > 0;
  }

  checkChange(target) {
    if (!target.hasAttribute('required')) return;

    if ($(target).val().trim().length > 0) {
      $(target).addClass(this.inputFieldFilledSelector);
    } else {
      $(target).removeClass(this.inputFieldFilledSelector);
    }
  }

  findLabel(input) {
    return $(input).siblings(`.${this.inputLabelSelector}`);
  }

  labelUp(input) {
    this.findLabel(input).addClass(this.inputLabelElevatedSelector);
  }

  labelDown(input) {
    const inputState = this.constructor.checkInputState(input);

    if (!inputState) {
      this.findLabel(input).removeClass(this.inputLabelElevatedSelector);
    }
  }
}();
