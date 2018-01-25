var gulp = require('gulp');
var less = require('gulp-less');
var minifyCSS = require('gulp-csso');

gulp.task('css', function(){
  return gulp.src('*.less')
  .pipe(less())
  .pipe(minifyCSS())
  .pipe(gulp.dest('.'))
});

gulp.task('watch', function() {
  gulp.watch('*.less', ['css'])
});

gulp.task('default', ['watch']);