var gulp = require('gulp');
var p = require('gulp-load-plugins')();

var config = {
    sourceDir: "app/gulp/web/",
    targetDir: "web/"
};

gulp.task('images', function(){
    gulp.src(config.sourceDir + 'images/**/*.*', { base: config.sourceDir + 'images/' })
        .pipe(gulp.dest(config.targetDir + 'images/default/'));
});

gulp.task('fonts', function(){
    gulp.src(config.sourceDir + 'fonts/**/*.*', { base: config.sourceDir + 'fonts/' })
        .pipe(gulp.dest(config.targetDir + 'fonts/'));
});

gulp.task('scss', function(){
    return gulp.src(config.sourceDir + 'scss/index.scss')
        .pipe(p.plumber())
        .pipe(p.sass())
        .pipe(p.concat('main.css'))
        .pipe(gulp.dest(config.targetDir + 'css'));
});

gulp.task('js', function(){
    return gulp.src(config.sourceDir + 'js/**/*.js')
        .pipe(p.plumber())
        .pipe(p.concat('main.js'))
        .pipe(gulp.dest(config.targetDir + 'js'));
});

gulp.task('watch', function(){
    gulp.watch(config.sourceDir + 'scss/**/*.scss', ['scss']);
    gulp.watch(config.sourceDir + 'js/**/*.js', ['js']);
});

gulp.task('default', ['images', 'scss', 'js', 'fonts']);