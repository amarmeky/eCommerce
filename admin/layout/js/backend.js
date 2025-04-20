document.addEventListener("DOMContentLoaded", function () {
  // نحصل على كل الـ input اللي فيها placeholder
  const inputs = document.querySelectorAll('input[placeholder]');

  inputs.forEach(function(input) {
    // نخزن قيمة الـ placeholder الأصلية
    input.dataset.placeholder = input.placeholder;

    // عند focus (لما المستخدم يضغط على الحقل)
    input.addEventListener('focus', function () {
      input.placeholder = '';
    });

    // عند blur (لما يخرج من الحقل)
    input.addEventListener('blur', function () {
      input.placeholder = input.dataset.placeholder;
    });

    // عند مرور الماوس (hover)
    input.addEventListener('mouseenter', function () {
      if (document.activeElement !== input) {
        input.placeholder = '';
      }
    });

    // لما يشيل الماوس
    input.addEventListener('mouseleave', function () {
      if (document.activeElement !== input) {
        input.placeholder = input.dataset.placeholder;
      }
    });
  });
});
