module.exports = {
    assetsVendorResource: function(negated, mime)
    {
        return [
            (negated ? '!' : '') + './node_modules/jquery/dist/**' + (mime === null ? '' : '/' + mime),
            (negated ? '!' : '') + './node_modules/html5-boilerplate/dist/**' + (mime === null ? '' : '/' + mime),
            (negated ? '!' : '') + './node_modules/bootstrap/dist/**' + (mime === null ? '' : '/' + mime),
            (negated ? '!' : '') + './node_modules/popper.js/dist/**' + (mime === null ? '' : '/' + mime),
            (negated ? '!' : '') + './node_modules/font-awesome/css/**' + (mime === null ? '' : '/' + mime),
            (negated ? '!' : '') + './node_modules/font-awesome/fonts/**' + (mime === null ? '' : '/' + mime),
            (negated ? '!' : '') + './node_modules/jquery-slimscroll/**' + (mime === null ? '' : '/' + mime),
            (negated ? '!' : '') + './node_modules/nprogress/**' + (mime === null ? '' : '/' + mime),
            (negated ? '!' : '') + './node_modules/ionicons/dist/**' + (mime === null ? '' : '/' + mime),
            (negated ? '!' : '') + './node_modules/fastclick/lib/**' + (mime === null ? '' : '/' + mime),
            (negated ? '!' : '') + './node_modules/admin-lte/dist/**' + (mime === null ? '' : '/' + mime),
            (negated ? '!' : '') + './node_modules/semantic-generated/dist/**' + (mime === null ? '' : '/' + mime)
        ];
    }
}