import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: import.meta.env.VITE_SOKETI_APP_KEY,
    cluster: import.meta.env.VITE_SOKETI_APP_CLUSTER ?? 'mt1',
    wsHost: import.meta.env.VITE_SOKETI_HOST,
    wsPort: import.meta.env.VITE_SOKETI_PORT,
    wssPort: import.meta.env.VITE_SOKETI_PORT,
    forceTLS: false,
    encrypted: true,
    disableStats: true,
    enabledTransports: ['ws', 'wss'],
});