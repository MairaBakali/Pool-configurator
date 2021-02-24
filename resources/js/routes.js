import app from './views/app.vue';
import main from './views/Main/main.vue';
import About from './views/About.vue';
import config from './views/config.vue';
import pre from './views/pre.vue';
import checkout from './views/checkout.vue';
import summary from './views/summary.vue';

export const routes = [
    {
        path: '/',
        name: 'app',
        component: app
    }, {
        path: '/main',
        name: 'main',
        component: main

    }, {
        path: '/help',
        name: 'About',
        component: About
    },
    {
        path: '/config',
        name: 'config',
        component: config
    },

    {
        path: '/pre',
        name: 'pre',
        component: pre
    },
    {
        path: '/checkout',
        name: 'checkout',
        component: checkout
    }, {
        path: '/summary',
        name: 'summary',
        component: summary

    }
];
