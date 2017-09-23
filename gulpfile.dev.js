const gulp        = require('gulp');
const watch       = require('gulp-watch');
const rename      = require('gulp-rename');
const shell       = require('gulp-shell');
const pump        = require('pump');
const removeFiles = require('gulp-remove-files');
const assets      = [
    ''
];

function assetsVendorResource(negated, mime)
{
    return [(negated ? '!' : '') + '' + mime
    ];
}

