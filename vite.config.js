import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        vue(),
        laravel({
            input: ['resources/apps/create-product.js'],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            '@': '/resources',
            '@apps': '/resources/apps',
            '@components': '/resources/components',
        }
    },
});
