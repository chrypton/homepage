<template>
	<input type="hidden" name="_token" :value="csrf" />
</template>

<script>
export default {
	name: 'CSRF',
	data(){
		return {
			csrf: String,
		}
	},
	mounted(){
		this.csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
	},
}
</script>
