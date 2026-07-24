/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./**/*.php",
        "./**/*.html",
        "./assets/js/**/*.js",
        "!./node_modules/**",
        "!./vendor/**"
    ],
    theme: {
        extend: {},
    },
    plugins: [],
}
