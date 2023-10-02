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
            animation: {
                'fade-out': 'fade-out .5s ease-in forwards',
            },
            keyframes: {
                'fade-out': {
                    '0%': { opacity: '1' }, '100%': { opacity: '0' },
                }
            },
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
                'molecular-white': 'url("/wp-content/themes/tailpress-master/resources/images/molecular-white-bg.jpg")',
                'molecular-blue': 'url("/wp-content/themes/tailpress-master/resources/images/molecular-blue-bg.jpg")',
                'history-scale': 'url("/wp-content/themes/tailpress-master/resources/images/dot-line.svg")',
                'abstract-white': 'url("/wp-content/themes/tailpress-master/resources/images/abstract-w-bg.jpg")',
            },
            boxShadow: {
                'card': '0px 7px 29px 0px rgba(100, 100, 111, 0.20)',
                'border-light': 'inset 0 0 0 1px #D4D4D8',
                'radio-not-checked': 'inset 0 0 0 1px #27272A',
                'radio-checked': 'inset 0 0 0 1px #DA2127, inset 0 0 0 3px #FFFFFF, inset 0 0 0 9px #DA2127'
            },
            brightness: {
                '140': '1.4',
            },
            colors: tailpress.colorMapper(tailpress.theme('settings.color.palette', theme)),
            dropShadow: {
                'fab': [
                    '0px 4px 6px rgba(0, 0, 0, 0.05)',
                    '0px 10px 15px rgba(0, 0, 0, 0.10)'
                ],
            },
            filterOrder: {
                'sdgs': 'contrast sepia brightness saturate',
            },
            fontSize: tailpress.fontSizeMapper(tailpress.theme('settings.typography.fontSizes', theme)),
            fontFamily: {
                'sans': ['Noto Sans TC', 'sans-serif'],
                'raj': ['Rajdhani', 'sans-serif'],
                'awesome': '"Font Awesome 6 Free"',
                'swiper-icons': '"swiper-icons"',
            },
            maxWidth: {
                '8xl': '1440px',
                '9xl': '1536px',
                '10xl': '1920px',
            },
            transitionProperty: {
                'bg': 'background',
                'spacing': 'margin, padding',
            },
            transitionTimingFunction: {
                'out-quad': 'cubic-bezier(0.250, 0.460, 0.450, 0.940)',
            },
            spacing: {
                'unset': 'unset',
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
            //'lg': tailpress.theme('settings.layout.contentSize', theme),//960
            'lg': '1024px',
            'xl': tailpress.theme('settings.layout.wideSize', theme),//1280
            '2xl': '1440px',
            '3xl': '1536px',
        },
        transitionDuration: {
            DEFAULT: '300ms',
            75: '75ms',
            100: '100ms',
            150: '150ms',
            200: '200ms',
            300: '300ms',
            500: '500ms',
            700: '700ms',
            1000: '1000ms',
        }
    },
    plugins: [
        tailpress.tailwind,
        require('tailwind-clip-path'),
        require('@neojp/tailwindcss-line-clamp-utilities'),
        require('@joshdavenport/tailwindcss-filter-order'),
    ]
};
