 "use strict";

 var gulp=require("gulp");  
 var browserSync=require('browser-sync').create();  
                   
 gulp.task('server', function () {   
   browserSync.init({  
     port: 9000,  
     server: {  
       baseDir: 'app'  
     }  
   });  
 })  
   
 gulp.task('watch', function () {  
   gulp.watch([  
     'app/*.html',  
     'app/js/**/*.js',  
     'app/css/**/*.css'  
   ]).on('change', browserSync.reload)  
 })  
   
 gulp.task('default', ['server', 'watch'])    

