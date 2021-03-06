const mix = require('laravel-mix');

mix.js([
	'resources/js/app.js',
	'resources/js/alpine.js',
	'resources/js/custom.js',
], 'public/js').postCss("resources/css/app.css", "public/css", [
	require("tailwindcss"),
]);

mix.copyDirectory("resources/img/*", "public/img");

mix.copy("resources/favicon.ico", "public/favicon.ico");
