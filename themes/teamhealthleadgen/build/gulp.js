const gulp = require('gulp');

const cfg = require('./config');

const path = require('path');

const pkgs = {
    // General Packages
    bs: require('browser-sync').create(),
    // concat: require('gulp-concat'),
    del: require('del'),
    flatten: require('gulp-flatten'),
    plumber: require('gulp-plumber'),
    rename: require('gulp-rename'),
    sourcemaps: require('gulp-sourcemaps'),
    gulpif: require('gulp-if'),
    notify: require('gulp-notify'),
    runSequence: require('run-sequence'),
    // CSS Packages
    autoprefixer: require('gulp-autoprefixer'),
    sass: require('gulp-sass'),
    sassImport: require('node-sass-package-importer'),
    sassGlob: require('gulp-sass-glob'),
    cleanCSS: require('gulp-clean-css'),
    // JS Packages
    // babel: require('gulp-babel'),
    eslint: require('gulp-eslint'),
    uglify: require('gulp-uglify'),
    webpack: require('webpack-stream'),
    named: require('vinyl-named'), // using this to auto name files for webpack... supposedly.
    // Image Packages
    imagemin: require('gulp-imagemin'),
};

cfg.dir = {
    src: path.join(process.env.PWD, 'src'),
    dist: path.join(process.env.PWD, 'dist'),
};

cfg.fns = {
    envCheck: require('./functions/environmentCheck'),
    errorHandler: require('./functions/errorHandler'),
    fileNameFromPath: require('./functions/fileNameFromPath')
};

const tasks = {
    styles: require('./tasks/gulp.styles'),
    scripts: require('./tasks/gulp.scripts'),
    browserSync: require('./tasks/gulp.browserSync'),
    clean: require('./tasks/gulp.clean'),
    lint: require('./tasks/gulp.lint'),
    fonts: require('./tasks/gulp.fonts'),
    images: require('./tasks/gulp.images'),
};

gulp.task('styles', tasks.styles(gulp, pkgs, cfg));
gulp.task('lint', tasks.lint(gulp, pkgs, cfg));
gulp.task('scripts', ['lint'], tasks.scripts(gulp, pkgs, cfg));
gulp.task('fonts', tasks.fonts(gulp, pkgs, cfg));
gulp.task('images', tasks.images(gulp, pkgs, cfg));
gulp.task('clean:dist', tasks.clean(gulp, pkgs, cfg));
gulp.task('browserSync', tasks.browserSync(pkgs, cfg));

gulp.task('watch', ['browserSync'], () => {
    gulp.watch(`${cfg.dir.src}/styles/**/*`, ['styles']);
    gulp.watch(`${cfg.dir.src}/scripts/**/*.js`, ['scripts', pkgs.bs.reload]);
    gulp.watch(`${cfg.dir.src}/images/*`, ['images', pkgs.bs.reload]);
    gulp.watch(`${cfg.dir.src}/fonts/*`, ['fonts', pkgs.bs.reload]);
    gulp.watch(`${process.env.PWD}/**/*.twig`, pkgs.bs.reload);
    gulp.watch(`${process.env.PWD}/**/*.php`, pkgs.bs.reload);
    gulp.watch(`${process.env.PWD}/build/**/*`).on('change', () => {
        process.exit(0) // Kill gulp process if we edit our gulpfile
    });

    gulp.watch(`${process.env.PWD}/modules/**/*.scss`, ['styles']);
    gulp.watch(`${process.env.PWD}/modules/**/*.js`, ['scripts', pkgs.bs.reload]);
});

gulp.task('default', (callback) => {
    pkgs.runSequence('clean:dist', ['styles', 'scripts', 'images', 'fonts',], callback);
});