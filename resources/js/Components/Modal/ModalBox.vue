<template>
	<div class="modal-box">
		<div class="modal-box-title">
			<span>
				<slot name="title">Untitled</slot>
			</span>
			<div>
				<slot name="icons" />
				<i @click="$emit('closed')" class="fa-solid fa-x"></i>
			</div>
		</div>
		<div class="modal-box-content">
			<slot />
		</div>
	</div>
</template>

<script>
export default {
	name: 'ModalBox',
	emits: 'closed',
}
</script>

<style>
.modal-box {
	background-color: rgba(40, 40, 40, 1);
	border: 0.125rem solid var(--border-color);
	color: var(--text-light);
}

.modal-box-title {
	align-items: center;
	background-image: var(--title-gradient);
	border-bottom: 0.125rem solid var(--border-color);
	display: flex;
	flex-direction: row;
	font-size: 1.25em;
	font-weight: 700;
	gap: 1rem;
	justify-content: space-between;
	padding: 0.25rem 0.5rem 0.25rem 0.5rem;
}

.modal-box-title > div {
	display: flex;
	flex-direction: row;
	gap: 0.5em;
}

.modal-box-title> div > i {
	cursor: pointer;
}
</style>