let gulp = require('gulp');
let config = require('../config');

gulp.task('copy-fonts', () => {
    gulp.src([
        config.plugins + 'fontawesome/fonts/**/*.*',
        config.plugins + 'bootstrap/dist/fonts/**/*.*'
    ], [{ base: 'bower/' }])
        .pipe(gulp.dest('web/fonts'))
    ;
});

gulp.task('images', () => {
    gulp.src(config.sourceDir + 'images/**/*.*', { base: config.sourceDir + 'images/' })
        .pipe(gulp.dest(config.targetDir + 'images/default/'));
});

gulp.task('fonts', () => {
    gulp.src(config.sourceDir + 'fonts/**/*.*', { base: config.sourceDir + 'fonts/' })
        .pipe(gulp.dest(config.targetDir + 'fonts/'));
});


let GR = require('kisphp-gulp-commander');

GR.addTask('copy-fonts');
GR.addTask('fonts');
GR.addTask('images');
