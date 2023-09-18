// gulpfile.js

const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const cleanCSS = require('gulp-clean-css');
const rename = require('gulp-rename');
// Task to convert SCSS to CSS
gulp.task('sass', function () {
    return gulp.src('resources/sass/*.scss') // Replace 'src/scss/**/*.scss' with your SCSS source folder
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest('public/css')); // Replace 'dist/css' with your CSS destination folder
});
gulp.task('minify-css', function () {
    return gulp
        .src(['public/css/app.css', 'public/css/style.css']) // Source files
        .pipe(cleanCSS()) // Minify CSS
        .pipe(
            rename({
                suffix: '.min', // Add .min to the filename
            })
        )
        .pipe(gulp.dest('public/css')); // Output directory
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
