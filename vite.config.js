import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import ckeditor5 from '@ckeditor/vite-plugin-ckeditor5';

import { createRequire } from 'node:module';
const require = createRequire( import.meta.url );

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js', 'resources/js/ckeditor.js'],
            refresh: true,
        }),
        ckeditor5({ theme: require.resolve( '@ckeditor/ckeditor5-theme-lark' ) })
    ],
});
