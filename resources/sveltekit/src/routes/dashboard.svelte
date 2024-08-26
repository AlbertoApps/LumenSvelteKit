<script lang="ts">
	import { logout } from '$lib/auth';

	const handleLogout = () => {
		logout();
		window.location.href = '/auth/signin';
	};
</script>

<section>
	<h1>Dashboard</h1>
	<p>Welcome to the dashboard!</p>
	<button on:click={handleLogout}>Log Out</button>
</section>

<style>
	section {
		max-width: 600px;
		margin: 50px auto;
		padding: 20px;
		border: 1px solid #ccc;
		border-radius: 5px;
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
