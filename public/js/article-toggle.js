(function () {
    document.addEventListener('click', function (e) {
        var btn = e.target.closest('.article-toggle-btn');
        if (!btn) {
            return;
        }

        var detail = document.getElementById(btn.getAttribute('aria-controls'));
        if (!detail) {
            return;
        }

        var isOpen = detail.classList.toggle('is-open');
        btn.setAttribute('aria-expanded', isOpen);
        btn.innerHTML = (isOpen ? btn.dataset.closeLabel : btn.dataset.openLabel) + ' &rsaquo;';
    });
})();
