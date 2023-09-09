const mix = require('laravel-mix');
const webpackConfig = require('./webpack.config');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your theme assets. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix
    .webpackConfig(webpackConfig)
    .options({
        processCssUrls: false,
        manifest: false,
        terser: {
            terserOptions: {
                mangle: false,
                compress: true,
                output: {
                    comments: false
                }
            },
        },
    })
    .setPublicPath('');

// Core Mixes
require('./devmax-trackerclient.mix.js')(mix);
