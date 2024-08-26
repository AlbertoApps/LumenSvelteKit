export const ssr = false;

import auth0 from 'auth0-js';
import {
	PUBLIC_AUTH0_CLIENT_ID,
	PUBLIC_AUTH0_ISSUER_BASE_URL,
	PUBLIC_AUTH0_AUDIENCE,
	PUBLIC_AUTH0_CALLBACK_URL
} from '$env/static/public';

import { isAuthenticated } from '$lib/auth';
import type { LayoutLoad } from './$types';
import { goto } from '$app/navigation';
console.log('Si imprime');
export const load: LayoutLoad = ({ url, fetch }) => {
	const { pathname } = url;
	console.log(!isAuthenticated() && pathname !== '/auth/signin');
	// Redirigir a /auth/signin si el usuario no está autenticado y está intentando acceder a rutas protegidas
	if (!isAuthenticated() && pathname !== '/auth/signin') {
		goto('/auth/signin');
	}

	// Redirigir a /dashboard si el usuario está autenticado y está intentando acceder a /
	if (isAuthenticated() && pathname === '/') {
		return {
			status: 302,
			redirect: '/dashboard'
		};
	}

	//return {};
};
