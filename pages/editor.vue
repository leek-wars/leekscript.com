<template>
	<v-container>
		<h1>LeekScript online editor</h1>
		<editor ref="editor"></editor>
		<v-btn color="primary" @click="execute()">
			<v-icon>play_arrow</v-icon>&nbsp;&nbsp;Execute
		</v-btn>
		<v-btn color="info">
			<v-icon>settings</v-icon>&nbsp;&nbsp;Analyse
		</v-btn>
		<v-btn color="success" @click="random()">
			<img height=24 src='@/assets/dice.png'>&nbsp;&nbsp;Random
		</v-btn>
		<div class="result" v-if="result">
			<div class="output" v-if="result.output"><pre>{{ result.output }}</pre></div>
			<div><lw-code :code="result.res"/></div>
			<div class="time">{{ Math.round(result.time / 1000) / 1000 }}ms • {{ result.ops }} operations</div>
		</div>
	</v-container>
</template>

<script lang="ts">
import { Component, Vue } from 'vue-property-decorator'
import { LeekScript } from '~/store/leekscript'
import Editor from '~/components/Editor.vue'
import Code from '~/components/code.vue'

@Component({
	components: { Editor, 'lw-code': Code }
})
export default class EditorPage extends Vue {
	result: string | null = null
	execute() {
		let code = (this.$refs.editor as Editor).code
		console.log("execute", code)
		this.result = null
		LeekScript.post<any>('leekscript/execute', {code: code}).then(r => {
			console.log(r)
			this.result = JSON.parse(r.result)
		})
	}
	random() {
		LeekScript.get('leekscript/random').then(r => {
			(this.$refs.editor as Editor).code = r.code
		})
	}
}
</script>

<style scoped>
	button {
		margin: 10px 0;
		padding-left: 8px;
	}
	.result {
		padding: 10px 0;
		word-break: break-all;
	}
	code {
		font-size: 16px;
		margin-bottom: 4px;
	}
	.output pre {
		margin-bottom: 6px;
		white-space: pre-wrap;
	}
	.time {
		color: #777;
		margin-top: 6px;
		font-size: 14px;
	}
</style>

