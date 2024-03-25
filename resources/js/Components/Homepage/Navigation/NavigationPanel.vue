<template>
	<div @click.self="panelLock = !panelLock" :class="{ locked: panelLock }">
		<i :class="icon"></i>
		<div>
			<div :class="{ openmenu: showMenu }" @mouseleave="showMenu = false">
				<span>
					<slot name="title">Untitled</slot>
				</span>
				<template v-if="$slots.menu">
					<i class="fa-solid fa-bars" @mouseenter="showMenu = true"></i>
					<ul>
						<slot name="menu" />
					</ul>
				</template>
			</div>
			<slot />
		</div>
	</div>
</template>

<script>
export default {
	name: 'NavigationPanel',
	props: {
		icon: {
			type: String,
			default: 'fa-solid fa-circle-question',
		},
	},
	data(){
		return {
			panelLock: false,
			showMenu: false,
		}
	},
}
</script>

<style>
nav > div {
	aspect-ratio: 1;
	align-items: center;
	background-color: var(--box-background);
	border: 0.125rem solid var(--border-color);
	border-radius: 1rem 0rem 0rem 1rem;
	color: var(--text-light);
	cursor: pointer;
	display: flex;
	flex-direction: row;
	justify-content: center;
	padding: 0.5rem;
	width: 3.75rem;
}

nav > div:nth-of-type(1):hover::after,
nav > div:nth-of-type(1).locked::after {
	background-color: var(--border-color);
	content: '';
	position: absolute;
	height: 0.125rem;
	top: 0rem;
	right: 0rem;
	width: 0.125rem;
}

nav > div:hover,
nav > div.locked {
	background-image: linear-gradient(
		90deg,
		rgba(255, 255, 255, 0.125) 75%,
		transparent
	);
	border-right: 0.125rem solid var(--box-background);
}

nav > div > i {
	font-size: 2rem;
	pointer-events: none;
}

nav > div > div {
	background-color: var(--box-background);
	border: 0.125rem solid var(--border-color);
	border-radius: 0rem 1rem 1rem 1rem;
	cursor: initial;
	display: none;
	height: 100%;
	left: calc(100% - 0.125rem);
	overflow: hidden;
	padding: 1rem;
	position: absolute;
	top: 0;
	width: 20rem;
	z-index: -1;
}

nav > div:hover > div,
nav > div.locked > div {
	display: block;
}

nav > div > div > div:nth-child(1) {
	align-items: center;
	background-image: var(--title-gradient-alt);
	border-color: var(--border-color);
	border-radius: 0rem 0rem 0rem 1rem;
	border-style: solid;
	border-width: 0rem 0rem 0.125rem 0.125rem;
	display: flex;
	flex-direction: row;
	justify-content: center;
	padding: 0.5rem 0.75rem 0.5rem 0.75rem;
	position: absolute;
	right: 0;
	top: 0;
	width: 18rem;
	z-index: 1;
}

nav > div > div > div:nth-child(1) > span,
nav > div > div > div:nth-child(1) > i {
	font-size: 1.25rem;
}

nav > div > div > div:nth-child(1) > span {
	flex: 1 1 0;
	text-align: center;
}

nav > div > div > div:nth-child(1) > i {
	cursor: pointer;
}

nav > div > div > div:nth-child(1) > ul {
	background-color: var(--box-background);
	border: 0.125rem solid var(--border-color);
	border-radius: 0rem 0rem 0rem 1rem;
	display: none;
	list-style: none;
	margin: 0rem;
	padding: 0.75rem 1rem 1rem 1rem;
	position: absolute;
	right: -0.125rem;
	top: 100%;
	z-index: 1;
}

nav > div > div > div:nth-child(1).openmenu > ul {
	display: block;
}

nav > div > div > div:nth-child(1) > ul > li {
	cursor: pointer;
}

nav > div > div > :nth-child(2) {
	max-height: 100%;
	overflow: auto;
	padding-top: 2.625rem !important;
	scrollbar-width: none;
}
</style>