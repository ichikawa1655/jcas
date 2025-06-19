document.addEventListener('DOMContentLoaded', function () {
  const fakeCheckbox = document.querySelector('.js-fake-checkbox');
  const realCheckbox = document.querySelector('input[name="agree_check[]"]');
  const formSubmitWrapper = document.querySelector('.form_submit');
  const submitButton = document.querySelector('.wpcf7-submit');

  // 初期化：未チェックにする（履歴対策）
  if (fakeCheckbox && realCheckbox) {
    fakeCheckbox.checked = false;
    realCheckbox.checked = false;

    // 同期
    fakeCheckbox.addEventListener('change', function () {
      realCheckbox.checked = fakeCheckbox.checked;
      toggleSubmitButton();
    });
  }

  // submitの有効・無効を制御
  const toggleSubmitButton = () => {
    if (submitButton && formSubmitWrapper) {
      const isChecked = realCheckbox.checked;
      submitButton.disabled = !isChecked;
      formSubmitWrapper.classList.toggle('is-disabled', !isChecked);
    }
  };

  // 初期状態でも反映
  toggleSubmitButton();

  // エラーメッセージをカスタム位置へ移動
  document.addEventListener('wpcf7invalid', function () {
    const form = document.querySelector('.wpcf7-form');
    const realWrapper = form?.querySelector('.wpcf7-form-control-wrap.agree_check');
    const errorTip = realWrapper?.querySelector('.wpcf7-not-valid-tip');
    const fakeWrapper = document.querySelector('.custom-checkbox-wrapper');

    // 重複防止
    if (errorTip && fakeWrapper && !fakeWrapper.contains(errorTip)) {
      fakeWrapper.appendChild(errorTip);
    }
  });
});
