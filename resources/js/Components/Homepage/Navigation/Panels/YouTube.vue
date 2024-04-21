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
			<li v-for="video in videos">
				<a :href="`https://www.youtube.com/embed/${video.id}?autoplay=1`" target="bigscreen">
					<img :src="video.thumbnail">
					<span :title="video.publishedString">{{ video.duration }}</span>
				</a>
				<a :href="`https://www.youtube.com/watch?v=${video.id}`" target="_blank" rel="noopener noreferrer" :title="video.title">{{ video.title }}</a>
				<a :href="`https://www.youtube.com/channel/${video.channelId}`" target="_blank" rel="noopener noreferrer" :title="video.channelTitle">
					<img :src="video.channelThumbnail">
				</a>
			</li>
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
import Modal from '@/Components/Modal/Modal.vue';
import ModalBox from '@/Components/Modal/ModalBox.vue';

export default {
	name: 'YouTube',
	components: {
		NavigationPanel,
		Modal,
		ModalBox,
	},
	data(){
		return {
			videos: [],
			showAddChannel: false,
		}
	},
	methods: {
		update(){
			// axios.get(route('youtube.feed')).then(response => this.videos = response.data);
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

ul#youtube-feed > li {
	aspect-ratio: 16 / 9;
	font-size: 0.75em;
	position: relative;
	width: 100%;
}

ul#youtube-feed > li > a {
	display: block;
	position: absolute;
}

ul#youtube-feed > li > a:nth-child(1) {
	align-items: center;
	bottom: 0rem;
	display: flex;
	left: 0rem;
	overflow: hidden;
	right: 0rem;
	top: 0rem;
}

ul#youtube-feed > li > a:nth-child(1) > img {
	object-fit: cover;
	width: 100%;
}

ul#youtube-feed > li > a:nth-child(1) > span {
	background-color: rgba(0, 0, 0, 0.75);
	border-radius: 0.5rem;
	bottom: 0.5rem;
	position: absolute;
	padding: 0.25rem;
	right: 0.5rem;
}

ul#youtube-feed > li > a:nth-child(2) {
	background-color: rgba(0, 0, 0, 0.5);
	left: 0rem;
	padding: 0.5rem;
	right: 0rem;
	top: 0rem;
}

ul#youtube-feed > li > a:nth-child(3) {
	bottom: 0.5rem;
	left: 0.5rem;
}

ul#youtube-feed > li > a:nth-child(3) > img {
	aspect-ratio: 1;
	border-radius: 50%;
	width: 2rem;
}
</style>