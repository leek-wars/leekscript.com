<template>
	<v-container>
		<h1>LeekScript online editor</h1>
		<v-layout column justify-center>
			<editor ></editor>
		</v-layout>
	</v-container>
</template>

<script>
import Editor from '~/components/Editor.vue'

export default {
	components: {
		Editor
	}
}
</script>

<style>
.title {
	font-family: "Quicksand", "Source Sans Pro", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif; /* 1 */
	display: block;
	font-weight: 300;
	font-size: 100px;
	color: #35495e;
	letter-spacing: 1px;
	font-size: 80px;
}

.subtitle {
	font-weight: 300;
	font-size: 30px;
	color: #526488;
	word-spacing: 5px;
	padding-bottom: 15px;
}

.links {
  padding-top: 15px;
}
</style>

