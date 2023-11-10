import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js','resources/css/stylee.css','resources/js/script-easy.js','resources/js/script-medium.js'],
            refresh: true,
        }),
    ],
});
