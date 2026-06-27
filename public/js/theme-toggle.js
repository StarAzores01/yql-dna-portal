(function () {
    var STORAGE_KEY = 'yql-theme';

    function applyTheme(theme) {
        document.documentElement.setAttribute('data-theme', theme);
    }

    function getStoredTheme() {
        try {
            return localStorage.getItem(STORAGE_KEY);
        } catch (e) {
            return null;
        }
    }

    function storeTheme(theme) {
        try {
            localStorage.setItem(STORAGE_KEY, theme);
        } catch (e) {
            // localStorage unavailable (private mode, etc) - theme just won't persist
        }
    }

    // Apply saved preference (or OS preference) as early as possible.
    var saved = getStoredTheme();
    if (saved) {
        applyTheme(saved);
    } else if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
        applyTheme('dark');
    }

    window.YQL_toggleTheme = function () {
        var current = document.documentElement.getAttribute('data-theme') || 'light';
        var next = current === 'dark' ? 'light' : 'dark';
        applyTheme(next);
        storeTheme(next);
    };
})();
