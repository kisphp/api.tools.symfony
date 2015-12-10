var gulp = require('gulp');
var sass = require('gulp-sass');
var sourcemaps = require('gulp-sourcemaps');
var concat = require('gulp-concat');
var plumber = require('gulp-plumber');
//var rev = require('gulp-rev');

gulp.task('scss', function(){
    return gulp.src('web/SCSS/main.scss')
        .pipe(plumber())
        .pipe(sass())
        .pipe(concat('main.css'))
        .pipe(sourcemaps.write('.'))
        //.pipe(rev())
        .pipe(gulp.dest('web/css'))
        //.pipe(rev.manifest('manifest.json', {
        //    merge: true
        //}))
        //.pipe(gulp.dest('.'))
    ;
});

gulp.task('watch', function(){
    gulp.watch('web/SCSS/**/*.scss', ['scss'])
});

gulp.task('default', ['scss']);
