let gulp = require('gulp');
let concat = require('gulp-concat');
let plumber = require('gulp-plumber');
let strip = require('gulp-strip-comments');
let browserify = require('gulp-browserify');
let minify = require('gulp-minify');

let config = require('../config');

gulp.task('js-external', function(){
    return gulp.src([
        config.plugins + 'jquery/dist/jquery.min.js',
        config.plugins + 'bootstrap/dist/js/bootstrap.min.js',
        config.plugins + 'sweetalert/dist/sweetalert.min.js'
    ])
        .pipe(plumber())
        .pipe(concat('external.js'))
        .pipe(gulp.dest(config.targetDir + 'js'));
});

gulp.task('js', function(){
  return gulp.src(config.sourceDir + 'js/app.js')
    .pipe(plumber())
    .pipe(browserify({
      insertGlobals: true,
      debug: true
    }))
    .pipe(strip())
    .pipe(minify({
      noSource: true
    }))
    .pipe(concat('bundle.js'))
    .pipe(gulp.dest('web/js/'))
    ;
});


gulp.task('watch:js', () => {
    gulp.watch(config.sourceDir + 'js/**/*.js', ['js']);
});

let GR = require('kisphp-gulp-commander');

GR.addTask('js-external');
GR.addTask('js');
GR.addWatch('watch:js');
