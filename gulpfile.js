const {src, dest, watch, parallel} = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const plumber = require('gulp-plumber');
const autoprefixer = require('autoprefixer');
const cssnano = require('cssnano');
const postcss = require('gulp-postcss');
const sourcemaps = require('gulp-sourcemaps');
const cache = require('gulp-cache');
const imagemin = require('gulp-imagemin');
const webp = require('gulp-webp');
const terser = require('gulp-terser-js');
const concat = require('gulp-concat');
const rename = require('gulp-rename');
const notify = require('gulp-notify');
const clean = require('gulp-clean');

const paths = {
    scss: 'src/scss/**/*.scss',
    imagenes: 'src/img/**/*',
    js: 'src/js/**/*.js'
}

function css(done) {
    src(paths.scss)
    .pipe(sourcemaps.init())
    .pipe(plumber())
    .pipe(sass())
    .pipe(postcss([autoprefixer(), cssnano()]))
    .pipe(sourcemaps.write('.'))
    .pipe(dest('build/css'));

    done();
}

function javascript(done) {
    src(paths.js)
    .pipe(sourcemaps.init())
    .pipe(concat('bundle.js'))
    .pipe(terser())
    .pipe(sourcemaps.write('.'))
    .pipe(rename({suffix: '.min'}))
    .pipe(dest('./build/js'));

    done();
}

function imagenes(done) {
    src(paths.imagenes)
    .pipe(cache(imagemin({optimizationLevel: 3})))
    .pipe(dest('build/img'))
    .pipe(notify({message: 'Imágenes aligeradas'}));

    done();
}

function versionWebp(done) {
    src(paths.imagenes)
    .pipe(webp({quality: 50}))
    .pipe(dest('build/img'))
    .pipe(notify({message: 'Imágenes convertidas'}));

    done();
}

function watchArchivos(done) {
    watch(paths.scss, css);
    watch(paths.js, javascript);

    done();
}

exports.css = css;
exports.watchArchivos = watchArchivos;

exports.default = parallel(css, javascript, imagenes, versionWebp, watchArchivos); 