<template>
	<NavigationPanel icon="fa-solid fa-house">
		<template #title>Navigator</template>
		<template #menu>
			<li>Item 1</li>
			<li>Item 2</li>
			<li>Item 3</li>
		</template>
		<ul>
			<li>
				<Link :href="route('index')">Dashboard</Link>
			</li>
			<li>
				<a :href="route('test')" target="_blank">Testing</a>
			</li>
			<li>
				<a href="https://github.com/chrypton/homepage" target="_blank">GitHub Repo</a>
			</li>
			<li>
				<a href="https://dev.tools/phpmyadmin" target="_blank">phpMyAdmin</a>
			</li>
			<li>
				<a href="https://laravel.com/docs/11.x/" target="_blank">Laravel Docs</a>
			</li>
			<li>
				<a href="https://laravel.com/api/11.x/" target="_blank">Laravel API</a>
			</li>
			<li>
				<a href="https://chat.openai.com/" target="_blank">ChatGPT 3.5</a>
			</li>
			<li v-for="link in links">
				<Link :href="route(link)">{{ link }}</Link>
			</li>
		</ul>
	</NavigationPanel>
</template>

<script>
import { Link } from '@inertiajs/vue3';
import NavigationPanel from '@/Components/Homepage/Navigation/Partials/NavigationPanel.vue';

export default {
	name: 'Navigator',
	components: {
		NavigationPanel,
		Link,
	},
	data(){
		return {
			links: [],
		};
	},
	created(){
		axios.get(route('routes')).then(response => this.links = response.data);
	},
}
</script>

<style>

</style>
