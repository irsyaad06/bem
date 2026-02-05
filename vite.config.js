import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import vue from "@vitejs/plugin-vue";
import tailwindcss from "@tailwindcss/vite"; // Tambahkan import ini
import path from "path";

export default defineConfig({
    plugins: [
        tailwindcss(), // Tambahkan plugin ini di urutan PERTAMA
        laravel({
            input: ["resources/css/app.css", "resources/js/app.js"],
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    resolve: {
        alias: {
            "ziggy-js": path.resolve("vendor/tightenco/ziggy"),
            "@": path.resolve(__dirname, "resources/js"),
        },
    },
});