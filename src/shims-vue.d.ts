declare module '*.vue' {
	import Vue from 'vue'
	export default Vue
}

declare var ga: Function

declare module 'vue-chartist' {
	const Chartist: any
	export = Chartist
}
declare module 'twemoji' {
	const twemoji: any
	export = twemoji
}
declare module 'katex' {
	const katex: any
	export = katex
}
declare module 'js-beautify' {
	const js_beautify: any
	export = js_beautify
}
declare module 'markdown-it' {
	const markdown: any
	export = markdown
}