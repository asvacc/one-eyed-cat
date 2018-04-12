var gulp = require('gulp'),
    sass = require('gulp-sass'),
    autoprefixer = require('gulp-autoprefixer'),
    sourcemaps = require('gulp-sourcemaps'),
    notify = require("gulp-notify");

var input = 'assets/_scss/all.scss',
    output = 'assets/css';

gulp.task('sass', function () {
  return gulp.src(input)
    .pipe(sourcemaps.init())
    .pipe(sass({
        style: 'nested',
        errLogToConsole:false, 
    }))
    .on('error', function(err) {
        notify().write(err);
        this.emit('end');
    })
    .pipe(autoprefixer('last 2 version'))
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest(output))
    .pipe(notify({
        message:'Compiled successfully.',
        onLast: true
    })); 
});

gulp.task('default', function () {
  gulp.watch('assets/_scss/**/*.scss', ['sass']);
});