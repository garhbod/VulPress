/* eslint-env node */

module.exports = {
    content: ["./resources/js/**/*.{vue,js,ts,jsx,tsx}"],
    theme: {
        extend: {},
    },
    important: ".vulpress-app",
    corePlugins: {
        preflight: false,
    },
    plugins: [],
};
