import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
                poppins: ["var(--font-poppins)"],
            },
            colors: {
                primary: "var(--color-primary)",
                "primary-dark": "var(--color-primary-dark)",
                "primary-darker": "var(--color-primary-darker)",
                "primary-darkest": "var(--color-primary-darkest)",
                "primary-light": "var(--color-primary-light)",
                "primary-lighter": "var(--color-primary-lighter)",
                "primary-lightest": "var(--color-primary-lightest)",

                secondary: "var(--color-secondary)",
                "secondary-dark": "var(--color-secondary-dark)",
                "secondary-darker": "var(--color-secondary-darker)",
                "secondary-darkest": "var(--color-secondary-darkest)",
                "secondary-light": "var(--color-secondary-light)",
                "secondary-lighter": "var(--color-secondary-lighter)",
                "secondary-lightest": "var(--color-secondary-lightest)",

                black: "var(--color-black-theme)",
                white: "var(--color-white-theme)",
                "grey-light": "var(--color-grey-light)",
                "grey-dark": "var(--color-grey-dark)",
                "grey-darker": "var(--color-grey-darker)",
            },
        },
    },

    plugins: [forms],
};
