import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: ["./resources/**/*.blade.php",],
    theme: {
        extend: {
            font: {
                sans: ['Segoe UI', 'sans-serif'],
            },
        },
    },
    plugins: [],
}
