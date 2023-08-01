import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/sass/app.scss', 'resources/sass/style.scss', 'resources/css/calendar.css', 'resources/css/slick.css', 'resources/css/slick-theme.css'],
            refresh: true
        }),
    ],
    resolve: {
        alias: {
            '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap'),
            '$': 'jQuery'
        }
    },
});
