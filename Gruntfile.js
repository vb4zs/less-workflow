/*global module*/
module.exports = function (grunt) {
    'use strict';

    var styleSheets;

    grunt.initConfig({
        lessFiles: grunt.file.readJSON('config/stylesheets.json'),

        readStylesheetJson: {
            options: {
                path: 'config/stylesheets.json'
            },
            files: {
                src: 'jee'
            },
            ize: 'hoze'
        },

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

                }
            }
        }
    });

    grunt.registerTask('readStylesheetJson', function () {
        var path = this.options().path,
            stylesheets = grunt.file.readJSON(path),
            i, il,
            assemble = require('less');

        grunt.log.writeln(assemble);

        for (i = 0, il = stylesheets.base.length; i < il; i++) {
            grunt.log.writeln(stylesheets.base[i]);
        }
    });

    grunt.loadNpmTasks('assemble-less');


    grunt.registerTask('prod', ['readStylesheetJson']);
};