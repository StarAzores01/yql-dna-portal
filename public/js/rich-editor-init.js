// Wires a Quill.js rich-text editor to a hidden textarea so its HTML output
// submits with the surrounding form like any other field. Quill itself is
// loaded via CDN on the specific pages that need it (see blog-posts/articles
// create/edit views) — this project has no build step, so no bundling.
(function () {
    function initRichEditor(editorId, textareaId) {
        var editorEl = document.getElementById(editorId);
        var textareaEl = document.getElementById(textareaId);
        if (!editorEl || !textareaEl || typeof Quill === 'undefined') return;

        var quill = new Quill(editorEl, {
            theme: 'snow',
            modules: {
                toolbar: [
                    ['bold', 'italic', 'underline'],
                    [{ header: [2, 3, false] }],
                    [{ list: 'ordered' }, { list: 'bullet' }],
                    ['link'],
                    ['clean']
                ]
            }
        });

        if (textareaEl.value) {
            quill.clipboard.dangerouslyPasteHTML(textareaEl.value);
        }

        var form = textareaEl.closest('form');
        if (form) {
            form.addEventListener('submit', function () {
                textareaEl.value = quill.root.innerHTML;
            });
        }
    }

    window.YQL_initRichEditor = initRichEditor;
})();
