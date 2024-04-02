import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel([
            './resources/styles/editor.scss',
            './resources/styles/main.scss',
            './node_modules/jquery/dist/jquery.min.js',
            './node_modules/jquery-ui-dist/jquery-ui.js',
            './node_modules/bootstrap/dist/js/bootstrap.min.js',
            './node_modules/lazysizes/lazysizes.min.js',
            '@/main.js',
        ]),
    ],
});