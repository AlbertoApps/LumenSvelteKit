<script lang="ts">
	import { login } from '$lib/auth';
	let email = '';
	let password = '';
	let error = '';

	const handleSignin = (event: Event) => {
		event.preventDefault();

		// Simulación de autenticación
		if (email === 'user@example.com' && password === 'password123') {
			login('dummy_token');
			window.location.href = '/dashboard';
		} else {
			error = 'Invalid credentials';
		}
	};
</script>

<section>
	<h1>Sign In</h1>
	{#if error}
		<p class="error">{error}</p>
	{/if}

	<form on:submit={handleSignin}>
		<div>
			<label for="email">Email:</label>
			<input id="email" type="email" bind:value={email} required />
		</div>

		<div>
			<label for="password">Password:</label>
			<input id="password" type="password" bind:value={password} required />
		</div>

		<button type="submit">Sign In</button>
	</form>
</section>

<style>
	section {
		max-width: 400px;
		margin: 50px auto;
		padding: 20px;
		border: 1px solid #ccc;
		border-radius: 5px;
	}

	.error {
		color: red;
	}

	form {
		display: flex;
		flex-direction: column;
	}

	label {
		margin-bottom: 5px;
	}

	input {
		margin-bottom: 15px;
		padding: 8px;
		border: 1px solid #ccc;
		border-radius: 4px;
	}

	button {
		padding: 10px;
		background-color: #007bff;
		color: white;
		border: none;
		border-radius: 4px;
		cursor: pointer;
	}

	button:hover {
		background-color: #0056b3;
	}
</style>
