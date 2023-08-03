// gulpfile.js

const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));

// Task to convert SCSS to CSS
gulp.task('sass', function () {
    return gulp.src('resources/sass/*.scss') // Replace 'src/scss/**/*.scss' with your SCSS source folder
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest('public/css')); // Replace 'dist/css' with your CSS destination folder
});
gulp.task('js', function () {
    return gulp.src('resources/js/*.js')
        .pipe(gulp.dest('public/js'));
});
// Watch task to automatically convert SCSS to CSS on file changes
gulp.task('watch', function () {
    gulp.watch('resources/scss/*.scss', gulp.series('sass'));
});

// Default task that runs both the 'sass' and 'watch' tasks
gulp.task('default', gulp.series('sass', 'watch'));
