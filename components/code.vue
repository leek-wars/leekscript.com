<template>
	<code><div ref="e"></div></code>
</template>

<script lang="ts">
	import { Component, Prop, Vue, Watch } from 'vue-property-decorator'
	@Component({ name: 'lw-code' })
	export default class Code extends Vue {
		@Prop({required: true}) code!: string
		@Watch('code', {immediate: true})
		update() {
			this.$nextTick(() => {
				this.$data.CodeMirror.runMode(this.code, "leekscript", this.$refs.e as HTMLElement)
			})
		}
	}
</script>

<style scoped>
	code {
		background: white;
		padding-top: 1px;
		padding-bottom: 1px;
		margin-right: 2px;
	}
	div {
		display: inline-block;
		color: black;
		font-weight: normal;
	}
</style>