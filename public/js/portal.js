(function () {
    'use strict';

    /* ── Toast Notifications ─────────────────────────────────── */
    var toastContainer;

    function getContainer() {
        if (!toastContainer) toastContainer = document.getElementById('toast-container');
        return toastContainer;
    }

    window.YQL_showToast = function (message, type) {
        type = type || 'success';
        var container = getContainer();
        if (!container) return;

        var icons = { success: '✓', error: '✕', info: 'ℹ' };
        var toast = document.createElement('div');
        toast.className = 'toast toast-' + type;
        toast.setAttribute('role', 'status');
        toast.setAttribute('aria-live', 'polite');
        toast.innerHTML =
            '<span class="toast-icon">' + (icons[type] || '✓') + '</span>' +
            '<span class="toast-text">' + message + '</span>' +
            '<span class="toast-close" aria-label="Dismiss">✕</span>';

        toast.addEventListener('click', function () { dismissToast(toast); });
        container.appendChild(toast);

        var timer = setTimeout(function () { dismissToast(toast); }, 4500);
        toast._timer = timer;
    };

    function dismissToast(toast) {
        clearTimeout(toast._timer);
        toast.classList.add('toast-out');
        setTimeout(function () {
            if (toast.parentNode) toast.parentNode.removeChild(toast);
        }, 320);
    }

    /* ── Server-side flash toast ──────────────────────────────── */
    function initFlashToast() {
        var el = document.getElementById('flash-toast-data');
        if (!el) return;
        var msg  = el.getAttribute('data-message');
        var type = el.getAttribute('data-type') || 'success';
        if (msg && msg.trim()) window.YQL_showToast(msg, type);
    }

    /* ── Download Tracker ────────────────────────────────────── */
    var PREFIX = 'yql_dl_';

    function markDownloaded(id) {
        try { localStorage.setItem(PREFIX + id, '1'); } catch (e) {}
    }

    function wasDownloaded(id) {
        try { return !!localStorage.getItem(PREFIX + id); } catch (e) { return false; }
    }

    function applyBadge(link) {
        var cell = link.closest('td') || link.parentNode;
        if (!cell || cell.querySelector('.downloaded-badge')) return;
        var badge = document.createElement('span');
        badge.className = 'downloaded-badge';
        badge.innerHTML = '&#10003; Downloaded';
        cell.insertBefore(badge, link.nextSibling);
    }

    function applyDownloadBadges() {
        document.querySelectorAll('[data-download-id]').forEach(function (link) {
            if (wasDownloaded(link.getAttribute('data-download-id'))) applyBadge(link);
        });
    }

    function initDownloadTracking() {
        document.addEventListener('click', function (e) {
            var link = e.target.closest('[data-download-id]');
            if (!link) return;
            var id = link.getAttribute('data-download-id');
            markDownloaded(id);
            applyBadge(link);
            setTimeout(function () { window.YQL_showToast('Downloaded successfully.', 'success'); }, 700);
        });
    }

    /* ── Custom Confirm Modal ────────────────────────────────── */
    var pendingForm = null;

    function initConfirmModal() {
        var overlay  = document.getElementById('confirm-overlay');
        if (!overlay) return;
        var msgEl    = document.getElementById('confirm-modal-msg');
        var submsgEl = document.getElementById('confirm-modal-submsg');
        var okBtn    = document.getElementById('confirm-ok');
        var cancelBtn = document.getElementById('confirm-cancel');

        document.addEventListener('submit', function (e) {
            var form = e.target;
            var confirmMsg = form.getAttribute('data-confirm');
            if (!confirmMsg) return;
            e.preventDefault();
            pendingForm = form;
            if (msgEl)    msgEl.textContent    = form.getAttribute('data-confirm-title') || 'Are you sure?';
            if (submsgEl) submsgEl.textContent = confirmMsg;
            overlay.removeAttribute('hidden');
            if (okBtn) okBtn.focus();
        });

        function closeModal() {
            overlay.setAttribute('hidden', '');
            pendingForm = null;
        }

        if (okBtn) {
            okBtn.addEventListener('click', function () {
                var form = pendingForm;
                closeModal();
                if (form) {
                    form.removeAttribute('data-confirm');
                    form.submit();
                }
            });
        }
        if (cancelBtn) cancelBtn.addEventListener('click', closeModal);
        overlay.addEventListener('click', function (e) {
            if (e.target === overlay) closeModal();
        });
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && !overlay.hasAttribute('hidden')) closeModal();
        });
    }

    /* ── Instruction Panel Toggle ────────────────────────────── */
    function initInstructionPanels() {
        document.addEventListener('click', function (e) {
            var btn = e.target.closest('.instruction-panel-toggle');
            if (!btn) return;
            var expanded = btn.getAttribute('aria-expanded') === 'true';
            var body     = document.getElementById(btn.getAttribute('aria-controls'));
            btn.setAttribute('aria-expanded', String(!expanded));
            if (body) body.classList.toggle('is-open', !expanded);
        });
    }

    /* ── Copy Password ───────────────────────────────────────── */
    function initCopyPassword() {
        document.addEventListener('click', function (e) {
            var btn = e.target.closest('.pw-copy-btn');
            if (!btn) return;
            var target = document.getElementById(btn.getAttribute('data-copy-target'));
            if (!target) return;
            var text = target.textContent.trim();
            if (navigator.clipboard && navigator.clipboard.writeText) {
                navigator.clipboard.writeText(text).then(function () {
                    window.YQL_showToast('Password copied to clipboard.', 'info');
                });
            } else {
                var ta = document.createElement('textarea');
                ta.value = text; ta.style.position = 'fixed'; ta.style.opacity = '0';
                document.body.appendChild(ta);
                ta.select();
                try { document.execCommand('copy'); } catch (err) {}
                document.body.removeChild(ta);
                window.YQL_showToast('Password copied to clipboard.', 'info');
            }
        });
    }

    /* ── Init ─────────────────────────────────────────────────── */
    document.addEventListener('DOMContentLoaded', function () {
        initFlashToast();
        applyDownloadBadges();
        initDownloadTracking();
        initConfirmModal();
        initInstructionPanels();
        initCopyPassword();
    });

})();
