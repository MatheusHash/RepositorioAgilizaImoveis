const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');

mix.js('resources/js/app.js', 'public/js').postCss('resources/css/app.css', 'public/css', [
    require('tailwindcss'),
    require('autoprefixer')
])
.options({
    processCssUrls: false,
    postCss: [tailwindcss('./tailwind.config.js')],
});
