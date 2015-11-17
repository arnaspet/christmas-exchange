module.exports = function(grunt) {

    // Project configuration.
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),


        compass: {
            options: {
                sassDir: 'src/Resources/scss/',
                cssDir: 'web/assets/css'
            },

            dist: {
                options: {
                    environment: 'production'
                }
            },

            dev: {
            },

            watch: {
                options: {
                    watch: true
                }
            }
        }
    });

    // Load the plugin that provides the "uglify" task.
    grunt.loadNpmTasks('grunt-contrib-compass');

    // Default task(s).
    grunt.registerTask('default', ['uglify']);

};