var gulp = require('gulp');
var gutil = require('gulp-util');
var notify = require('gulp-notify');
var sass = require('gulp-ruby-sass');
var autoprefix = require('gulp-autoprefixer');
var coffee = require('gulp-coffee');
var minifycss = require('gulp-minify-css');


var cssDir = 'app/assets';

var sassDir = 'app/assets/sass';
var targetCSSDir = 'public/css';

var coffeeDir = 'app/assets/coffee';
var targetJSDir = 'public/js';


gulp.task('sass', function() {
	return gulp.src(sassDir + '/main.sass')
	.pipe(sass({ style: 'compressed'}).on('error', gutil.log))
	.pipe(autoprefix('last 10 versions'))
	.pipe(gulp.dest(targetCSSDir))
	.pipe(notify('SASS Compiled, prefixed, and minified.'));
});

gulp.task('css', function() {
	return gulp.src(cssDir + '/**/*.css')
	.pipe(minifycss())
	.pipe(autoprefix('last 10 versions'))
	.pipe(gulp.dest(targetCSSDir))
	.pipe(notify('CSS Compiled, prefixed, and minified.'));
});

gulp.task('js', function() {
	return gulp.src(coffeeDir + '/**/*.coffee')
	.pipe(coffee().on('error', gutil.log))
	.pipe(gulp.dest(targetJSDir))
	.pipe(notify('JS Compiled, prefixed, and minified.'));
});

gulp.task('watch', function() {
	gulp.watch(sassDir + '/**/*.scss', ['sass']);
	gulp.watch(cssDir + '/**/*.css', ['css']);
	gulp.watch(coffeeDir + '/**/*.coffee', ['js']);
});

gulp.task('default', ['sass', 'css', 'js', 'watch']);