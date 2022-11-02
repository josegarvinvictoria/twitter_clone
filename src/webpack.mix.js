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

mix.browserSync({
    // fixes pagination urls otherwise they get re-written to use the service `container_name`...
   host: '0.0.0.0',
   // service container_name...
   proxy: 'server',
   // matches the port number exposed earlier...
   //port: 3000,
   open: false,
});
