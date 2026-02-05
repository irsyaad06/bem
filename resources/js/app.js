import './bootstrap';
import '../css/app.css';

import { createApp, h } from 'vue';
import { createInertiaApp, router } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from 'ziggy-js';
import { initFlowbite } from 'flowbite';

const appName = import.meta.env.VITE_APP_NAME || 'BEM UNIKOM';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .mount(el);
    },
});

// Menangani re-inisialisasi Flowbite saat pindah halaman di Vue
router.on('navigate', () => {
    setTimeout(() => {
        initFlowbite();
    }, 0);
});