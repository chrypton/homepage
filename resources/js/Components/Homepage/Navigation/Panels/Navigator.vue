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
				<a href="https://github.com/chrypton/homepage" target="_blank">GitHub Repo</a>
			</li>
		</ul>
	</NavigationPanel>
</template>

<script>
import { Link } from '@inertiajs/vue3';
import NavigationPanel from '@/Components/Homepage/Navigation/NavigationPanel.vue';

export default {
	name: 'Navigator',
	components: {
		NavigationPanel,
		Link,
	},
}
</script>

<style>

</style>
