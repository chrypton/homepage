<template>
	<header>
		<time :datetime="strDateTime">{{ this.strDate }}</time>
		<time :datetime="strDateTime">{{ this.strTime }}</time>
		<div>
			<a :href="route('users.logout')">Log Out</a>
		</div>
	</header>
</template>

<script>
export default {
	name: 'Header',
	data(){
		return {
			strDateTime: undefined,
			strDate: undefined,
			strTime: undefined,
		}
	},
	methods: {
		updateClock(){
			const now = dayjs();

			this.strTime = now.format('h:mm:ss A');
			this.strDate = now.format('dddd, MMMM Do, YYYY');
		},
	},
	created(){
		this.strDateTime = dayjs().format('YYYY-MM-DD HH:mm');

		this.updateClock();

		setInterval(() => {
			this.updateClock();
		}, 1000);
	},
}
</script>

<style>
header {
	background-image: var(--title-gradient);
	border-color: var(--border-color);
	border-style: solid;
	border-width: 0rem 0.125rem 0.125rem 0.125rem;
	color: var(--text-light);
	display: flex;
	flex-direction: row;
	grid-column: 1 / span 2;
	padding: 0.5rem 1rem 0.5rem 1rem;
}

header > * {
	flex: 1 1 0;
}

header > :nth-child(1) {
	text-align: left;
}

header > :nth-child(2) {
	text-align: center;
}

header > :nth-child(3) {
	text-align: right;
}
</style>