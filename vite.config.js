import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
            ],
            refresh: [
                'resources/routes/**',
                'routes/**',
                'resources/views/**',
                'app/Http',
                'app/Models'
            ],
            refresh: true,
        }),
    ],
});
