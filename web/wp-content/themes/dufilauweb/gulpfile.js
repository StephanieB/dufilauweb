'use strict';

var gulp = require('gulp');
var sass = require('gulp-sass');
var rename = require('gulp-rename');
var cssnano = require('gulp-cssnano');
var del = require('del');
var uglify = require('gulp-uglify');
var jshint = require('gulp-jshint');
var imagemin = require('gulp-imagemin');
var cache = require('gulp-cache');

var buildPath = './build';
var srcPath = './src';
var scssPath = srcPath+'/scss';
var jsPath = srcPath+'/js';
var imgPath = srcPath+'/images';
var buildCssPath = buildPath+'/css';
var buildJsPath = buildPath+'/js';
var buildImgPath = buildPath+'/images';

// clean
gulp.task('clean', function(done) {
    del(['build']);
    return cache.clearAll(done);
});

// sass compilation
gulp.task('styles', function(){
    return gulp.src(scssPath+'/**/*.scss')
        .pipe(cssnano())
        .pipe(sass().on('error', sass.logError))
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest(buildCssPath));
});

// js uglify
gulp.task('scripts', function() {
    return gulp.src(jsPath+'/**/*.js')
        .pipe(jshint())
        .pipe(jshint.reporter('default'))
        .pipe(rename({ suffix: '.min' }))
        .pipe(uglify())
        .pipe(gulp.dest(buildJsPath));
});

// image optimization
gulp.task('images', function() {
    return gulp.src(imgPath+'/**/*')
        .pipe(cache(imagemin({ optimizationLevel: 3, progressive: true, interlaced: true })))
        .pipe(gulp.dest(buildImgPath));
});

gulp.task('watch', function() {
    gulp.watch(scssPath+'/**/*.scss', ['styles']);
    gulp.watch(jsPath+'/**/*.js', ['scripts']);
});

gulp.task('build', ['images','styles','scripts']);