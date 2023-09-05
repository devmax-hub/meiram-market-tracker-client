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

module.exports = (mix) => {
    // Backend LESS
    mix.less('assets/less/style.less', 'assets/css/');

    // Backend Source
    mix.combine([
        'assets/js/src/script.js',
    ], 'assets/js/script.js');
};
