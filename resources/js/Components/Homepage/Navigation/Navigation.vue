<template>
	<nav>
		<Navigator />
		<YouTube />
	</nav>
</template>

<script>
import Navigator from '@/Components/Homepage/Navigation/Panels/Navigator.vue';
import YouTube from '@/Components/Homepage/Navigation/Panels/YouTube.vue';

export default {
	name: 'Navigation',
	components: {
		Navigator,
		YouTube,
	},
}
</script>

<style>
nav {
	display: flex;
	flex-direction: column;
	gap: 1rem;
	position: relative;
	z-index: 1;
}
</style>