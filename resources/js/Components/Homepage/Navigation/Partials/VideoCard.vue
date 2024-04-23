<template>
	<component :is="element" class="video-card">
		<a :href="video.embedLink" target="bigscreen">
			<img :src="video.thumbnail" />
			<span :title="formattedTimestamp">{{ formattedDuration }}</span>
		</a>
		<a :href="video.link" :title="video.title" target="_blank" rel="noopener noreferrer">{{ video.title }}</a>
		<a :href="video.channelLink":title="video.channelTitle" target="_blank" rel="noopener noreferrer">
			<img :src="video.channelThumbnail" />
		</a>
	</component>
</template>

<script>
export default {
	name: 'VideoCard',
	props: {
		element: {
			type: String,
			default: 'li',
		},
		video: {
			type: Object,
			required: true,
		},
	},
	computed: {
		formattedTimestamp(){
			return dayjs(this.video.timestamp).format('MMM D, YYYY h:mm A');
		},
		formattedDuration(){
			let format = 'm:ss';

			if(this.video.duration >= 3600){
				format = 'H:mm:ss';
			}

			return dayjs.duration(this.video.duration, 'seconds').format(format);
		},
	},
}
</script>

<style>
.video-card {
	aspect-ratio: 16 / 9;
	font-size: 0.75em;
	position: relative;
	width: 100%;
}

.video-card > a {
	display: block;
	position: absolute;
}

.video-card > a:nth-child(1) {
	align-items: center;
	bottom: 0rem;
	display: flex;
	left: 0rem;
	overflow: hidden;
	right: 0rem;
	top: 0rem;
}

.video-card > a:nth-child(1) > img {
	object-fit: cover;
	width: 100%;
}

.video-card > a:nth-child(1) > span {
	background-color: rgba(0, 0, 0, 0.75);
	border-radius: 0.5rem;
	bottom: 0.5rem;
	position: absolute;
	padding: 0.25rem;
	right: 0.5rem;
}

.video-card > a:nth-child(2) {
	background-color: rgba(0, 0, 0, 0.5);
	left: 0rem;
	padding: 0.5rem;
	right: 0rem;
	top: 0rem;
}

.video-card > a:nth-child(3) {
	bottom: 0.5rem;
	left: 0.5rem;
}

.video-card > a:nth-child(3) > img {
	aspect-ratio: 1;
	border-radius: 50%;
	width: 2rem;
}
</style>