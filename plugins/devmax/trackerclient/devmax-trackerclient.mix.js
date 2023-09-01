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
let base_path = 'plugins/devmax/trackerclient/assets';
module.exports = (mix) => {

    // Backend LESS
    mix.less(`${base_path}/less/style.less`, `${base_path}/css/`);
    // mix.less('modules/backend/behaviors/relationcontroller/assets/less/relation.less', 'modules/backend/behaviors/relationcontroller/assets/css/');
    // mix.less('modules/backend/behaviors/importexportcontroller/assets/less/export.less', 'modules/backend/behaviors/importexportcontroller/assets/css/');
    // mix.less('modules/backend/behaviors/importexportcontroller/assets/less/import.less', 'modules/backend/behaviors/importexportcontroller/assets/css/');
    //
    // // Component LESS
    // mix.lessList('modules/backend/vuecomponents');
    // mix.lessList('modules/backend/formwidgets', ['richeditor']);
    // mix.lessList('modules/backend/behaviors');
    // mix.lessList('modules/backend/widgets');

    // Vendor Sourcw
    mix.combine([
      `${base_path}/js/script.js`,

    ], `${base_path}/assets/js/script-min.js`);

    // Backend Source
    // mix.combine([
    //     ...require('./assets/foundation/scripts/build.js').map(name => `modules/backend/assets/foundation/scripts/${name}`),
    //     ...require('./assets/foundation/controls/build.js').map(name => `modules/backend/assets/foundation/controls/${name}`),
    //     ...require('./assets/foundation/migrate/build.js').map(name => `modules/backend/assets/foundation/migrate/${name}`),
    //     ...require('./assets/js/build.js').map(name => `modules/backend/assets/js/${name}`),
    // ], 'modules/backend/assets/js/october-min.js');

    // Repeater Widget
    // mix.combine([
    //     'modules/backend/formwidgets/repeater/assets/js/repeater.js',
    //     'modules/backend/formwidgets/repeater/assets/js/repeater.builder.js',
    //     'modules/backend/formwidgets/repeater/assets/js/repeater.accordion.js'
    // ], 'modules/backend/formwidgets/repeater/assets/js/repeater-min.js');
};
