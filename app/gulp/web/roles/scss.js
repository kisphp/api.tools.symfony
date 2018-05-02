let gulp = require('gulp');
let plumber = require('gulp-plumber');
let sass = require('gulp-scss');
let concat = require('gulp-concat');

let config = require('../config');

gulp.task('css-external', function(){
    return gulp.src([
        config.plugins + 'bootstrap/dist/css/bootstrap.min.css',
        config.plugins + 'sweetalert/dist/sweetalert.css'
    ])
        .pipe(plumber())
        .pipe(concat('external.css'))
        .pipe(gulp.dest(config.targetDir + 'css'));
});

gulp.task('scss', ['css-external'], function(){
    return gulp.src(config.sourceDir + 'scss/index.scss')
        .pipe(plumber())
        .pipe(sass())
        .pipe(concat('bundle.css'))
        .pipe(gulp.dest(config.targetDir + 'css/'));
});

gulp.task('watch:scss', function(){
    gulp.watch(config.sourceDir + 'scss/**/*.scss', ['css']);
});

let GR = require('kisphp-gulp-commander');

GR.addTask('css-external');
GR.addTask('scss');
GR.addWatch('watch:scss');
