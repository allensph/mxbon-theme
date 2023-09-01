const theme = require('./theme.json');
const tailpress = require("@jeffreyvr/tailwindcss-tailpress");

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './*.php',
        './**/*.php',
        './resources/css/*.css',
        './resources/js/*.js',
        './safelist.txt'
    ],
    theme: {
        container: {
            padding: {
                DEFAULT: '1rem',
                sm: '2rem',
                lg: '0rem'
            },
        },
        extend: {
            aspectRatio: {
                'industry': '460 / 613',
            },
            backgroundPosition: {
                'caret-down-position': 'calc(100% - 12px)',
            },
            backgroundImage: {
                'lang-icon': 'url("/wp-content/themes/tailpress-master/resources/images/lang-icon.svg")',
                'lang-icon-hover': 'url("/wp-content/themes/tailpress-master/resources/images/lang-icon-hover.svg")',
                'caret-down': 'url("/wp-content/themes/tailpress-master/resources/images/caret-down.svg")',
                'caret-down-focus': 'url("/wp-content/themes/tailpress-master/resources/images/caret-down-focus.svg")',
                'industries-section': 'url("/wp-content/themes/tailpress-master/resources/images/industries-bg.jpg")',
                'contact-section': 'url("/wp-content/themes/tailpress-master/resources/images/contact-bg.jpg")',
            },
            boxShadow: {
                'card': '0px 7px 29px 0px rgba(100, 100, 111, 0.20)',
                'border-light': 'inset 0 0 0 1px #D4D4D8',
                'radio-not-checked': 'inset 0 0 0 1px #27272A',
                'radio-checked': 'inset 0 0 0 1px #DA2127, inset 0 0 0 3px #FFFFFF, inset 0 0 0 9px #DA2127'
            },
            colors: tailpress.colorMapper(tailpress.theme('settings.color.palette', theme)),
            fontSize: tailpress.fontSizeMapper(tailpress.theme('settings.typography.fontSizes', theme)),
            fontFamily: {
                'sans': ['Noto Sans TC', 'sans-serif'],
                'raj': ['Rajdhani', 'sans-serif'],
                'awesome': '"Font Awesome 6 Free"'
            },
            maxWidth: {
                '8xl': '1440px',
                '9xl': '1536px',
            },
            transitionProperty: {
                'bg': 'background',
            },
            transitionTimingFunction: {
                'out-quad': 'cubic-bezier(0.250, 0.460, 0.450, 0.940)',
            },
            lineHeight: {
                'ext-tight': '120%',
            },
            colors: {
                mxbon: {
                    'red': '#DA2127',
                    'dark-red': '#BB1A1F',
                },
            },
        },
        clipPath: {
            'hexagon': 'polygon(50% 0%, 100% 25%, 100% 75%, 50% 100%, 0% 75%, 0% 25%)',
            'left-triangle': 'polygon(100% 0, 0 0, 0 100%)',
        },
        screens: {
            'xs': '480px',
            'sm': '600px',
            'md': '768px',
            'lg': tailpress.theme('settings.layout.contentSize', theme),//960
            'xl': tailpress.theme('settings.layout.wideSize', theme),//1280
            '2xl': '1440px',
            '3xl': '1536px',
        }
    },
    plugins: [
        tailpress.tailwind,
        require('tailwind-clip-path'),
        require('@neojp/tailwindcss-line-clamp-utilities'),
    ]
};
