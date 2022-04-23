const mix = require('laravel-mix');

// Laravel mix configuration
mix.js('resources/js/app.js', 'public/js')
    .vue()
    .postCss('resources/css/app.css', 'public/css')
    .sass('resources/sass/app.scss', 'public/css');

// Laravel mix options
mix.options({
    processCssUrls: false,
    postCss: [require("tailwindcss")],
});
