<template>
	<Head title="Log In" />
	<Base />
	<!-- <div>Error Text</div> -->
	<form :action="route('users.auth')" method="post">
		<CSRF />
		<h3>Log In</h3>
		<div>
			<div>
				<label for="username">Username:</label>
				<!-- <span>Error text</span> -->
				<input type="text" id="username" name="username" />
			</div>
			<div>
				<label for="password">Password:</label>
				<input type="password" id="password" name="password" />
			</div>
			<div>
				<label for="remember">Remember me</label>
				<input type="checkbox" id="remember" name="remember" />
			</div>
			<div>
				<button type="submit">Log In</button>
			</div>
		</div>
	</form>
	<div>
		<Link :href="route('users.register')">Create an Account</Link>
	</div>
</template>

<script>
import { Head, Link } from '@inertiajs/vue3';
import Base from '@/Components/Homepage/Base.vue';
import CSRF from '@/Components/Forms/CSRF.vue';

export default {
	name: 'Login',
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