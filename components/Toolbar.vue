<template>
	<v-toolbar app dark clipped-left color="primary">
		<v-toolbar-side-icon @click.stop="LeekScript.drawerOpened = !LeekScript.drawerOpened"></v-toolbar-side-icon>
		<v-toolbar-title class="white--text">LeekScript</v-toolbar-title>
		<v-spacer></v-spacer>
		<!-- <v-text-field flat solo-inverted hide-details prepend-inner-icon="search" label="Search" class="hidden-sm-and-down"></v-text-field> -->
	</v-toolbar>
</template>

<script lang="ts">
	import { Component, Prop, Vue, Watch } from 'vue-property-decorator'
	import { LeekScript } from '~/store/leekscript'
	@Component({})
	export default class Toolbar extends Vue {
		LeekScript = LeekScript
	}
</script>