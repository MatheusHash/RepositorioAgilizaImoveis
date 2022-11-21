const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        require('tailwindcss'),
        require('autoprefixer'),
    ])
    .browserSync("127.0.0.1:8000")
.options({
    processCssUrls: false,
    postCss: [tailwindcss('./tailwind.config.js')],
});
