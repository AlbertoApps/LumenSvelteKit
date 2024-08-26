// src/lib/auth.js
export function isAuthenticated() {
	console.log(localStorage);
	// Aquí podrías revisar si hay un token válido almacenado
	return !!localStorage.getItem('auth_token');
}

export function login(token: string) {
	localStorage.setItem('auth_token', token);
}

export function logout() {
	localStorage.removeItem('auth_token');
}
