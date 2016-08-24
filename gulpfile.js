var gulp = require('gulp');
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

gulp.task('default', ['serve']);
