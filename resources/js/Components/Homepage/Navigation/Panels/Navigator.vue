<template>
	<NavigationPanel icon="fa-solid fa-house">
		<template #title>Navigator</template>
		<template #menu>
			<li>Item 1</li>
			<li>Item 2</li>
			<li>Item 3</li>
		</template>
		<ul>
			<template v-for="link in links">
				<li v-if="link.enabled">
					<template v-if="link.is_route">
						<Link v-if="link.target === '_self'" :href="route(link.url)">{{ link.title }}</Link>

						<a v-else :href="route(link.url)" :target="link.target">{{ link.title }}</a>
					</template>

					<a v-else :href="link.url" :target="link.target" rel="noopener noreferrer">{{ link.title }}</a>
				</li>
			</template>
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
		axios.get(route('nav.links')).then(response => this.links = response.data);
	},
}
</script>

<style>

</style>
