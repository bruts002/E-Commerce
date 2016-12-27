var gulp = require('gulp');
var sass = require('gulp-ruby-sass');
var browserSync = require('browser-sync').create();

gulp.task('serve', function() {
	browserSync.init({
        proxy:'localhost/ecommerce',
        port:801
	});

	gulp.watch('./**/*.css').on('change', browserSync.reload);
	gulp.watch('./**/*.html').on('change', browserSync.reload);
	gulp.watch('./**/*.php').on('change', browserSync.reload);
	gulp.watch('./js/*.js').on('change', browserSync.reload);
});

function buildSass() {
	sass('./styles/main.scss', {sourcemap: true})
		.on('error', sass.logError)
		.pipe(gulp.dest('./styles/'))
};

gulp.task('sass', function() {
	gulp.watch('./styles/**/*.scss').on('change', function (event) {
		buildSass();
	});
})

gulp.task('build-sass', function() {
	buildSass();
});

gulp.task('default', ['serve']);
