const gpath 	  = require('./gulpfile.path.js');
const gulp        = require('gulp');
const rename      = require('gulp-rename');
const pump        = require('pump');
const removeFiles = require('gulp-remove-files');
const cleanCSS    = require('gulp-clean-css');
const uglify      = require('gulp-uglify');
const htmlmin     = require('gulp-htmlmin');
const imagemin    = require('gulp-imagemin');
const jsonMinify  = require('gulp-json-minify');
//noinspection JSAnnotator
const {phpMinify} = require('@cedx/gulp-php-minify');
const elixir      = require('laravel-elixir');
const assets      = gpath.assetsVendorResource(false, null);

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function (mix) {
    mix.less('app.less');
});

gulp.task('move-public-assets-vendor-1', function () {
    return gulp.src(assets.concat(gpath.assetsVendorResource(true, '*.{js,css,json,png,jpg,jpeg,gif,svg}')),
        {dot: true, base: './node_modules/'})
        .pipe(gulp.dest('./public/assets/vendor/'));
});

gulp.task('move-public-assets-vendor-2', function () {
    return gulp.src(gpath.assetsVendorResource(false, '*.min.{js,css,json}'), {dot: true, base: './node_modules/'})
        .pipe(gulp.dest('./public/assets/vendor/'));
});

gulp.task('minify-public-assets-vendor-img', function () {
    return gulp.src(gpath.assetsVendorResource(false, '*.{png,jpg,jpeg,gif,svg}'), {dot: true, base: './node_modules/'})
        .pipe(imagemin([imagemin.gifsicle({interlaced: true}), imagemin.jpegtran({progressive: true}), imagemin.optipng({optimizationLevel: 5})]))
        .pipe(gulp.dest('./public/assets/vendor/'));
});

gulp.task('minify-public-assets-vendor-js', function (cb) {
    pump([
            gulp.src(gpath.assetsVendorResource(false, '*.js')
                    .concat([
                        '!./node_modules/popper.js/**/popper-utils.js',
                        '!./node_modules/popper.js/**/popper.js'
                    ])
                    .concat(gpath.assetsVendorResource(true, '*.min.js')),
                {dot: true, base: './node_modules/'})
                .pipe(rename({suffix: ".min", extname: ".js"})),
            uglify(),
            gulp.dest('./public/assets/vendor/')],
        cb
    );
});

gulp.task('minify-public-assets-vendor-css', function () {
    return gulp.src(gpath.assetsVendorResource(false, '*.css').concat(gpath.assetsVendorResource(true, '*.min.css')),
        {dot: true, base: './node_modules/'})
        .pipe(rename({suffix: ".min", extname: ".css"}))
        .pipe(cleanCSS({compatibility: 'ie8', rebase: false}))
        .pipe(gulp.dest('./public/assets/vendor/'));
});

gulp.task('minify-public-assets-vendor-json', function () {
    return gulp.src(gpath.assetsVendorResource(false, '*.json').concat(gpath.assetsVendorResource(true, '*.min.json')),
        {dot: true, base: './node_modules/'})
        .pipe(rename({suffix: ".min", extname: ".json"}))
        .pipe(gulp.dest('./public/assets/vendor'));
});

gulp.task('move-public-1', function () {
    return gulp.src(['./raw/public/**', '!./raw/public/**/*.{js,css,json,png,jpg,jpeg,gif,svg}'],
        {dot: true, base: './raw/public/'})
        .pipe(gulp.dest('./public/'));
});

gulp.task('move-public-2', function () {
    return gulp.src(['./raw/public/**/*.min.{js,css,json}'], {dot: true, base: './raw/public/'})
        .pipe(gulp.dest('./public/'));
});

gulp.task('minify-public-img', function () {
    return gulp.src(['./raw/public/**/*.{png,jpg,jpeg,gif,svg}'], {dot: true, base: './raw/public/'})
        .pipe(imagemin([imagemin.gifsicle({interlaced: true}), imagemin.jpegtran({progressive: true}), imagemin.optipng({optimizationLevel: 5})]))
        .pipe(gulp.dest('./public/'));
});

gulp.task('minify-public-js', function (cb) {
    pump([
            gulp.src(['./raw/public/**/*.js', '!./raw/public/**/*.min.js'], {dot: true, base: './raw/public/'})
                .pipe(rename({suffix: ".min", extname: ".js"})),
            uglify(),
            gulp.dest('./public/')],
        cb
    );
});

gulp.task('minify-public-css', function () {
    return gulp.src(['./raw/public/**/*.css', '!./raw/public/**/*.min.css'], {dot: true, base: './raw/public/'})
        .pipe(rename({suffix: ".min", extname: ".css"})).pipe(cleanCSS({compatibility: 'ie8', rebase: false}))
        .pipe(cleanCSS({compatibility: 'ie8', rebase: false}))
        .pipe(gulp.dest('./public/'));
});

gulp.task('minify-public-json', function () {
    return gulp.src(['./raw/public/**/*.json', '!./raw/public/**/*.min.json'], {dot: true, base: './raw/public/'})
        .pipe(rename({suffix: ".min", extname: ".json"}))
        .pipe(jsonMinify())
        .pipe(gulp.dest('./public/'));
});

gulp.task('minify-resources-views-1', function () {
    return gulp.src(['./raw/resources/views/**/*.{php,blade.php,html}'], {dot: true, base: './raw/resources/views/'})
        .pipe(phpMinify({silent: true}))
        .pipe(htmlmin({
            collapseWhitespace: true,
            removeAttributeQuotes: true,
            processConditionalComments: true,
            removeComments: true,
            minifyJS: true,
            minifyCSS: true,
            removeScriptTypeAttributes: true,
            removeStyleLinkTypeAttributes: true
        }))
        .pipe(gulp.dest('./resources/views/'));
});

gulp.task('minify-resources-views-2', function () {
    return gulp.src(['./resources/views/**/*.{php,blade.php,html}'], {dot: true, base: './resources/views/'})
        .pipe(phpMinify({silent: true}))
        .pipe(htmlmin({
            collapseWhitespace: true,
            removeAttributeQuotes: true,
            processConditionalComments: true,
            removeComments: true,
            minifyJS: true,
            minifyCSS: true,
            removeScriptTypeAttributes: true,
            removeStyleLinkTypeAttributes: true
        }))
        .pipe(gulp.dest('./resources/views/'));
});

gulp.task('remove-unnecessary-file-1', function () {
    return gulp.src([
        './public/**/*.{js,css,json}',
        '!./public/**/*.min.{js,css,json}'
    ], {dot: true, base: './public/'})
        .pipe(removeFiles())
});

gulp.task('remove-unnecessary-file-2', function () {
    return gulp.src([
        './public/**/*.min.min.{js,css,json}',
        './public/**/*.{map,md,yml}'
    ], {dot: true, base: './public/'})
        .pipe(removeFiles())
});

gulp.task('remove-generated-file', function () {
    return gulp.src([
        './public/**',
        './resources/views/**',
        '!./resources/views/vendor/**'
    ], {dot: true, base: './public/assets/'})
        .pipe(removeFiles())
});
