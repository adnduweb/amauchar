const mix = require('laravel-mix');
const glob = require('glob');
const path = require('path');
const ReplaceInFileWebpackPlugin = require('replace-in-file-webpack-plugin');
const rimraf = require('rimraf');
const WebpackRTLPlugin = require('webpack-rtl-plugin');
const del = require('del');
const fs = require('fs');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */


// arguments/params from the line command
const args = getParameters();

if (args.indexOf('admin') !== -1) {


    OutputDir = 'public/backend/themes/metronic/assets';

    // get selected demo
    let demo = getDemos(path.resolve(__dirname, 'public/backend/themes/metronic/resources'))[0];

    mix.options({
        cssNano: {
            discardComments: false,
        }
    });

    // Remove existing generated assets from public folder
    del.sync([OutputDir + '/css/*', OutputDir + '/js/*', OutputDir + '/media/*', OutputDir + '/plugins/*', ]);

    // Build 3rd party plugins css/js
    mix.sass(`resources/backend/core/plugins/plugins.scss`, `${OutputDir}/plugins/global/plugins.bundle.css`).then(() => {
            // remove unused preprocessed fonts folder
            rimraf(path.resolve(OutputDir + '/fonts'), () => {});
            rimraf(path.resolve(OutputDir + '/images'), () => {});
        }).sourceMaps(!mix.inProduction())
        // .setResourceRoot('./')
        .options({ processCssUrls: false })
        .scripts(require('./resources/backend/core/plugins/plugins.js'), `${OutputDir}/plugins/global/plugins.bundle.js`);

    // Build extended plugin styles
    mix.sass(`resources/backend/${demo}/sass/plugins.scss`, `${OutputDir}/plugins/global/plugins-custom.bundle.css`);

    // Build Metronic css/js
    mix.sass(`resources/backend/${demo}/sass/style.scss`, `${OutputDir}/css/style.bundle.css`, { sassOptions: { includePaths: ['node_modules'] } })
        // .options({processCssUrls: false})
        .scripts(require(`./resources/backend/${demo}/js/scripts.js`), `${OutputDir}/js/scripts.bundle.js`);

    // Dark skin mode css files
    if (args.indexOf('dark_mode') !== -1) {
        mix.sass(`resources/backend/core/plugins/plugins.dark.scss`, `${OutputDir}/plugins/global/plugins.dark.bundle.css`);
        mix.sass(`resources/backend/${demo}/sass/plugins.dark.scss`, `${OutputDir}/plugins/global/plugins-custom.dark.bundle.css`);
        mix.sass(`resources/backend/${demo}/sass/style.dark.scss`, `${OutputDir}/css/style.dark.bundle.css`, { sassOptions: { includePaths: ['node_modules'] } });
    }


    // Build custom 3rd party plugins
    (glob.sync(`resources/backend/core/plugins/custom/**/*.js`) || []).forEach(file => {
                mix.js(file, `${OutputDir}/${file.replace(`resources/backend/core/`, '').replace('.js', '.bundle.js')}`);
});
(glob.sync(`resources/backend/core/plugins/custom/**/*.scss`) || []).forEach(file => {
    mix.sass(file, `${OutputDir}/${file.replace(`resources/backend/core/`, '').replace('.scss', '.bundle.css')}`);
});

// Build Metronic css pages (single page use)
(glob.sync(`resources/backend/${demo}/sass/pages/**/!(_)*.scss`) || []).forEach(file => {
    file = file.replace(/[\\\/]+/g, '/');
    mix.sass(file, file.replace(`resources/backend/${demo}/sass`, `${OutputDir}/css`).replace(/\.scss$/, '.css'));
});

var extendedFiles = [];
// Extend custom js files for laravel
(glob.sync('resources/backend/extended/js/**/*.js') || []).forEach(file => {
    var output = `${OutputDir}/${file.replace('resources/backend/extended/', '')}`;
    mix.scripts(file, output);
    extendedFiles.push(output);
});

// Metronic js pages (single page use)
(glob.sync('resources/backend/core/js/custom/**/*.js') || []).forEach(file => {
    var output = `${OutputDir}/${file.replace('resources/backend/core/', '')}`;
    if (extendedFiles.indexOf(output) === -1) {
        mix.js(file, output);
    }
});
(glob.sync(`resources/backend/${demo}/js/custom/**/*.js`) || []).forEach(file => {
    var output = `${OutputDir}/${file.replace(`resources/backend/${demo}/`, '')}`;
    if (extendedFiles.indexOf(output) === -1) {
        mix.js(file, output);
    }
});

// Metronic media
mix.copyDirectory('resources/backend/core/media', `${OutputDir}/media`);
mix.copyDirectory(`resources/backend/${demo}/media`, `${OutputDir}/media`);

// Metronic theme
(glob.sync(`resources/backend/${demo}/sass/themes/**/!(_)*.scss`) || []).forEach(file => {
    file = file.replace(/[\\\/]+/g, '/');
    mix.sass(file, file.replace(`resources/backend/${demo}/sass`, `${OutputDir}/css`).replace(/\.scss$/, '.css'));
});

let plugins = [
    new ReplaceInFileWebpackPlugin([
        {
            // rewrite font paths
            dir: path.resolve(`${OutputDir}/plugins/global`),
            test: /\.css$/,
            rules: [
                {
                    // fontawesome
                    search: /url\((\.\.\/)?webfonts\/(fa-.*?)"?\)/g,
                    replace: 'url(./fonts/@fortawesome/$2)',
                },
                {
                    // flaticon
                    search: /url\(("?\.\/)?font\/(Flaticon\..*?)"?\)/g,
                    replace: 'url(./fonts/flaticon/$2)',
                },
                {
                    // flaticon2
                    search: /url\(("?\.\/)?font\/(Flaticon2\..*?)"?\)/g,
                    replace: 'url(./fonts/flaticon2/$2)',
                },
                {
                    // keenthemes fonts
                    search: /url\(("?\.\/)?(Ki\..*?)"?\)/g,
                    replace: 'url(./fonts/keenthemes-icons/$2)',
                },
                {
                    // lineawesome fonts
                    search: /url\(("?\.\.\/)?fonts\/(la-.*?)"?\)/g,
                    replace: 'url(./fonts/line-awesome/$2)',
                },
                {
                    // socicons
                    search: /url\(("?\.\.\/)?font\/(socicon\..*?)"?\)/g,
                    replace: 'url(./fonts/socicon/$2)',
                },
                {
                    // bootstrap-icons
                    search: /url\(.*?(bootstrap-icons\..*?)"?\)/g,
                    replace: 'url(./fonts/bootstrap-icons/$1)',
                },
                {
                    // fonticons
                    search: /url\(.*?(fonticons\..*?)"?\)/g,
                    replace: 'url(./fonts/fonticons/$1)',
                },
            ],
        },
    ]),
];
if (args.indexOf('rtl') !== -1) {
    plugins.push(new WebpackRTLPlugin({
        filename: '[name].rtl.css',
        options: {},
        plugins: [],
        minify: false,
    }));
}

mix.webpackConfig({
    plugins: plugins,
    ignoreWarnings: [{
        module: /esri-leaflet/,
        message: /version/,
    }],
});

// Webpack.mix does not copy fonts, manually copy
(glob.sync(`resources/backend/core/plugins/**/*.+(woff|woff2|eot|ttf|svg)`) || []).forEach(file => {
    var folder = file.match(/resources\/.*?\/core\/plugins\/(.*?)\/.*?/)[1];
    mix.copy(file, `${OutputDir}/plugins/global/fonts/${folder}/${path.basename(file)}`);
});
(glob.sync('node_modules/+(@fortawesome|socicon|line-awesome|bootstrap-icons)/**/*.+(woff|woff2|eot|ttf)') || []).forEach(file => {
    var folder = file.match(/node_modules\/(.*?)\//)[1];
    mix.copy(file, `${OutputDir}/plugins/global/fonts/${folder}/${path.basename(file)}`);
});
(glob.sync('node_modules/jstree/dist/themes/default/*.+(png|gif)') || []).forEach(file => {
    mix.copy(file, `${OutputDir}/plugins/custom/jstree/${path.basename(file)}`);
});

// Raw plugins
(glob.sync(`resources/backend/core/plugins/custom/**/*.js.json`) || []).forEach(file => {
    let filePaths = JSON.parse(fs.readFileSync(file, 'utf-8'));
    const fileName = path.basename(file).replace('.js.json', '');
    mix.scripts(filePaths, `${OutputDir}/plugins/custom/${fileName}/${fileName}.bundle.js`);
});
mix.js('resources/backend/' + demo + '/js/app.js', OutputDir + '/js/app.js');

}

if (args.indexOf('front') !== -1) {
    //mix.config.fileLoaderDirs.fonts = 'assets/fonts';
    mix.setResourceRoot('/frontend/themes/default')
    mix.js('resources/frontend/front.js', 'public/frontend/themes/default/js/bundle.js') // Output: public/js/app.js
        .sass('resources/frontend/front.scss', 'public/frontend/themes/default/css/bundle.css'); // Output: public/css/app.css

    mix.copyDirectory('fonts/vendor/line-awesome/dist/line-awesome', 'public/frontend/themes/default/fonts/vendor/line-awesome/dist/line-awesome');
    mix.copyDirectory('fonts/vendor/@fortawesome/fontawesome-free', 'public/frontend/themes/default/fonts/vendor/line-awesome/dist/line-awesome');
    del('fonts/*');

}

function getDemos(pathDemos) {
    // get possible demo from parameter command
    let demos = [];
    args.forEach((arg) => {
        const demo = arg.match(/^demo.*/g);
        if (demo) {
            demos.push(demo[0]);
        }
    });
    if (demos.length === 0) {
        demos = ['demo1'];
    }
    return demos;
}

function getParameters() {

    var possibleArgs = [
        'dark_mode',
        'rtl',
        'admin',
        'front'
    ];
    for (var i = 0; i <= 13; i++) {
        possibleArgs.push('demo' + i);
    }

    var args = [];
    possibleArgs.forEach(function (key) {
        if (process.env['npm_config_' + key]) {
            args.push(key);
        }
    });

    return args;
}