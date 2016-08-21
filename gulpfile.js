var gulp = require('gulp');

// Import dependencies
var less = require('gulp-less'),
    recess = require('gulp-recess'),
    minifyCSS = require('gulp-minify-css'),
    path = require('path'),
    src = 'res/',
    dist = 'web/';

// Defining LESS tasks

gulp.task('less', function () {
    gulp.src(src + 'less/app.less')
        .pipe(recess()) // Linting CSS
        .pipe(less()) // Compile LESS
        .pipe(minifyCSS()) // Minify CSS
        .pipe(gulp.dest(dist + 'css'));
});

gulp.task('watch-less', function () {
    gulp.watch(src + '/less/*.less', ['less']);
});
