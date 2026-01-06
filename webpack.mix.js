const mix = require("laravel-mix");

mix.js("resources/js/app.js", "public/backend/js")
   .sass('resources/scss/app.scss', 'public/backend/css')
   .version();
   mix.copyDirectory("vendor/tinymce/tinymce", "public/js/tinymce");


