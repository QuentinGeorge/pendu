
"use strict";

var gulp = require( "gulp" ),
    gSass = require( "gulp-sass" ),
    gAutoPrefixer = require( "gulp-autoprefixer" ),
    gCSSComb = require( "gulp-csscomb" ),
    gCleanCSS = require( "gulp-clean-css" ),
    gRename = require( "gulp-rename" );

gulp.task( "styles", function() {
    return gulp
        .src( "./sass/**/*.scss" )
        .pipe( gSass( { outputStyle: "expanded", precision: 3 } ) )
        // Add css prefixes
        .pipe( gAutoPrefixer() )
        // Format CSS coding style
        .pipe( gCSSComb() )
        // Minify
        .pipe( gCleanCSS() )
        // Add suffix .min before writting file
        .pipe( gRename( { suffix: ".min" } ) )
        .pipe( gulp.dest( "./css/" ) );
} );

gulp.task( "watch", function() {
    gulp.watch( "./sass/**/*.scss", [ "styles" ] );
} );

gulp.task( "default", [ "styles" ] );
gulp.task( "work", [ "default", "watch" ] );
