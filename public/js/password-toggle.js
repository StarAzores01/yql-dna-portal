(function () {
    document.addEventListener('click', function (e) {
        var btn = e.target.closest('.password-toggle-btn');
        if (!btn) return;

        var input = document.getElementById(btn.dataset.target);
        if (!input) return;

        var showIcon = btn.querySelector('.password-toggle-icon-show');
        var hideIcon = btn.querySelector('.password-toggle-icon-hide');
        var isHidden = input.type === 'password';

        input.type = isHidden ? 'text' : 'password';
        btn.setAttribute('aria-pressed', String(isHidden));
        btn.setAttribute('aria-label', isHidden ? 'Hide password' : 'Show password');
        if (showIcon) showIcon.style.display = isHidden ? 'none' : '';
        if (hideIcon) hideIcon.style.display = isHidden ? '' : 'none';
    });
})();
