import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            '~bootstrap': 'bootstrap',
            '~admin-lte': 'admin-lte',
        }
    },
    server: {
        host: 'localhost',
        port: 5300,
        strictPort: true,
    }
});