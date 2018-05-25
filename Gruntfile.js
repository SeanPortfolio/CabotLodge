module.exports = function(grunt) {

  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    concat:{
      options: {
        banner: '/*! <%= pkg.name %> <%= grunt.template.today("yyyy-mm-dd hh:mm") %> */\n',
        separator: ';'
      },
      basic_and_extras: {
        files:{
          'assets/js/vendor/min/production.js': [
            'assets/js/vendor/unmin/underscore.js',
            'assets/js/vendor/unmin/jquery-3.2.1.js',
            'assets/js/vendor/unmin/bootstrap.js',
            'assets/js/vendor/unmin/slick.js',
            'assets/js/vendor/unmin/moment.js',
            'assets/js/vendor/unmin/pikaday.js',
            'assets/js/vendor/unmin/jquery.swipebox.js',  
            'assets/js/vendor/unmin/shuffle.js',                                       
          ],
          'assets/js/scripts/unmin/main.js': [
            'assets/js/scripts/unmin/base.js',
            'assets/js/scripts/unmin/map.js',
          ]
        }
      }
    },
    uglify:{
      options: {
        banner: '/*! <%= pkg.name %> <%= grunt.template.today("yyyy-mm-dd") %> */\n'
      },
      build: {
        files: [{
          src: 'assets/js/vendor/min/production.js',
          dest: 'assets/js/vendor/min/production.js'
        }, {
          src: 'assets/js/scripts/unmin/main.js',
          dest: 'assets/js/scripts/min/main.js'
        }]
      }
    },
    sass: {
      dist: {
        files: {
          'assets/css/_main_xl.css' : 'assets/sass/main.scss'
        }
      }
    },
    cssmin: {
      options: {
        shorthandCompacting: false,
        roundingPrecision: -1
      },
      target: {
        files: {
          'assets/css/main.css': 'assets/css/_main_xl.css'
        }
      }
    },
    watch: {
      scripts:{
        files: ['assets/js/vendor/unmin/*.js',
          'assets/js/scripts/unmin/*.js',
          'Gruntfile.js'
        ],
        tasks: ['concat', 'uglify'],
      }, 
      css: {
        files: ['**/*.scss'],
        tasks: ['sass', 'cssmin']
      }
    }
  });
    
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-watch');
    

    // lodge task(s).
    grunt.registerTask('default', ['watch']);

};