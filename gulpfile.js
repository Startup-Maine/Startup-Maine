const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

elixir((mix) => {
	mix.sass('./assets/main.scss', './assets/css/main.css')
	.scripts([
		'./node_modules/jquery/dist/jquery.min.js',
		'./node_modules/bootstrap-sass/assets/javascripts/bootstrap.js',
		'./assets/main.js',
	], './assets/js/main.js');
});