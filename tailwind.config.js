/** @type {import('tailwindcss').Config} */
const colors = require('tailwindcss/colors')

export default {
    presets: [require("./vendor/wireui/wireui/tailwind.config.js")],
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./vendor/wireui/wireui/src/*.php",
        "./vendor/wireui/wireui/ts/**/*.ts",
        "./vendor/wireui/wireui/src/WireUi/**/*.php",
        "./vendor/wireui/wireui/src/Components/**/*.php",
    ],
    theme: {
        extend: {
            colors: {
                primary: colors.sky,
                secondary: colors.stone,
                positive: colors.emerald,
                negative: colors.red,
                warning: colors.amber,
                info: colors.blue
            },
            fontFamily: {
                segoe: ['"Segoe UI"', 'Roboto', '"Helvetica Neue"', 'Arial', 'sans-serif'],
              },
        },
    },
    plugins: [],
};
