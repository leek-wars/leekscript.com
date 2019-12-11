<template>
	<no-ssr placeholder="Codemirror Loading...">
		<codemirror v-model="code" :options="options"></codemirror>
	</no-ssr>
</template>

<script lang="ts">
	import { Component, Prop, Vue, Watch } from 'vue-property-decorator'
	@Component({})
	export default class Editor extends Vue {
		public code: string = 'let n = [1, 2, 3, 4]\nlet carrés = n ~~ x -> x ** 2\n\nSystem.print("hello world!")\ncarrés.sum()'
		public options = {
			theme: 'leekscript',
			mode: 'leekscript',
			tabSize: 4,
			indentWithTabs: true,
			smartIndent: false,
			foldGutter: true,
			styleActiveLine: true,
			lineNumbers: true,
			lineWrapping: true,
			line: true,
		}
	}
</script>

<style>
	.vue-codemirror {
		text-align: left;
		box-shadow: 0 2px 1px -1px rgba(0,0,0,.2), 0 1px 1px 0 rgba(0,0,0,.14), 0 1px 3px 0 rgba(0,0,0,.12);
		line-height: 30px;
	}
</style>
