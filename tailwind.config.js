import forms from '@tailwindcss/forms';
import defaultTheme from 'tailwindcss/defaultTheme';
const colors = require("tailwindcss/colors");

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        colors: {
            primary: {
                50: "#f0fdfb",
                100: "#cef9f3",
                200: "#9cf3e8",
                300: "#63e5da",
                400: "#33cec5",
                500: "#1ab2ab",
                600: "#128f8c",
                700: "#137271",
                800: "#145a5b",
                900: "#113d3d",
                950: "#062a2d",
            },
            secondary: {
                50: "#fef6ee",
                100: "#fdead7",
                200: "#fbd1ad",
                300: "#f8af79",
                400: "#f48443",
                500: "#f16521",
                600: "#e24a14",
                700: "#bb3613",
                800: "#952c17",
                900: "#782716",
                950: "#411009",
            },
            gray: colors.gray,
            black: colors.black,
            white: colors.white,
            transparent: "transparent",
            current: "currentColor",
        },
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],
};
