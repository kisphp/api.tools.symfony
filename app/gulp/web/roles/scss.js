let gulp = require('gulp');
let p = require('gulp-load-plugins')();

let config = require('../config');

gulp.task('css-external', function(){
    return gulp.src([
        config.bowerDir + 'bootstrap/dist/css/bootstrap.min.css',
        config.bowerDir + 'sweetalert/dist/sweetalert.css'
    ])
        .pipe(p.plumber())
        .pipe(p.sass())
        .pipe(p.concat('external.css'))
        .pipe(gulp.dest(config.targetDir + 'css'));
});

gulp.task('scss', ['css-external'], function(){
    return gulp.src(config.sourceDir + 'scss/index.scss')
        .pipe(p.plumber())
        .pipe(p.sass())
        .pipe(p.concat('bundle.css'))
        .pipe(gulp.dest(config.targetDir + 'css/'));
});

gulp.task('watch:scss', function(){
    gulp.watch(config.sourceDir + 'scss/**/*.scss', ['css']);
});

let GR = require('kisphp-gulp-commander');

GR.addTask('scss');
GR.addWatch('watch:scss');