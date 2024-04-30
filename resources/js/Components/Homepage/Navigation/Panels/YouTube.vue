<template>
	<NavigationPanel icon="fa-brands fa-youtube">
		<template #title>
			<a href="https://www.youtube.com/" target="_blank" rel="noopener noreferrer">YouTube</a>
		</template>
		<template #menu>
			<li @click="showAddChannel = true">Add Channel</li>
			<li>Item 2</li>
			<li>Item 3</li>
		</template>
		<ul id="youtube-feed">
			<VideoCard v-for="video in feed" :video="video" />
		</ul>
	</NavigationPanel>

	<Modal id="modal-youtube-addchannel" :show-modal="showAddChannel" @hide-modal="showAddChannel = false">
		<ModalBox @closed="showAddChannel = false">
			<template #title>Add YouTube Channel</template>
			<!-- <template #icons></template> -->
			Form Here
		</ModalBox>
	</Modal>
</template>

<script>
import NavigationPanel from '@/Components/Homepage/Navigation/Partials/NavigationPanel.vue';
import VideoCard from '@/Components/Homepage/Navigation/Partials/VideoCard.vue';
import Modal from '@/Components/Modal/Modal.vue';
import ModalBox from '@/Components/Modal/ModalBox.vue';

export default {
	name: 'YouTube',
	components: {
		NavigationPanel,
		VideoCard,
		Modal,
		ModalBox,
	},
	data(){
		return {
			feed: {},
			showAddChannel: false,
		}
	},
	methods: {
		update(){
			axios.get(route('nav.youtube')).then(response => this.feed = response.data);
		},
	},
	created(){
		this.update();
		
		setInterval(() => {
			this.update();
		}, 1000*60*10);
	},
}
</script>

<style>
ul#youtube-feed {
	display: flex;
	flex-direction: column;
	gap: 1rem;
	list-style: none;
	margin: 0rem;
	padding: 0rem;
}
</style>