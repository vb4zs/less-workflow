/*global module*/
module.exports = function (grunt) {
    'use strict';

    grunt.initConfig({
        lessFiles: grunt.file.readJSON('config/stylesheets.json'),

        less: {
            options: {
                paths: ['less/base']
            },
            dev: {
                options: {
                    dumpLineNumbers: 'mediaquery'
                },
                files: [{
                    expand: true,
                    cwd: 'less/',
                    src: ['**/*.less', '!**/mixins*.less', '!**/variables*.less', '!**/*Variables.less', '!**/*Mixins.less'],
                    dest: 'css/',
                    ext: '.css'
                }]
            },
            prod: {
                options: {
                    concat: true,
                    yuicompress: true
                },
                files: [
                    {
                        src: '<%= lessFiles.base %>',
                        dest: 'release/css/prod.min.css'
                    }
                ]
            }
        }
    });

    grunt.loadNpmTasks('assemble-less');
};