const defaultTheme = require('tailwindcss/defaultTheme')

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
        extend: {
            fontFamily: {
                sans: ['"DM Sans"', ...defaultTheme.fontFamily.sans],
            },
        },
    },
    plugins: [],
}
