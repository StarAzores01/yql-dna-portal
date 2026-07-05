(function () {
    var bar = document.querySelector('.topic-filter-bar');
    if (!bar) {
        return;
    }

    var buttons = bar.querySelectorAll('.topic-filter-btn');
    var items = document.querySelectorAll('[data-topics]');

    function applyFilter(topic) {
        items.forEach(function (item) {
            if (topic === 'all') {
                item.style.display = '';
                return;
            }

            var topics = (item.getAttribute('data-topics') || '')
                .split(',')
                .map(function (t) { return t.trim().toLowerCase(); });

            item.style.display = topics.indexOf(topic.toLowerCase()) !== -1 ? '' : 'none';
        });
    }

    buttons.forEach(function (btn) {
        btn.addEventListener('click', function () {
            buttons.forEach(function (b) { b.classList.remove('active'); });
            btn.classList.add('active');
            applyFilter(btn.getAttribute('data-topic-filter'));
        });
    });
})();
