const gulp = require('gulp')
const sass = require('gulp-sass')
const cssmin = require('gulp-cssmin')
const uglify = require('gulp-uglify')
const babel = require('gulp-babel')
const htmlmin = require('gulp-htmlmin')
const del = require('del')

const sassHandler = () => {
  return gulp
    .src('./src/sass/*.scss')
    .pipe(sass())
    .pipe(cssmin())
    .pipe(gulp.dest('./dist/sass/'))
}
const cssHandler = () => {
  return gulp
    .src('./src/sass/*.css')
    .pipe(cssmin())
    .pipe(gulp.dest('./dist/css/'))
}
const jsHandler = () => {
  return gulp
    .src('./src/js/*.js')
    .pipe(babel({ presets : ['@babel/env']}))
    .pipe(uglify())
    .pipe(gulp.dest('./dist/js/'))
}
const htmlHandler = () => {
  return gulp
    .src('./src/pages/*.html')
    .pipe(htmlmin({
      collapseWhitespace: true, // 去除空白内容
      collapseBooleanAttributes: true, // 简写布尔值属性
      removeAttributeQuotes: true, // 去除属性上的双引号
      removeComments: true, // 去除注释
      removeEmptyElements: true, // 去除空元素
      removeEmptyAttributes: true, // 去除空的属性
      removeScriptTypeAttributes: true, // 去除 script 标签上的 type 属性
      removeStyleLinkTypeAttributes: true, // 去除 style 标签和 link 标签上的 type 属性
      minifyCSS: true, // 压缩内嵌式 css 文本, 不能自动加前缀
    }))
    .pipe(gulp.dest('./dist/pages/'))
}
const imgHandler = () => {
  return gulp
    .src('./src/images/*.**')
    .pipe(gulp.dest('./dist/images/'))
}
const phpHandler = () => {
  return gulp
    .src('./src/php/*.php')
    .pipe(gulp.dest('./dist/php/'))
}
const assetsHandler = () => {
  return gulp
    .src('./src/assets/*/**')
    .pipe(gulp.dest('./dist/assets'))
}
const delHandler = () => {
  return del('./dist/')
}
const defaultHandler = gulp.series(
  delHandler,
  gulp.parallel(sassHandler, cssHandler, jsHandler, htmlHandler, imgHandler, assetsHandler, phpHandler)
)
module.exports.default = defaultHandler