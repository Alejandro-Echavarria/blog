const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    darkMode: 'class',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    safelist: [
        
        'bg-blue-500',
        'bg-red-500',
        'bg-purple-500',
        'bg-yellow-500',
        'bg-green-500',
        'bg-pink-500',
        'bg-indigo-500',
        'bg-blue-200',
        'bg-red-200',
        'bg-purple-200',
        'bg-yellow-200',
        'bg-green-200',
        'bg-pink-200',
        'bg-indigo-200',
        
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
        corePlugins: {
            container: false,
        }
};
