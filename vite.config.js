import { fileURLToPath, URL } from "url";

import { defineConfig } from "vite";
import * as path from "path";
import vue from "@vitejs/plugin-vue";

// https://vitejs.dev/config/
export default defineConfig({
    plugins: [vue()],
    resolve: {
        alias: {
            "@": fileURLToPath(new URL("./resources", import.meta.url)),
        },
    },
    build: {
        outDir: "assets/compiled",
        lib: {
            entry: path.resolve(__dirname, "resources/js/main.js"),
            name: "MyLib",
            formats: ["umd"],
            fileName: (format) => `my-lib.${format}.js`,
        },
    },
});
