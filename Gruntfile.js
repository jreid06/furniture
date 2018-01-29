//we pass in grunt so when we run in command line it will run all tasks within the functions
module.exports = function(grunt){

  // Load all tasks
  require('load-grunt-tasks')(grunt);
  // Show elapsed time
  // require('time-grunt')(grunt);
  //1. setting up each plugin individually, giving them the options we need to specify

  //configure main project settings
  grunt.initConfig({
    //basic settings and ifo about plugins
    pkg: grunt.file.readJSON('package.json'),

    //setting up individual plugin(name of plugin without "grunt-contrib")
    cssmin: {
        target: {
            files: {
              //configuring our plugin to take in two files, put them both together and make one css file called app.css
              'css/main.min.css': ['/css/main.css']
            }
        }
    },
    postcss: {
        options: {
          //map: true, // inline sourcemaps

          // or
          map: {
              inline: false, // save all sourcemaps as separate files...
              annotation: 'dist/css/maps/' // ...to the specified directory
          },
          processors: [
            require('pixrem')(), // add fallbacks for rem units
            require('autoprefixer')({browsers: 'last 4 versions'}), // add vendor prefixes
            require('cssnano')() // minify the result
          ]
        },
        dist: {
          src: 'css/*.css'
        }
      }


  });


  //2. loading them in - we can miss this step because of the require statements

  // grunt.loadNpmTasks('grunt-contrib-cssmin');
  // grunt.loadNpmTasks('grunt-contrib-sass');

  //3. then we'll run them
      //NOTES TO SELF: if 'default' is written where 'cssminify' has been written then in the cmd line you'll only have to write grunt to compile and run plugin with specified settings

  grunt.registerTask('cssminify', ['cssmin']);
  grunt.registerTask('scss', ['sass']);
  grunt.registerTask('prefix', ['postcss:dist']);
  // grunt.registerTask('scss', ['sass', 'postcss:dist']);







  //we can use this function to output a message after a task has been run e.g after compling sass to css or compling js
  // grunt.registerTask("default", "", function(){
  //   grunt.log.write('test grunt task');
  // });



};
