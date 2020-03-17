const cssImport = require('postcss-import');
const cssNesting = require('postcss-nesting');
const mix = require('laravel-mix');
const path = require('path');
const purgecss = require('@fullhuman/postcss-purgecss');
const tailwindcss = require('tailwindcss');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.setPublicPath('public')
    .js('resources/js/app.js', 'public')
    .postCss('resources/css/app.css', 'public')
    .options({
        postCss: [
            cssImport(),
            cssNesting(),
            tailwindcss('tailwind.config.js'),
            ...mix.inProduction() ? [
                purgecss({
                    content: ['./resources/views/**/*.blade.php', './resources/js/**/*.vue'],
                    defaultExtractor: content => content.match(/[\w-/:.]+(?<!:)/g) || [],
                    whitelistPatternsChildren: [/nprogress/],
                }),
            ] : [],
        ],
    })
    .webpackConfig({
        output: {
            publicPath: '/vendor/laradash/',
            chunkFilename: '[name].js?id=[chunkhash]'
        },
        resolve: {
            alias: {
                'styles': path.resolve('resources/css'),
                '@': path.resolve('resources/js'),
            },
        },
    })
    .version()
    .sourceMaps();
