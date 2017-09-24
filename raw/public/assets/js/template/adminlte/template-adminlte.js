// Let's register our serviceworker
navigator.serviceWorker.register('/service-worker.min.js', {
    // The scope cannot be parent to the script url
    scope: '/'
});