module.exports = {
    content: [
        // https://tailwindcss.com/docs/content-configuration
        //'./**/*.php', // recursive search for *.php (be aware on every file change it will go even through /node_modules which can be slow, read doc)
        './*.php',
        './inc/**/*.php',
        './templates/**/*.php',
        './views/**/*.php',
        './woocommerce/**/*.php',
        './safelist.txt',
    ],
    safelist: [
        // 'text-center',
        // {
        //     pattern: /text-(white|black)-(200|500|800)/
        // }
    ],
    theme: {

        extend: {

            scale: {
                '101': '1.01',
            },

            boxShadow: {
                '1': '0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24)',
                '2': '0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23)',
                '3': '0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23)',
                '4': '0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22)',
                '5': '0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22)',

                'inner-1': 'inset 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24)',
                'inner-2': 'inset 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23)',
                'inner-3': 'inset 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23)',
                'inner-4': 'inset 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22)',
                'inner-5': 'inset 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22)',
            },

            screens: {
                // 'sm': '400px',
                // // => @media (min-width: 640px) { ... }
                //
                // 'md': '600px',
                // // => @media (min-width: 768px) { ... }
                //
                // 'lg': '900px',
                // // => @media (min-width: 1024px) { ... }
                //
                // 'xl': '1200px',
                // // => @media (min-width: 1280px) { ... }
                //
                // '2xl': '1500px',
                // // => @media (min-width: 1536px) { ... }

                // 'lg': '1025px',

                // 'xl': '1201px',

                'r150': {'max': '1500px'},

                'r140': {'max': '1438px'},

                'r120': {'max': '1200px'},

                'r90': {'max': '900px'},

                'r60': {'max': '600px'},

                'r40': {'max': '400px'},

            },

            lineHeight: {
                // leading-10	line-height: 2.5rem; /* 40px */
                '11': '2.75rem',
                '12': '3rem',
                '13': '3.25rem',
                '14': '3.5rem',
                '15': '3.75rem',
                '16': '4rem',
            },
            colors: {
                'chinese-black': '#111111',
                'light-blue': '#1977FB',
                'french-sky-blue': '#7C99FF',
                'alice-blue': '#F4F7FF',
            },
        },

        fontFamily: {
            'open-sans': ['Open Sans', 'Helvetica', 'Arial', 'Lucida', 'sans-serif'],
            'bree-serif': ['Bree Serif', 'Helvetica', 'Arial', 'Lucida', 'sans-serif'],
            'montserrat': ['Montserrat', 'sans-serif'],
            'poppins': ['poppins', 'Montserrat', 'sans-serif'],
            'lato': ['Lato', 'sans-serif'],
            'raleway': ['Raleway', 'sans-serif'],
        },


        borderWidth: ({theme}) => ({
            ...theme('spacing'),
            // DEFAULT: '1px',
            // 0: '0px',
            // 2: '2px',
            // 4: '4px',
            // 8: '8px',
        }),

        spacing: {
            0: '0px',
            1: '1px',
            2: '2px',
            3: '3px',
            4: '4px',
            5: '5px',
            6: '6px',
            7: '7px',
            8: '8px',
            9: '9px',

            10: '10px',
            12: '12px',
            15: '15px',
            16: '16px',
            20: '20px',
            23: '23px',
            24: '24px',
            25: '25px',
            30: '30px',
            32: '32px',
            35: '35px',
            38: '38px',
            40: '40px',
            45: '45px',
            48: '48px',
            50: '50px',
            55: '55px',
            60: '60px',
            64: '64px',
            65: '65px',
            70: '70px',
            75: '75px',
            80: '80px',
            85: '85px',
            90: '90px',
            95: '95px',

            100: '100px',
            110: '110px',
            120: '120px',
            125: '125px',
            135: '135px',
            140: '140px',
            150: '150px',
            160: '160px',
            175: '175px',

            200: '200px',
            225: '225px',
            250: '250px',
            256: '256px',
            275: '275px',

            300: '300px',
            320: '320px',
            325: '325px',
            350: '350px',
            375: '375px',

            400: '400px',
            425: '425px',
            450: '450px',
            475: '475px',

            500: '500px',

            600: '600px',
            625: '625px',
            650: '650px',
            675: '675px',

            700: '700px',
            725: '725px',
            750: '750px',
            775: '775px',

            // 0.5: '0.125rem', // 2px
            // 1: '0.25rem',    // 4px
            // 1.5: '0.375rem', // 6px
            // 2: '0.5rem',     // 8px
            // 2.5: '0.625rem', // 10px
            // 3: '0.75rem',    // 12px
            // 3.5: '0.875rem', // 14px
            // 4: '1rem',       // 16px
            // 5: '1.25rem',    // 20px
            // 6: '1.5rem',     // 24px
            // 7: '1.75rem',    // 28px
            // 8: '2rem',       // 32px
            // 9: '2.25rem',    // 36px
            // 10: '2.5rem',    // 40px
            // 11: '2.75rem',   // 44px
            // 12: '3rem',      // 48px
            // 14: '3.5rem',    // 56px
            // 16: '4rem',      // 64px
            // 20: '5rem',      // 80px
            // 24: '6rem',      // 96px
            // 28: '7rem',      // 112px
            // 32: '8rem',      // 128px
            // 36: '9rem',      // 144px
            // 40: '10rem',     // 160px
            // 44: '11rem',     // 176px
            // 48: '12rem',     // 192px
            // 52: '13rem',     // 208px
            // 56: '14rem',     // 224px
            // 60: '15rem',     // 240px
            // 64: '16rem',     // 256px
            // 72: '18rem',     // 288px
            // 80: '20rem',     // 320px
            // 96: '24rem',     // 384px
        },
    },
    corePlugins: {
        container: false
    },
    plugins: [
        function ({addComponents}) {
            addComponents({
                '.container': {
                    maxWidth: '1438px',
                    // '@screen r120': {
                    //     maxWidth: '900px',
                    // },
                    // '@screen r90': {
                    //     maxWidth: '100%',
                    // },
                    // '@screen r60': {
                    //     maxWidth: '100%',
                    // },

                    // '@screen sm': {
                    //     maxWidth: '640px',
                    // },
                    // '@screen md': {
                    //     maxWidth: '768px',
                    // },
                    // '@screen lg': {
                    //     maxWidth: '1280px',
                    // },
                    // '@screen xl': {
                    //     maxWidth: '1400px',
                    // },
                }
            })
        }
    ]
}