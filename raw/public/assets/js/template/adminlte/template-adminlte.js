// Let's register our serviceworker
navigator.serviceWorker.register('/assets/js/template/adminlte/service-worker.min.js', {
    // The scope cannot be parent to the script url
    scope: './template/adminlte/'
});