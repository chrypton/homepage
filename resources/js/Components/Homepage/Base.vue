<script>
export default {
	name: 'Base',
}
</script>

<style>
/* @import url('../../css/fontawesome/css/all.css'); */

:root {
	--border-color: rgba(155, 155, 155, 1);
	--box-background: rgba(40, 40, 40, 1);
	--text-dark: rgba(0, 0, 0, 1);
	--text-light: rgba(255, 255, 255, 1);
	--text-error: rgba(255, 0, 0, 1);
	--text-warning: rgba(255, 0, 0, 1);
	--text-error: rgba(255, 0, 0, 1);
	
	--title-gradient:
		linear-gradient(
			rgba(75, 75, 75, 1),
			rgba(50, 50, 50, 1)
		);
	--title-gradient-alt:
		linear-gradient(
			rgba(100, 100, 100, 1),
			rgba(65, 65, 65, 1)
		);
	--title-gradient-alt-right:
		linear-gradient(
			to left,
			rgba(100, 100, 100, 1),
			rgba(65, 65, 65, 1)
		);

	--list-item-1-background: rgba(240, 240, 250, 1);
	--list-item-1-border-top: 0.125rem solid rgba(255, 255, 255, 1);
	--list-item-1-border-right: 0.125rem solid rgba(225, 225, 225, 1);
	--list-item-1-border-bottom: 0.125rem solid rgba(225, 225, 225, 1);
	--list-item-1-border-left: 0.125rem solid rgba(255, 255, 255, 1);

	--list-item-2-background: rgba(250, 250, 250, 1);
	--list-item-2-border-top: 0.125rem solid rgba(255, 255, 255, 1);
	--list-item-2-border-right: 0.125rem solid rgba(225, 225, 225, 1);
	--list-item-2-border-bottom: 0.125rem solid rgba(225, 225, 225, 1);
	--list-item-2-border-left: 0.125rem solid rgba(255, 255, 255, 1);

	--list-item-hover-background: rgba(50, 50, 50, 1);
	--list-item-hover-border-top: 0.125rem solid rgba(75, 75, 75, 1);
	--list-item-hover-border-right: 0.125rem solid rgba(25, 25, 25, 1);
	--list-item-hover-border-bottom: 0.125rem solid rgba(25, 25, 25, 1);
	--list-item-hover-border-left: 0.125rem solid rgba(75, 75, 75, 1);

	--list-item-selected-background: rgba(52, 84, 135, 1);
	--list-item-selected-border-top: 0.125rem solid rgba(136, 169, 218, 1);
	--list-item-selected-border-right: 0.125rem solid rgba(191, 211, 238, 1);
	--list-item-selected-border-bottom: 0.125rem solid rgba(191, 211, 238, 1);
	--list-item-selected-border-left: 0.125rem solid rgba(136, 169, 218, 1);
	--list-item-selected-text: rgba(255, 255, 255, 1);
}

* {
	box-sizing: border-box;
	scrollbar-color: rgba(50, 50, 50, 1) rgba(100, 100, 100, 1);
	scrollbar-width: thin;
}

a {
	color: inherit;
}

body {
	--background-color: rgba(0, 0, 0, 1);

	background-image:
		repeating-linear-gradient(
			111.5deg,
			var(--background-color) 0px,
			var(--background-color) 10px,
			transparent 10px,
			transparent 11px
		),
		repeating-linear-gradient(
			229.5deg,
			var(--background-color) 0px,
			var(--background-color) 10px,
			transparent 10px,
			transparent 11px
		),
		linear-gradient(
			90deg,
			rgba(60, 187, 226, 1),
			rgba(132, 60, 226, 1),
			rgba(226, 60, 121, 1),
			rgba(226, 198, 60, 1),
			rgba(60, 226, 65, 1)
		);
	background-position: top left;
	font-family: Verdana, Arial, sans-serif;
	height: 100vh;
	margin: 0;
}
</style>