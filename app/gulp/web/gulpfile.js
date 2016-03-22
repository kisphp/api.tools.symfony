var gulp = require('gulp');
var p = require('gulp-load-plugins')();

var config = {
    bowerDir: "bower/",
    sourceDir: "app/gulp/web/",
    targetDir: "web/"
};

gulp.task('copy-fonts', function(){
    gulp.src([
        config.bowerDir + 'fontawesome/fonts/**/*.*',
        config.bowerDir + 'bootstrap/dist/fonts/**/*.*'
    ], [{ base: 'bower/' }])
        .pipe(gulp.dest('web/fonts'))
    ;
});

gulp.task('images', function(){
    gulp.src(config.sourceDir + 'images/**/*.*', { base: config.sourceDir + 'images/' })
        .pipe(gulp.dest(config.targetDir + 'images/default/'));
});

gulp.task('fonts', function(){
    gulp.src(config.sourceDir + 'fonts/**/*.*', { base: config.sourceDir + 'fonts/' })
        .pipe(gulp.dest(config.targetDir + 'fonts/'));
});

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

gulp.task('css', ['css-external'], function(){
    return gulp.src(config.sourceDir + 'scss/index.scss')
        .pipe(p.plumber())
        .pipe(p.sass())
        .pipe(p.concat('bundle.css'))
        .pipe(gulp.dest(config.targetDir + 'css/'));
});

gulp.task('js-external', function(){
    return gulp.src([
        config.bowerDir + 'jquery/dist/jquery.js',
        config.bowerDir + 'bootstrap/dist/js/bootstrap.js',
        config.bowerDir + 'sweetalert/dist/sweetalert.min.js'
    ])
        .pipe(p.plumber())
        .pipe(p.browserify({
            insertGlobals: true,
            debug: false
        }))
        .pipe(p.uglify())
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

gulp.task('watch', function(){
    gulp.watch(config.sourceDir + 'scss/**/*.scss', ['css']);
    gulp.watch(config.sourceDir + 'js/**/*.js', ['js']);
});

gulp.task('default', ['images', 'css', 'js', 'copy-fonts']);
