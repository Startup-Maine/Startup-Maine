const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

elixir((mix) => {
	mix.sass('./assets/style.scss', './assets/css/main.css')
	.scripts([
		'./node_modules/jquery/dist/jquery.min.js',
		'./node_modules/bootstrap-sass/assets/javascripts/bootstrap.js',
		'./node_modules/js-cookie/src/js.cookie.js',
		'./assets/script.js',
	], './assets/js/main.js');
});