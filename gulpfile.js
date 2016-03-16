 "use strict";

 var gulp=require("gulp"),
        plugins = require('gulp-load-plugins')(),//заменяет декларирование переменных
        browserSync=require('browser-sync').create(),
        wiredep = require('wiredep').stream,
        rimraf = require('rimraf'),
        ftp = require( 'vinyl-ftp'),
        cleanCss = require('gulp-clean-css')
     ;


var paths = {
    htmlPhp : ['./app/*.html','./app/*.php'],
    js : './app/js/**/*.js',
    css : './app/css/**/*.css',
    php : './app/php/**/*.php',
    fonts : './app/fonts/**/*',
    images : './app/images/**/*',
    lib : ['./app/lib/**/*', '!./app/lib/composer/*', '!./app/lib/autoload.php'],
    app: './app',
    dist: './dist',
    distSource: './dist/**/*'
} ;
                  
 gulp.task('server', function () {   
   browserSync.init({  
     port: 9000,  
     server: {  
       baseDir: './app' 
     }  
   });  
 }) ;
   
 gulp.task('watch', function () {  
   gulp.watch([  
     'app/*.html',  
     'app/js/**/*.js',  
     'app/css/**/*.css'  
   ]).on('change', browserSync.reload)  
 });

gulp.task('default', ['server', 'watch']);

 //добавлеие ссылок на подключаемые модули в html,php
gulp.task('wiredep', function () {
     gulp.src(paths.htmlPhp)
         .pipe(wiredep())
         .pipe(gulp.dest(paths.app));
});

 gulp.task('build', ['clean'],function(){ //проект на продакшн
     gulp.start('dist');
 });

 gulp.task('dist',['useref','images','fonts','php'],function(){
     return gulp.src(paths.distSource)
         .pipe(plugins.size({title:'build'}));
 });

 //useref
gulp.task('useref',function(){
    return gulp.src(paths.htmlPhp)
        .pipe(plugins.useref())
        .pipe(plugins.if('*.js',plugins.uglify()))
        .pipe(plugins.cssimport())
        .pipe(plugins.if('*.css',cleanCss()))
        .pipe(gulp.dest(paths.dist));
});

 //очистка папки дистрибутива
gulp.task('clean',function(cb){
    rimraf(paths.dist, cb);
});

 //перенос фонтов
gulp.task('fonts',function() {
     return gulp.src(paths.fonts)
        // .pipe(filter(['*.aot','*.svg','*.ttf','*.woff','*.woff2'], {restore: true}))
         .pipe(gulp.dest('dist/fonts'));
});

//перенос php
 gulp.task('php',function() {
     return gulp.src(paths.php)
         .pipe(gulp.dest('dist/php'));
});
 //перенос images
 gulp.task('images',function() {
     return gulp.src(paths.images)
         .pipe(gulp.dest('dist/images'));
 });

gulp.task('build', ['clean'],function(){
   gulp.start('dist');
});

gulp.task('dist',['useref','images','fonts','php','lib'],function(){
    return gulp.src(paths.distSource)
        .pipe(plugins.size({title:'build'}));
});

gulp.task('lib',function() {
     gulp.src(paths.lib)
         .pipe(gulp.dest('./dist/lib'));
});

 //перенос на хостинг
gulp.task('deploy',function () {
   var conn = ftp.create( {
       host: 'ftp://someserver.ru',
       user: 'someuser',
       password: 'somepassword',
       parallel: 10,
       log: gutil.log
   }) ;
    var globs = ['dist/**/*'];
    return gulp.src(globs,{base: 'dist/',buffer: false})
        .pipe(conn.dest('public_html/'));
});

 //архивация сайта для отправки на хостинг
gulp.task('archive',function (){
   return gulp.src(paths.source)
       .pipe(plugins.archiver('site.zip'))
       .pipe(gulp.dest('./archives'));
});

 // gulp.task('styles',function (){
 //    return gulp.src('app/css/**/*.css')
 //        .pipe(gulpIf(dev,sourcemaps.init()))
 //        .pipe(autoprefixer({
 //            browsers: ['last 5 versions'],
 //            cascade: false
 //        }))
 //        .pipe(cleanCSS())
 //        .pipe(gulpIf(dev,sourcemaps.write()))
 //        .pipe(concatCss("bundle.css"))
 //        .pipe(gulp.dest('dist/assets/css'));
 //});

