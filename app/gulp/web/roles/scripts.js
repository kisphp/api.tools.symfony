let gulp = require('gulp');
let config = require('../config');
let p = require('gulp-load-plugins')();

gulp.task('js-external', function(){
    return gulp.src([
        config.bowerDir + 'jquery/dist/jquery.min.js',
        config.bowerDir + 'bootstrap/dist/js/bootstrap.min.js',
        config.bowerDir + 'sweetalert/dist/sweetalert.min.js'
    ])
        .pipe(p.plumber())
        .pipe(p.concat('external.js'))
        .pipe(gulp.dest(config.targetDir + 'js'));
});

gulp.task('js', ['js-external'], function(){
    return gulp.src(config.sourceDir + 'js/**/*.js')
        .pipe(p.plumber())
        .pipe(p.browserify({
            insertGlobals: true,
            debug: false
        }))
        .pipe(p.uglify())
        .pipe(p.concat('bundle.js'))
        .pipe(gulp.dest(config.targetDir + 'js/'));
});

gulp.task('watch:js', () => {
    gulp.watch(config.sourceDir + 'js/**/*.js', ['js']);
});

let GR = require('kisphp-gulp-commander');

GR.addTask('js');
GR.addWatch('watch:js');
