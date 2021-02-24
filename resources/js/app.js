window.Vue = require('vue').default;
import Vuetify from 'vuetify'
import VueRouter from 'vue-router'
import '@mdi/font/css/materialdesignicons.css'

Vue.use(VueRouter)
import app from './views/app.vue'
import main from './views/Main/main.vue'
import About from './views/About.vue'
import config from './views/config.vue'
import pre from './views/pre.vue'
import checkout from './views/checkout.vue'
import summary from './views/summary.vue'

const router = new VueRouter({
    mode: 'history',
    routes: [{
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
    ],
});

import 'vuetify/dist/vuetify.min.css'

Vue.use(Vuetify, );
import examplecomponent from './components/ExampleComponent.vue'


new Vue({
    el: '#app',
    vuetify: new Vuetify,
    router,
    components: {
        examplecomponent
    },
    icons: {
        iconfont: 'mdi', // default - only for display purposes
    }
});