import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
        "./node_modules/flowbite/**/*.js", // Add Flowbite's components
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ["Inter",'Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primaryBg: '#F8FAFC',
                secondaryBg: '#D9EAFD',
                accent: '#BCCCDC',
                text: '#9AA6B2',
            },
        },
    },
    plugins: [require('flowbite/plugin'),],
};
