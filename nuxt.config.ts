module.exports = {
	/*
	** Headers of the page
	*/
	head: {
		title: 'leekscript.com',
		meta: [
			{ charset: 'utf-8' },
			{ name: 'viewport', content: 'width=device-width, initial-scale=1' },
			{ hid: 'description', name: 'description', content: 'Nuxt.js project' },
			{ name: "theme-color", content: "#00ACC1" }
		],
		link: [
			{ rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' },
			{ href: "https://use.fontawesome.com/releases/v5.0.13/css/all.css", rel: "stylesheet" }
		]
	},
	/*
	** Customize the progress bar color
	*/
	loading: { color: '#3B8070' },
	meta: {
		theme_color: '#00ACC1'
	},
	/*
	** Build configuration
	*/
	build: {
	/*
	** Run ESLint on save
	*/
	// extend (config, { isDev, isClient }) {
	//   if (isDev && isClient) {
	//     config.module.rules.push({
	//       enforce: 'pre',
	//       test: /\.(js|vue)$/,
	//       loader: 'eslint-loader',
	//       exclude: /(node_modules)/
	//     })
	//   }
	// }
	},
	plugins: [
		{src: '~plugins/codemirror.js', ssr: false}
	],
	css: [
		'codemirror/lib/codemirror.css',
		'~plugins/leekscript.css'
	],
	modules: [
		'@nuxtjs/vuetify'
	],
	vuetify: {
		theme: {
			primary: '#00ACC1'
		}
	}
}

