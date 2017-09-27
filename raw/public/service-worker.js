// Chrome's currently missing some useful cache methods,
// this polyfill adds them.
importScripts('/assets/js/common/service-worker-cache-polyfill.min.js');

// Here comes the install event!
// This only happens once, when the browser sees this
// version of the ServiceWorker for the first time.
self.addEventListener('install', function (event) {
    // We pass a promise to event.waitUntil to signal how
    // long install takes, and if it failed
    event.waitUntil(
        // We open a cache…
        caches.open('t-cache').then(function (cache) {
            // And add resources to it
            return cache.addAll([
                '/service-worker.min.js',
                '/manifest.min.json',
                '/assets/vendor/bootstrap/dist/css/bootstrap.min.css',
                '/assets/vendor/bootstrap/dist/css/bootstrap-theme.min.css',
                '/assets/vendor/ionicons/dist/css/ionicons.min.css',
                '/assets/vendor/font-awesome/css/font-awesome.min.css',
                '/assets/vendor/admin-lte/dist/css/AdminLTE.min.css',
                '/assets/vendor/admin-lte/dist/css/skins/skin-black.min.css',
                '/assets/vendor/html5-boilerplate/dist/css/normalize.min.css',
                '/assets/vendor/html5-boilerplate/dist/css/main.min.css',
                '/assets/vendor/html5-boilerplate/dist/js/vendor/modernizr-3.5.0.min.js',
                '/assets/vendor/jquery/dist/jquery.min.js',
                '/assets/vendor/html5-boilerplate/dist/js/plugins.min.js',
                '/assets/vendor/bootstrap/dist/js/bootstrap.min.js',
                '/assets/vendor/fastclick/lib/fastclick.min.js',
                '/assets/vendor/admin-lte/dist/js/adminlte.min.js',
                '/assets/js/common/service-worker-logging.min.js'
            ]);
        })
    );
});

// The fetch event happens for the page request with the
// ServiceWorker's scope, and any request made within that
// page
self.addEventListener('fetch', function (event) {
    // Calling event.respondWith means we're in charge
    // of providing the response. We pass in a promise
    // that resolves with a response object
    event.respondWith(
        // First we look for something in the caches that
        // matches the request
        caches.match(event.request).then(function (response) {
            // If we get something, we return it, otherwise
            // it's null, and we'll pass the request to
            // fetch, which will use the network.
            return response || fetch(event.request);
        })
    );
});
