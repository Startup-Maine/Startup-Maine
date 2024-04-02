const mix = require('laravel-mix');
mix.options = {
	
}

mix.sass('./assets/styles/editor.scss', './assets/css/editor.css');
mix.sass('./assets/styles/main.scss',   './assets/css/main.css');
mix.js([
	'./node_modules/jquery/dist/jquery.min.js',
	'./node_modules/jquery-ui-dist/jquery-ui.js',
	'./node_modules/bootstrap/dist/js/bootstrap.min.js',
	'./node_modules/js-cookie/dist/js.cookie.js',
	'./node_modules/lazysizes/lazysizes.min.js',
	'./assets/scripts/main.js',
], './assets/js/main.js');
