module.exports = {
	content: [
		"./resources/**/*.blade.php",
		"./resources/**/*.js"
	],
	theme: {
		screens: {
			'xs': '360px',
			'sm': '640px',
			'md': '768px',
			'lg': '1024px',
			'xl': '1280px',
			'2xl': '1536px',
		},
		extend: {}
	},
	plugins: [
		/* todo :
		* Make sure the class is only present during development
	 	* <body class="debug-screens">
	 	*/
    require('tailwindcss-debug-screens')
  ]
}
