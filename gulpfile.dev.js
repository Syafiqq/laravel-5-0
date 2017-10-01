const gpath       = require('./gulpfile.path.js');
const gulp        = require('gulp');
const watch       = require('gulp-watch');
const rename      = require('gulp-rename');
const shell       = require('gulp-shell');
const pump        = require('pump');
const removeFiles = require('gulp-remove-files');
const assets      = gpath.assetsVendorResource(false, null);


gulp.task('move-public-assets-vendor', function () {
    return gulp.src(assets, {dot: true, base: './node_modules/'})
        .pipe(gulp.dest('./public/assets/vendor/'));
});

gulp.task('minify-public-assets-vendor-img', function () {
    return gulp.src(gpath.assetsVendorResource(false, '*.{png,jpg,jpeg,gif,svg}'), {dot: true, base: './node_modules/'})
        .pipe(gulp.dest('./public/assets/vendor/'));
});

gulp.task('minify-public-assets-vendor-js', function (cb) {
    pump([
            gulp.src(gpath.assetsVendorResource(false, '*.js'), {dot: true, base: './node_modules/'})
                .pipe(rename({suffix: ".min", extname: ".js"})),
            gulp.dest('./public/assets/vendor/')],
        cb
    );
});

gulp.task('minify-public-assets-vendor-css', function () {
    return gulp.src(gpath.assetsVendorResource(false, '*.css'), {dot: true, base: './node_modules/'})
        .pipe(rename({suffix: ".min", extname: ".css"}))
        .pipe(gulp.dest('./public/assets/vendor/'));
});

gulp.task('minify-public-assets-vendor-json', function () {
    return gulp.src(gpath.assetsVendorResource(false, '*.json'), {dot: true, base: './node_modules/'})
        .pipe(rename({suffix: ".min", extname: ".json"}))
        .pipe(gulp.dest('./public/assets/vendor'));
});

gulp.task('move-public', function () {
    return gulp.src(['./raw/public/**'], {dot: true, base: './raw/public/'})
        .pipe(gulp.dest('./public/'));
});

gulp.task('minify-public-img', function () {
    return gulp.src(['./raw/public/**/*.{png,jpg,jpeg,gif,svg}'], {dot: true, base: './raw/public/'})
        .pipe(gulp.dest('./public/'));
});

gulp.task('minify-public-js', function (cb) {
    pump([
            gulp.src(['./raw/public/**/*.js'], {dot: true, base: './raw/public/'})
                .pipe(rename({suffix: ".min", extname: ".js"})),
            gulp.dest('./public/')],
        cb
    );
});

gulp.task('minify-public-css', function () {
    return gulp.src(['./raw/public/**/*.css'], {dot: true, base: './raw/public/'})
        .pipe(rename({suffix: ".min", extname: ".css"}))
        .pipe(gulp.dest('./public/'));
});

gulp.task('minify-public-json', function () {
    return gulp.src(['./raw/public/**/*.json'], {dot: true, base: './raw/public/'})
        .pipe(rename({suffix: ".min", extname: ".json"}))
        .pipe(gulp.dest('./public/'));
});

gulp.task('minify-resources-views', function () {
    return gulp.src(['./raw/resources/views/**/*.{php,blade.php,html}'], {dot: true, base: './raw/resources/views/'})
        .pipe(gulp.dest('./resources/views/'));
});

gulp.task('watch-public-img', function () {
    var path = ['./raw/public/**/*.{png,jpg,jpeg,gif,svg}'];
    return watch(path, function () {
        return gulp.src(path, {dot: true, base: './raw/public/'})
            .pipe(gulp.dest('./public/'));
    });
});

gulp.task('watch-public-js', function () {
    var path = ['./raw/public/**/*.js'];
    return watch(path, function (cb) {
        pump([
                gulp.src(path, {dot: true, base: './raw/public/'})
                    .pipe(rename({suffix: ".min", extname: ".js"})),
                gulp.dest('./public/')],
            cb
        );
    });
});

gulp.task('watch-public-css', function () {
    var path = ['./raw/public/**/*.css'];
    return watch(path, function () {
        return gulp.src(path, {dot: true, base: './raw/public/'})
            .pipe(rename({suffix: ".min", extname: ".css"}))
            .pipe(gulp.dest('./public/'));
    });
});

gulp.task('watch-public-json', function () {
    var path = ['./raw/public/**/*.json'];
    return gulp.src(path, {dot: true, base: './raw/public/'})
        .pipe(rename({suffix: ".min", extname: ".json"}))
        .pipe(gulp.dest('./public/'));
});

gulp.task('watch-resources-views', function () {
    var path = ['./raw/resources/views/**/*.{php,blade.php,html}'];
    return watch(path, function () {
        return gulp.src(path, {dot: true, base: './raw/resources/views/'})
            .pipe(gulp.dest('./resources/views/'));
    });
});

gulp.task('remove-generated-file', function () {
    return gulp.src([
        './public/**',
        './resources/views/**',
        '!./resources/views/vendor/**',
        '!./public/assets/vendor/**',
    ], {dot: true, base: './public/assets/'})
        .pipe(removeFiles())
});

gulp.task('remove-generated-file-vendor', function () {
    return gulp.src([
        './public/assets/vendor/**',
    ], {dot: true, base: './public/assets/'})
        .pipe(removeFiles())
});
