var gulp = require('gulp');
var minifycss = require('gulp-minify-css');
var minifyjs = require('gulp-uglify');
var minifyhtml = require('gulp-minify-html');
var autoprefixer = require('gulp-autoprefixer');
var concat = require('gulp-concat');

var paths = {
  css: 'public/src/js/**/**/*.css',
  js: 'public/src/js/**/**/*.js',
  templates: 'public/src/js/**/views/*.html'
};

var dest = {
  css: 'public/dist/css',
  js: 'public/dist/js',
  templates: 'public/dist/templates'
};

var bowercss = ['public/components/bootstrap-css-only/css/bootstrap.min.css',
    'public/components/font-awesome/css/font-awesome.min.css',
    'public/components/animate.css/animate.min.css',
    'public/ionicons/css/ionicons.min.css',
    'public/src/css/style.css',
    paths.css
];

var bowerjs = [
    'public/components/angular/angular.min.js',
    'public/components/angular-resource/angular-resource.min.js',
    'public/components/angular-messages/angular-messages.min.js',
    'public/components/angular-animate/angular-animate.min.js',
    'public/components/angular-strap/dist/angular-strap.min.js',
    'public/components/angular-strap/dist/angular-strap.tpl.min.js',
    'public/components/angular-ui-router/release/angular-ui-router.min.js',
    'public/components/angular-cookies/angular-cookies.min.js',
    'public/components/angular-sanitize/angular-sanitize.min.js',
    'public/components/angular-translate/angular-translate.min.js',
    'public/components/satellizer/satellizer.min.js',
    'public/src/js/app.js',
    'public/src/js/**/*.js',
     paths.js
];

gulp.task('css', function() {
   return gulp.src(bowercss)
       .pipe(autoprefixer('last 15 version'))
       .pipe(minifycss())
       .pipe(concat('main.min.css'))
       .pipe(gulp.dest(dest.css));
});

gulp.task('js', function() {
   return gulp.src(bowerjs)
//       .pipe(minifyjs())
       .pipe(concat('main.min.js'))
       .pipe(gulp.dest(dest.js));
});

gulp.task('templates', function() {
   return gulp.src(paths.templates)
       .pipe(minifyhtml({
           empty: true,
           cdata: true,
           spare: true
       }))
       .pipe(gulp.dest(dest.templates))
});

gulp.task('watch', function(){
   gulp.watch(paths.css, ['css']);
    gulp.watch(paths.js, ['js']);
    gulp.watch(paths.templates, ['templates']);
});

gulp.task('default', ['css', 'js', 'templates','watch']);

