var gulp = require('gulp');
var sass = require('gulp-ruby-sass');

function buildSass() {
	sass('./styles/main.scss', {sourcemap: true})
		.on('error', sass.logError)
		.pipe(gulp.dest('./styles/'))
}

gulp.task('sass', function() {
	gulp.watch('./styles/**/*.scss').on('change', function (event) {
		buildSass();
	});
});

gulp.task('build-sass', function() {
	buildSass();
});

gulp.task('default', ['build-sass']);
