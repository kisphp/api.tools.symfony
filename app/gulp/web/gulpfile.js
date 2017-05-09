let gulp = require('gulp');
let requireDir = require('require-dir');

let GR = require('kisphp-gulp-commander');

// load tasks
requireDir('./roles', { recurse: true });

// run tasks (all chain)
gulp.task('default', GR.getTasks());

// run watch task
gulp.task('watch', GR.getWatch());

// list all registered tasks
gulp.task('list', () => {
    GR.displayList();
});
