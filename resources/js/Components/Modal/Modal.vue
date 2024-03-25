<template>
	<Teleport :to="target">
		<div ref="modal" v-if="showModal" v-bind="$attrs" @click.self="$emit('hide-modal')" @keydown.esc="$emit('hide-modal')" class="modal-dimmer" tabindex="-1">
			<slot />
		</div>
	</Teleport>
</template>

<script>
export default {
	name: 'Modal',
	props: {
		target: {
			type: String,
			default: 'body',
		},
		showModal: {
			type: Boolean,
			default: false,
		},
	},
	updated(){
		if(this.showModal){
			this.$nextTick(() => this.$refs.modal.focus());
		}
	},
	emits: [
		'hide-modal',
	],
}
</script>

<style>
.modal-dimmer {
	align-items: center;
	background-color: rgba(0, 0, 0, 0.5);
	bottom: 0;
	display: flex;
	flex-direction: column;
	justify-content: center;
	left: 0;
	padding: 1rem;
	position: absolute;
	right: 0;
	top: 0;
	z-index: 999;
}
</style>