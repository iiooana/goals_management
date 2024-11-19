import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                bluew : {
                    '50': '#f0f9ff',
                    '100': '#e0f2fe',
                    '200': '#bae2fd',
                    '300': '#7dc9fc',
                    '400': '#38abf8',
                    '500': '#0e91e9',
                    '600': '#0278c7',
                    '700': '#0362a1',
                    '800': '#075385',
                    '900': '#0c476e',
                    '950': '#082f49',
                },
            }
        },      
    },
    plugins: [],
};
