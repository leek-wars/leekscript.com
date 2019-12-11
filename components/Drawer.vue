<template>
	<v-navigation-drawer app clipped mobile-break-point="960" v-model="LeekScript.drawerOpened">
		<template v-for="category in items">
			<v-subheader :key="category.title + '_'">{{ category.title }}</v-subheader>
			<v-list :key="category.title" dense class="pt-0">
				<v-list-tile v-for="item in category.items" :key="item.title" :to="item.link" v-ripple>
					<v-list-tile-action>
						<v-icon>{{ item.icon }}</v-icon>
					</v-list-tile-action>
					<v-list-tile-content>
						<v-list-tile-title>{{ item.title }}</v-list-tile-title>
					</v-list-tile-content>
				</v-list-tile>
			</v-list>
		</template>
	</v-navigation-drawer>
</template>

<script lang="ts">
	import { Component, Prop, Vue, Watch } from 'vue-property-decorator'
	import { LeekScript } from '~/store/leekscript'
	@Component({})
	export default class Drawer extends Vue {
		@Prop() open!: boolean
		LeekScript = LeekScript
		items = [
			{title: 'LeekScript', items: [
				{title: 'Home', icon: 'home', link: '/'},
				{title: 'Online editor', icon: 'code', link: '/editor'},
				{title: 'Performance', icon: 'flash_on', link: '/performance'},
			]},
			{title: 'Documentation', items: [
				{title: 'Types', icon: 'bubble_chart', link: '/types'},
				{title: 'Functions', icon: 'redo', link: '/functions'},
				{title: 'Operations', icon: 'exposure_plus_1', link: '/operations'},
			]},
			{title: 'About', items: [
				{title: 'F.A.Q.', icon: 'forum', link: 'faq'},
				{title: 'About', icon: 'help_outline', link: 'about'},
			]}
		]
	}
</script>
