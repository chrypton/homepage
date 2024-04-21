<template>
	<component :is="wrapper">
		<div :class="['bookmark-wrapper', { 'bookmark-selected': bookmarkData.selected }]">
			<a v-if="bookmarkData.url !== null" :href="bookmarkData.url" :target="bookmarkData.target">{{ bookmarkData.title }}</a>
			<span v-else>{{ bookmarkData.title }}</span>
			<ToggleSlider v-model="bookmarkData.selected" />
		</div>
	</component>
</template>

<script>
import ToggleSlider from '@/Components/ToggleSlider.vue';

export default {
	name: 'BookmarksLink',
	components: {
		ToggleSlider,
	},
	props: {
		bookmark: {
			type: Object,
			default: null,
		},
		wrapper: {
			type: String,
			default: 'li',
		},
	},
	data(){
		return {
			bookmarkData: this.bookmark,
		}
	},
	watch: {
		'bookmarkData.selected'(){
			axios.put(route('bookmarks.update', this.bookmarkData.id), this.bookmarkData).then(() => this.$emit('update'));
		},
	},
	emits: ['update'],
}
</script>

<style>
.bookmark-wrapper {
	align-items: center;
	display: flex;
	flex-direction: row;
	justify-content: space-between;
}

.bookmark-wrapper label {
	visibility: hidden;
}

.bookmark-wrapper:hover label {
	visibility: visible;
}

.bookmark-selected {
	background-color: rgba(255, 255, 255, 0.1);
}
</style>
