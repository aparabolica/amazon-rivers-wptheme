module.exports = function(grunt) {

  grunt.initConfig({
    less: {
      all: {
        options: {
          mangle: true,
          compress: true
        },
        files: {
          'css/main.css': 'css/main.less'
        }
      }
    },
    copy: {
      assets: {
        files: [
          {
            cwd: 'bower_components',
            src: ['**/*'],
            dest: 'assets',
            expand: true
          }
        ]
      }
    },
    watch: {
      css: {
        files: 'css/*.less',
        tasks: ['less']
      },
      copy: {
        files: 'bower_components/**/*',
        tasks: ['copy']
      }
    }
  });

  grunt.loadNpmTasks('grunt-contrib-copy');
  grunt.loadNpmTasks('grunt-contrib-less');
  grunt.loadNpmTasks('grunt-contrib-watch');

  grunt.registerTask(
    'build',
    ['less', 'copy']
  );

  grunt.registerTask(
    'default',
    ['build', 'watch']
  );

}
