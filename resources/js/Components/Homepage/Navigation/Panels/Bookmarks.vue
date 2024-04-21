<template>
	<NavigationPanel icon="fa-solid fa-link">
		<template #title>Bookmarks</template>
		<template #menu>
			<li>New Bookmark</li>
			<li>Edit Bookmarks</li>
			<li @click="openAll">Open All Selected</li>
		</template>
		<ul id="bookmarks" ref="bookmarksList">
			<li v-for="category in withChildren(bookmarks)">
				<BookmarksLink wrapper="h3" :bookmark="category" @update="update" />
				<ul>
					<li v-for="subcategory in withChildren(category.children)">
						<BookmarksLink wrapper="h4" :bookmark="subcategory" @update="update" />
						<ul>
							<BookmarksLink v-for="bookmark in subcategory.children" :bookmark="bookmark" @update="update" />
						</ul>
					</li>
					<BookmarksLink v-for="bookmark in withoutChildren(category.children)" :bookmark="bookmark" @update="update" />
				</ul>
			</li>
			<BookmarksLink v-for="bookmark in withoutChildren(bookmarks)" :bookmark="bookmark" @update="update" />
		</ul>
	</NavigationPanel>
</template>

<script>
import NavigationPanel from '@/Components/Homepage/Navigation/Partials/NavigationPanel.vue';
import BookmarksLink from '@/Components/Homepage/Navigation/Partials/BookmarksLink.vue';

export default {
	name: 'Bookmarks',
	components: {
		NavigationPanel,
		BookmarksLink,
	},
	data(){
		return {
			bookmarks: [],
		}
	},
	methods: {
		withChildren(bookmarkChildren){
			return bookmarkChildren.filter((bookmark) => bookmark.enabled && bookmark.children.length);
		},
		withoutChildren(bookmarkChildren){
			return bookmarkChildren.filter((bookmark) => bookmark.enabled && !bookmark.children.length);
		},
		update(){
			// axios.get(`${route('bookmarks.index')}?recursivetree=1`).then(response => this.bookmarks = response.data);
		},
		openAll(){
			Array.from(this.$refs.bookmarksList.querySelectorAll('.bookmark-selected a')).reverse().forEach(linkElement => window.open(linkElement.href, '_blank'));
		},

		// childrenOf(){},
		// withChildren(){},
		// withoutChildren(){},
	},
	created(){
		this.update();
	},
}
</script>

<style>
ul#bookmarks,
ul#bookmarks ul {
	margin: 0rem;
	padding: 0rem;
}

ul#bookmarks {
	display: flex;
	flex-direction: column;
	gap: 1rem;
	list-style: none;
}

ul#bookmarks > li {
	border: 0.125rem solid var(--border-color);
}

ul#bookmarks > li > h3 {
	border-bottom: 0.125rem solid var(--border-color);
}

ul#bookmarks > li > h3 + ul {
	padding: 0.5rem 0.5rem 0.5rem 1.375rem;
}

ul#bookmarks > li > h3 + ul > li > h4 + ul {
	padding-left: 1.375rem;
}








ul#bookmarks h3,
ul#bookmarks h4 {
	margin: 0rem;
}

ul#bookmarks h3 {
	color: red;
}

ul#bookmarks h4 {
	color: green;
}
</style>