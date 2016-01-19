"use strict";

var gulp = require('gulp'),
   concatCSS = require('gulp-concat-css'),
   minifyCss = require('gulp-minify-css'),
   notify = require('gulp-notiify'),
    autoprefixer = require('gulp-autoprifixer'),
    connect = require('gulp-connect'),
    browserSync =  require('browser­sync');



//server-connect
//gulp.task('connect', function() {
//  connect.server({
//    root: 'app',
//    livereload: true
//  });
//});

gulp.task('connect', function () {   
                   browserSync({  
                     port: 9000,  
                     server: {  
                       baseDir: 'app'  
                     }  
                               });  
           })  

//css
gulp.task('css', function() {
  // place code for your default task here
  gulp.src('css/*.css')
     .pipe(concatCSS('bundle.css'))
	 .pipe(minifyCss())
     .pipe(gulp.dest('app/css/'))
     //.pipe(notify('Изменения в CSS!'))
     gulp.src('app/*.css')
    .pipe(connect.reload())
     ;
});

//html
gulp.task('html',function(){
	gulp.src('app/index.html')
	.pipe(connect.reload());
})


//watch
 //gulp.task('watch',function(){
 //    gulp.watch('css/*.css',['css'])
 //    gulp.watch('js/*.js',['js'])
 //    gulp.watch('app/index.html',['css'])
//});

gulp.task('watch', function () {  
       gulp.watch([  
         'app/*.html',  
         'app/js/**/*.js',  
         'app/css/**/*.css'  
       ]).on('change', browserSync.reload);  
     });  


//default
gulp.task('default', ['connect', 'html', 'css' , 'watch']);    

