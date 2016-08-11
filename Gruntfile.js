/**
 * Created by Aaron Beckett on 4/22/2016.
 */
module.exports = function(grunt) {
    // Path to our JavaScript source files
    var jssrc = ['jslib/*.js'];

    // Project configuration.
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        uglify: {
            options: {
                banner: '/*! <%= pkg.name %> <%= grunt.template.today("yyyy-mm-dd") %> */\n'
            },
            js: {
                src: jssrc,
                dest: 'site.min.js'
            }
        },

        concat: {
            options: {
                banner: '/*! DO NOT EDIT <%= pkg.name %> <%= grunt.template.today("yyyy-mm-dd") %> */\n'
            },
            js: {
                src: jssrc,
                dest: 'site.con.js'
            }
        },

        less: {
            development: {
                options: {
                    compress: true,
                    yuicompress: true,
                    optimization: 2
                },
                files: {
                    "css/site.css": "css/site.less" // destination file and source file
                }
            }
        },

        watch: {
            styles: {
                files: ['css/*.less'], // which files to watch
                tasks: ['less'],
                options: {
                    nospawn: true
                }
            }
        }
    });

    // Load the plugins for the tasks
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-less');
    grunt.loadNpmTasks('grunt-contrib-watch');

    // Default task(s).
    grunt.registerTask('default', ['concat:js', 'uglify:js']);
    grunt.registerTask('production', ['uglify:js', 'less:development:files']);

};