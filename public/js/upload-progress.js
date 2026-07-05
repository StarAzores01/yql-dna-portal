// Shows a real upload progress bar for the document upload form using
// XMLHttpRequest (instead of a plain form POST that gives no feedback
// until the whole request finishes) — large files were feeling "stuck"
// with no indication of progress.
(function () {
    var form = document.getElementById('document-upload-form');
    if (!form) return;

    var submitBtn = form.querySelector('button[type="submit"]');
    var progressWrap = document.getElementById('upload-progress-wrap');
    var progressBar = document.getElementById('upload-progress-bar');
    var progressLabel = document.getElementById('upload-progress-label');

    form.addEventListener('submit', function (e) {
        var fileInput = form.querySelector('input[type="file"]');
        if (!fileInput || !fileInput.files.length) return; // let normal validation handle the empty case

        e.preventDefault();

        var xhr = new XMLHttpRequest();
        var formData = new FormData(form);

        xhr.open('POST', form.action, true);

        xhr.upload.addEventListener('progress', function (evt) {
            if (!evt.lengthComputable) return;
            var percent = Math.round((evt.loaded / evt.total) * 100);
            if (progressBar) progressBar.style.width = percent + '%';
            if (progressLabel) progressLabel.textContent = 'Uploading… ' + percent + '%';
        });

        xhr.addEventListener('load', function () {
            window.location.href = xhr.responseURL || form.action;
        });

        xhr.addEventListener('error', function () {
            if (progressLabel) progressLabel.textContent = 'Upload failed — please check your connection and try again.';
            if (submitBtn) submitBtn.disabled = false;
        });

        if (progressWrap) progressWrap.hidden = false;
        if (submitBtn) submitBtn.disabled = true;

        xhr.send(formData);
    });
})();
