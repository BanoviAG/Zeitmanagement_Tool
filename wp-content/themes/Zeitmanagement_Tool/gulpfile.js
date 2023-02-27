function defaultTask(cb) {
    cb();
}

exports.default = defaultTask

'use strict';

var gulp = require('gulp');
var sass = require('gulp-sass')(require('sass'));

sass.compiler = require('node-sass');

gulp.task('sass', function () {
  return gulp.src('assets/sass/app.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(gulp.dest('assets/sass'));
});

gulp.task('watch', function () {
  gulp.watch(['assets/sass/**/*.scss'], gulp.series(['sass'], function(done) {
    done()
  }))
});