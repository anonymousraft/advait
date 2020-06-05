//load gulp
const { src, dest, task, watch, series, parallel } = require( 'gulp' );

//css related plugins
const sass         = require( 'gulp-sass' );
const autoprefixer = require( 'gulp-autoprefixer' );
const minifycss    = require( 'gulp-uglifycss' );

// JS related plugins
const concat       = require( 'gulp-concat' );
const uglify       = require( 'gulp-uglify' );
const babelify     = require( 'babelify' );
const browserify   = require( 'browserify' );
const source       = require( 'vinyl-source-stream' );
const buffer       = require( 'vinyl-buffer' );
const stripDebug   = require( 'gulp-strip-debug' );

// Utility plugins
const rename       = require( 'gulp-rename' );
const sourcemaps   = require( 'gulp-sourcemaps' );
const notify       = require( 'gulp-notify' );
const plumber      = require( 'gulp-plumber' );
const options      = require( 'gulp-options' );
const gulpif       = require( 'gulp-if' );

// Browers related plugins
const browserSync  = require( 'browser-sync' ).create();
//const reload       = browserSync.reload;

// Project related variables
const projectURL   = 'http://plug-dev.test';

const styleSRC     = './src/scss/advait.scss';
const styleURL     = './assets/css/';
const mapURL       = './';

var jsSRC        = './src/js/advait.js';
var jsURL        = './assets/js/';

var styleWatch   = './src/scss/**/*.scss';
var jsWatch      = './src/js/**/*.js';
var phpWatch     = './**/*.php';

function browser_sync()
{
    browserSync.init({
    proxy: projectURL,
    injectChanges: true,
    open: false,
    wc: true
    });
}

function reload(done){
    browserSync.reload();
    done();
}

function css(done)
{
  src( styleSRC )
    .pipe( sourcemaps.init() )
    .pipe( sass({
      errLogToConsole: true,
      outputStyle: 'compressed'
    }) )
    .on( 'error', console.error.bind( console ) )
    .pipe( autoprefixer({ overrideBrowserslist: [ 'last 2 versions', '> 5%', 'Firefox ESR' ] }) )
    .pipe( rename( { suffix:'.min' } ) )
    .pipe( sourcemaps.write( mapURL ) )
    .pipe( dest( styleURL ) )
    .pipe( browserSync.stream() );
    done();
}


function js(done)
{
  browserify({
    entries: [jsSRC]
  })
  .transform( babelify, { presets: ["@babel/preset-env"] } )
  .bundle()
  .pipe( source( 'advait.js' ) )
  .pipe( rename({ extname: '.min.js' }))
  .pipe( buffer() )
  .pipe( gulpif( options.has( 'production' ), stripDebug() ) )
  .pipe( sourcemaps.init({ loadMaps: true }) )
  .pipe( uglify() )
  .pipe( sourcemaps.write( '.' ) )
  .pipe( dest( jsURL ) )
  .pipe( browserSync.stream() );
  done();
}

function default_nofity()
{
    return src( jsURL + 'advait.min.js' )
    .pipe( notify({ message: 'Assets Compiled!' }) );
}

function watch_tasks()
{
    watch(phpWatch, reload);
    watch(styleWatch, css);
    watch(jsWatch, series(js, reload));
    src( jsURL + 'advait.min.js' )
    .pipe( notify({ message: 'Gulp is Watching, Happy Coding!' }) );
}

exports.default = parallel( css, js, series(default_nofity) );

exports.watch = series(css, js, default_nofity, (parallel(browser_sync, watch_tasks)));

