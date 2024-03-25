<template>
	<Base />
	<Header />
	<Navigation />
	<main>
		<slot />
	</main>
</template>

<script>
import Base from '@/Components/Homepage/Base.vue';
import Header from '@/Components/Homepage/Header.vue';
import Navigation from '@/Components/Homepage/Navigation/Navigation.vue';

export default {
	name: 'Homepage',
	components: {
		Base,
		Header,
		Navigation,
	},
}
</script>

<style>
#app {
	background-color: rgba(0, 0, 0, 0.25);
	display: grid;
	gap: 1rem;
	grid-template-columns: auto 1fr;
	grid-template-rows: min-content auto;
	height: 100%;
	margin-inline: auto;
	max-width: 120rem;
	padding: 0rem 1rem 1rem 1rem;
}
</style>