<template>
	<input type="checkbox" :name="finalName" :id="finalName" :checked="modelValue" @change="$emit('update:modelValue', $event.target.checked)" />
	<label :for="finalName"></label>
</template>

<script>
import Utils from '@/Classes/Utils.js';

export default {
	name: 'ToggleSlider',
	props: {
		modelValue: Boolean,
		name: String,
	},
	computed: {
		finalName(){
			return this.name ?? Utils.randomString(8);
		}
	},
	emits: ['update:modelValue'],
}
</script>

<style scoped>
input[type=checkbox] {
	display: none;
}

input[type=checkbox] + label {
	--bg-color-off: rgba(200, 200, 200,  1);
	--bg-color-on: rgba(255, 255, 255,  1);
	--color-off: rgba(255, 0, 0, 1);
	--color-on: rgba(0, 255, 0, 1);
	--width: 1.5em;

	cursor: pointer;
	height: 1em;
	position: relative;
	user-select: none;
	width: calc(var(--width) + 0.5em);
}

input[type=checkbox] + label::before,
input[type=checkbox] + label::after {
	border: 0.125em solid var(--color-off);
	border-radius: 0.625em;
	content: '';
	display: inline-block;
	height: 0.75em;
	left: 0em;
	position: absolute;
	transition: background-color 0.25s ease-in-out, border 0.25s ease-in-out, left 0.25s ease-in-out;
}

input[type=checkbox] + label::before {
	background-color: var(--bg-color-off);
	width: var(--width);
}

input[type=checkbox] + label::after {
	background-color: var(--color-off);
	width: 0.75em;
}

input[type=checkbox]:checked + label::before {
	background-color: var(--bg-color-on);
	border-color: var(--color-on);
}

input[type=checkbox]:checked + label::after {
	background-color: var(--color-on);
	border-color: var(--color-on);
	left: calc(var(--width) - 0.75em);
}
</style>