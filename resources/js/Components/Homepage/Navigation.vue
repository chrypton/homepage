<template>
	<nav>
		<Navigator />
		<component v-for="panel in panels" :is="panel" />
	</nav>
</template>

<script>
import Navigator from '@/Components/Homepage/Navigation/Panels/Navigator.vue';
const panelFiles = import.meta.glob(['./Navigation/Panels/*', '!./Navigation/Panels/Navigator.vue'], { eager: true });

export default {
	name: 'Navigation',
	components: {
		Navigator,
	},
	data(){
		return {
			panels: [],
		};
	},
	created(){
		this.panels = Object.values(panelFiles).map(panel => panel.default);
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