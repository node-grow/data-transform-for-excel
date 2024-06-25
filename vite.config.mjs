import {defineConfig} from 'vite';
import vue from '@vitejs/plugin-vue';
import path from 'node:path';

export default defineConfig({
    resolve: {
        alias: {
            '@': path.resolve(__dirname, './resources'),
        }
    },
    plugins: [
        vue(),
    ],

    define: {
        'process.env': {}
    },

    build: {
        target: "modules",
        copyPublicDir: false,
        emptyOutDir: true,
        minify: true,
        // outDir: path.resolve(__dirname, './assets/components/'),
        outDir: path.resolve(__dirname, '../../../public/node-admin/data-transform-for-excel/components/'),
        lib: {
            entry: path.resolve(__dirname, './resources/components/DataExport/index.ts'),
            name: 'DataExport',
            fileName: 'data-export',
            formats: ['umd']
        }
    },
});
