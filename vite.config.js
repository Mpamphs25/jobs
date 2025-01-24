import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';    

export default defineConfig({
    plugins: [
        tailwindcss(),
        require('@tailwindcss/forms'),
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        
    ],
    server: {
        hmr: {
            overlay: false, // Optional: disable error overlay if needed
        },
    },
});
