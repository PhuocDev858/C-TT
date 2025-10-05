import { defineConfig } from 'vite';

export default defineConfig({
    // No build needed - using existing assets in public/
    build: {
        manifest: false,
        rollupOptions: {
            input: {}
        }
    }
});
