/* eslint-env node */

module.exports = {
    content: ["./resources/assets/js/**/*.{vue,js,ts,jsx,tsx}"],
    theme: {
        extend: {},
    },
    important: ".vulpress-app",
    corePlugins: {
        preflight: false,
    },
    plugins: [],
};
