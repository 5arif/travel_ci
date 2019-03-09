let mix = require('laravel-mix');
mix.setPublicPath('public_html');

mix.js('resources/js/test.js', 'public_html/js')
//    .js('resources/scripts/offcanvas.js', 'public/js')
//    .postCss('resources/styles/app.css', 'public/css')
//    .postCss('resources/styles/offcanvas.css', 'public/css')

mix.version();
mix.version([
   'public_html/vendor/jquery/jquery-3.3.1.min.js',
]);
