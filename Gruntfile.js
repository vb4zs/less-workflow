/*global module*/
module.exports = function (grunt) {
    'use strict';

    grunt.initConfig({

        less: {
            dev: {
                options: {
                    dumpLineNumbers: 'mediaquery',
                    compress: false,
                    yuicompress: false,
                    optimization: null,
                    strictImports: false
                },
                files: [{
                    expand: true,
                    cwd: 'less/',
                    src: ['**/*.less', '!**/mixins*.less', '!**/variables*.less', '!**/*Variables.less', '!**/*Mixins.less'],
                    dest: 'css/',
                    ext: '.css'
                }]
            }
        }
    });

    grunt.loadNpmTasks('assemble-less');
};