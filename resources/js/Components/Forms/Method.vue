<template>
	<input type="hidden" name="_method" :value="type.toLowerCase()" />
</template>

<script>
export default {
	name: 'Method',
	props: {
		type: {
			type: String,
			required: true,
			validator(value){
				return ['put', 'delete'].includes(value.toLowerCase());
			},
		},
	},
}
</script>
