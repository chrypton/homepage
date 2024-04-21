<template>
	<Head title="Register" />
	<Base />
	<!-- <div>Error</div> -->
	<form :action="route('users.store')" method="post">
		<CSRF />
		<h3>Register</h3>
		<div>
			<div>
				<label for="name">Name:</label>
				<!-- <span>Error Text</span> -->
				<input type="text" id="name" name="name" />
			</div>
			<div>
				<label for="username">Username:</label>
				<input type="text" id="username" name="username" />
			</div>
			<div>
				<label for="email">Email:</label>
				<input type="email" id="email" name="email" />
			</div>
			<div>
				<label for="password">Password:</label>
				<input type="password" id="password" name="password" />
			</div>
			<div>
				<label for="password_confirmation">Confirm Password:</label>
				<input type="password" id="password_confirmation" name="password_confirmation" />
			</div>
			<div>
				<button type="submit">Sign Up</button>
			</div>
		</div>
	</form>
	<div>
		<span>Already have an account?</span>
		<Link :href="route('users.login')">Sign In</Link>
	</div>
</template>

<script>
import { Head, Link } from '@inertiajs/vue3';
import Base from '@/Components/Homepage/Base.vue';
import CSRF from '@/Components/Forms/CSRF.vue';

export default {
	name: 'Register',
	components: {
		Head,
		Base,
		Link,
		CSRF,
	},
}
</script>

<style>
#app {
	align-items: center;
	color: var(--text-light);
	display: flex;
	flex-direction: column;
	gap: 1rem;
	height: 100%;
	justify-content: center;
	padding: 1rem;
}

#app > div,
#app form {
	background-color: var(--box-background);
	border: 0.125rem solid var(--border-color);
	width: 25rem;
}

#app > div {
	display: flex;
	flex-direction: column;
	text-align: center;
	padding: 0.5rem;
}

#app > div:nth-child(1) {
	color: var(--text-error);
}

#app form h3 {
	background-image: var(--title-gradient);
	border-bottom: 0.125rem solid var(--border-color);
	margin: 0rem;
	padding: 0.375rem 1rem 0.375rem 1rem;
}

#app form > div {
	display: flex;
	flex-direction: column;
	gap: 1rem;
	padding: 1rem;
}

#app form div div:not(:nth-last-child(1)) {
	display: flex;
	flex-direction: column;
	gap: 0.25rem;
}

#app form div div:nth-last-child(1) {
	text-align: center;
}

#app form div div span {
	color: var(--text-error);
	text-align: right;
}
</style>