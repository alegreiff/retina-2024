// Set the Preflight flag based on the build target.
const includePreflight = 'editor' === process.env._TW_TARGET ? false : true;
/** @type {import ('tailwindcss').Config} */
module.exports = {
	darkMode: 'class',
	presets: [
		// Manage Tailwind Typography's configuration in a separate file.
		require('./tailwind-typography.config.js'),
	],
	content: [
		// Ensure changes to PHP files and `theme.json` trigger a rebuild.
		'./theme/**/*.php',
		'./theme/theme.json',
	],
	theme: {
		// Extend the default Tailwind theme.
		extend: {
			fontFamily: {
				rail: ['Raleway', 'sans-serif'],
				cursi: ['Allura', 'handwriting'],
				//barlow: ['Barlow', 'sans-serif'],
				//monserrat: ['Montserrat', 'sans-serif'],
				//allura: "'Allura', handwriting",
			},
			screens: {
				chiqui: { max: '400px' },
				'2xl': { min: '1920px' },
				/* '2xl': {'1920px' }, */
			},
			colors: {
				rl: {
					morafuerte: '#190933',
					moramedio: '#301A5C',
					morasuave: '#7D009A',
					morablanco: '#F7D6FF',
					amarillo: '#FFA700',
					verde: '#00AD96',
					verdeclaro: '#84ffef',
					blanco: '#f8f8f8',
					negro: '#36454F',
				},
				/* https://uicolors.app/create */
			},
		},
	},
	corePlugins: {
		// Disable Preflight base styles in builds targeting the editor.
		preflight: includePreflight,
	},
	plugins: [
		require('daisyui'),
		// Extract colors and widths from `theme.json`.
		require('@_tw/themejson')(require('../theme/theme.json')),
		require('@tailwindcss/container-queries'),

		// Add Tailwind Typography.
		require('@tailwindcss/typography'),

		// Uncomment below to add additional first-party Tailwind plugins.
		// require('@tailwindcss/forms'),
		// require('@tailwindcss/aspect-ratio'),
		// require('@tailwindcss/container-queries'),
	],
};

/* 


font-family: 'Barlow', sans-serif;
font-family: 'Montserrat', sans-serif;*/
