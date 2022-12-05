var 
	//Variaveis de projeto
	theme_folder = 'framework',
	projet_name = 'guerrilha',

	//porta proxis target 
	porta = 8080,

	// Variaveis deploy QA
	path_qa = 'public_html/' + projet_name + '/wp-content/',
	host_qa = '',
	user_qa = '',
	pass_qa = '',

	// variaveis Gulp
 	gulp = require('gulp'),
	imagemin = require('gulp-imagemin'),
	concat = require('gulp-concat'),
	rename = require('gulp-rename'),
	uglify = require('gulp-uglify'),
	livereload = require('gulp-livereload'),
	sass = require('gulp-sass'),
	ftp = require('vinyl-ftp'),
	gutil = require('gulp-util'),
	browserSync = require('browser-sync'),
	jshint = require('gulp-jshint'),
	prefix      = require('gulp-autoprefixer'),
	stylish = require('jshint-stylish');

// Deploy ambiente QA
gulp.task('deploy-qa', function () {
	var conn = ftp.create({
		host: host_qa,
		user: user_qa,
		password: pass_qa,
		parallel: 10,
		log: gutil.log
	}),

		globs = [
			'src/**/*',
		];
	return gulp.src(globs, { base: '.src/', buffer: false })
		.pipe(conn.newer(path_qa))
		.pipe(conn.dest(path_qa));
});

// Monitora alterações no PHP
gulp.task('php', function () {
	return gulp.src('src/themes/framework/**/*.php')
		.pipe(livereload());
});

// Mimifica e compila JS
gulp.task('script', function () {
	return gulp.src('development/js/**/*.js')
		.pipe(jshint())
  		.pipe(jshint.reporter(stylish))
		.pipe(concat('main.min.js'))
		.pipe(uglify())
		.pipe(gulp.dest('src/themes/' + theme_folder + '/assets/js'))
		.pipe(livereload());
});

// Mimifica e compila CSS
gulp.task('style', function () {
	return gulp.src('development/scss/**/*.scss')
		.pipe(sass.sync({ outputStyle: 'compressed' }).on('error', sass.logError))
		.pipe(prefix())
		.pipe(rename('main.min.css'))
		.pipe(gulp.dest('src/themes/' + theme_folder + '/assets/css'))
		.pipe(livereload());
});

// Otimiza imagens
gulp.task('build-img', function () {
	return gulp.src(['src/themes/**/*.png','src/themes/**/*.jpg','src/themes/**/*.jpge', 'src/uploads/**/*.gif, src/uploads/**/*.png','src/uploads/**/*.jpg','src/uploads/**/*.jpge','src/uploads/**/*.gif'])
		.pipe(imagemin([
			imagemin.gifsicle({ interlaced: true }),
			imagemin.mozjpeg({ quality: 50, progressive: true }),
			imagemin.optipng({ optimizationLevel: 5 }),
			imagemin.svgo({
				plugins: [
					{ removeViewBox: true },
					{ cleanupIDs: false }
				]
			})
		]))
		.pipe(gulp.dest('src'))
		.pipe(livereload());
});

// Cria um servidor, ativa o BrowserSync e monitora alterações no CSS, JS, PHP e otimiza novas imagens 
gulp.task('server', function () {
	browserSync.init({
		proxy: {
			target: "http://localhost:"+ porta,
			proxyReq: [
				function (proxyReq) {
					proxyReq.setHeader('X-Special-Proxy-Header', 'foobar');
				}
			]
		},
		files:['src/themes/framework/**/*.php', 'development/scss/**/*.scss', 'development/js/**/*.js']
	})
	livereload.listen();
	gulp.watch('development/scss/**/*.scss', gulp.series('style'));
	gulp.watch('development/js/**/*.js', gulp.series('script'));
	gulp.watch('src/themes/framework/**/*.php', gulp.series('php'));
	gulp.watch(['src/themes/**/*.png','src/themes/**/*.jpg','src/themes/**/*.jpge', 'src/uploads/**/*.gif, src/uploads/**/*.png','src/uploads/**/*.jpg','src/uploads/**/*.jpge','src/uploads/**/*.gif'], gulp.series('build-img'));
});

//Configuração da task default
gulp.task('default', gulp.series('php', 'script', 'style', 'build-img', 'server'));