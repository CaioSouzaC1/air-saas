// vite.config.js
import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    server: {
        host: "0.0.0.0", // Permite conexões externas
        port: 5173,
        hmr: {
            host: "127.0.0.1", // Força o uso de IPv4
            protocol: "ws",
            port: 5173,
        },
    },
    plugins: [
        laravel({
            input: ["resources/css/app.css", "resources/js/app.js"],
            refresh: true,
        }),
    ],
});
