<template>
	<v-app id="app">
		<drawer></drawer>
		<toolbar></toolbar>
		<v-content>
			<nuxt/>
		</v-content>
		<v-footer app inset style="position: static"
		height="auto"
		>
			<v-card
			flat
			tile
			class="lighten-1 text-xs-center"
			>
			<v-card-text>
				<v-btn
				v-for="icon in [
			'fab fa-facebook',
			'fab fa-twitter',
			'fab fa-google-plus',
			'fab fa-linkedin',
			'fab fa-instagram'
		]"
				:key="icon"
				class="mx-3 "
				icon
				>
				<v-icon size="24px">{{ icon }}</v-icon>
				</v-btn>
			</v-card-text>

			<v-card-text class="pt-0">
				Phasellus feugiat arcu sapien, et iaculis ipsum elementum sit amet. Mauris cursus commodo interdum. Praesent ut risus eget metus luctus accumsan id ultrices nunc. Sed at orci sed massa consectetur dignissim a sit amet dui. Duis commodo vitae velit et faucibus. Morbi vehicula lacinia malesuada.
			</v-card-text>

			<v-divider></v-divider>

			<v-card-text>
				&copy;2019 — <strong>LeekScript</strong>
			</v-card-text>
			</v-card>
		</v-footer>
	</v-app>
</template>

<script>
import Drawer from '~/components/Drawer.vue'
import Toolbar from '~/components/Toolbar.vue'

export default {
	components: {
		Drawer, Toolbar
	}
}
</script>

<style>
	html {
		font-family: "Source Sans Pro", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
		font-size: 16px;
		word-spacing: 1px;
		-ms-text-size-adjust: 100%;
		-webkit-text-size-adjust: 100%;
		-moz-osx-font-smoothing: grayscale;
		-webkit-font-smoothing: antialiased;
	}
	h1 {
		margin-bottom: 10px;
	}
	.v-toolbar--clipped {
		z-index: 5;
	}
</style>

