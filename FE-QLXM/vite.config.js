import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                // Skip resources files that don't exist or cause build issues
                // 'resources/css/app.css', 
                // 'resources/js/app.js'
            ],
            refresh: true,
        }),
    ],
    build: {
        // Skip build process for Heroku deployment
        outDir: 'public/build',
        emptyOutDir: true,
        manifest: true,
        rollupOptions: {
            input: {
                // Empty input to avoid build errors
            }
        }
    }
});
