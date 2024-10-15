/** @type {import('tailwindcss').Config} */
export default {
    content: [
        // You will probably also need these lines
        "./resources/**/**/*.blade.php",
        "./resources/**/**/*.js",
        "./app/View/Components/**/**/*.php",
        "./app/Livewire/**/**/*.php",

        // Add mary
        "./vendor/robsontenorio/mary/src/View/Components/**/*.php",
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',

    ],
    theme: {
        extend: {
            fontFamily: {
                segoe: ['"Segoe UI"', 'Roboto', '"Helvetica Neue"', 'Arial', 'sans-serif'],
              },
        },
    },

    // Add daisyUI
    plugins: [require("daisyui")],
     // daisyUI config (optional - here are the default values)
  daisyui: {
    themes: ['nord'], 
  },
}
