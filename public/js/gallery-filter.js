(function () {
    var bar = document.querySelector('.gallery-filter-bar');
    if (!bar) {
        return;
    }

    var buttons = bar.querySelectorAll('.gallery-filter-btn');
    var items = document.querySelectorAll('.project-gallery-item');

    function applyFilter(filter) {
        items.forEach(function (item) {
            var matches = filter === 'all' || item.getAttribute('data-category') === filter;
            item.style.display = matches ? '' : 'none';
        });
    }

    buttons.forEach(function (btn) {
        btn.addEventListener('click', function () {
            buttons.forEach(function (b) { b.classList.remove('active'); });
            btn.classList.add('active');
            applyFilter(btn.getAttribute('data-filter'));
        });
    });
})();
