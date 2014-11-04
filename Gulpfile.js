var gulp = require('gulp');
var sass = require('gulp-sass');
var clean = require('gulp-clean');

var paths = {
	scripts: ['client/js/**/*.coffee', '!client/external/**/*.coffee'],
	images: 'client/img/**/*',
	scss: {
		src: './public/scss/**/*.scss',
		dest: './public/dist/css'
	}
};

gulp.task('clean', function () {
	return gulp.src('./public/dist', {read: false})
		.pipe(clean());
});

gulp.task('sass', ['clean'], function () {
	gulp.src(paths.scss.src)
		.pipe(sass())
		.pipe(gulp.dest(paths.scss.dest));
});

// Rerun the task when a file changes
gulp.task('watch', function() {
	gulp.watch(paths.scss.src, ['sass']);
});

// The default task (called when you run `gulp` from cli)
gulp.task('default', ['clean', 'sass', 'watch']);
