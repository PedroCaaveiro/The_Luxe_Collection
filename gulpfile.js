const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const sourcemaps = require('gulp-sourcemaps');
const { src, dest, watch, parallel } = require('gulp');

// Rutas de los archivos
const paths = {
    scss: 'src/scss/**/*.scss',  // Todos los archivos .scss
};

// Función para compilar SASS a CSS
function css() {
    return src(paths.scss)  // Selecciona los archivos .scss
        .pipe(sourcemaps.init())  // Inicializa los sourcemaps
        .pipe(sass())  // Compila el archivo SASS
        .pipe(sourcemaps.write('.'))  // Genera el sourcemap
        .pipe(dest('build/css'));  // Guarda el archivo CSS compilado en 'build/css'
}

// Función para observar cambios en los archivos SCSS
function watchArchivos() {
    watch(paths.scss, css);  // Observa los cambios en los archivos .scss
}

// Exportar las tareas
exports.css = css;
exports.watchArchivos = watchArchivos;
exports.default = parallel(css, watchArchivos);
