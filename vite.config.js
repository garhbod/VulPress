import { fileURLToPath, URL } from "url";

import { defineConfig } from "vite";
import * as path from "path";
import vue from "@vitejs/plugin-vue";

// https://vitejs.dev/config/
export default defineConfig({
    plugins: [vue()],
    resolve: {
        alias: {
            "@": fileURLToPath(new URL("./resources/assets", import.meta.url)),
        },
    },
    build: {
        lib: {
            entry: path.resolve(__dirname, "resources/assets/js/main.js"),
            name: "MyLib",
            formats: ["umd"],
            fileName: (format) => `my-lib.${format}.js`,
        },
    },
});
