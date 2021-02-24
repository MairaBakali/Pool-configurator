// Imports
window.Vue = require('vue').default;
import VueRouter from 'vue-router';
import Vuetify from 'vuetify';

// CSS
import '@mdi/font/css/materialdesignicons.css'
import 'vuetify/dist/vuetify.min.css'

// Register Routes And Vuetify
Vue.use(VueRouter);
Vue.use(Vuetify);

// Routes
import {routes} from './routes'

const router = new VueRouter({
    routes,
    mode: 'history',
});

// Index Components that run first time
import index from './components/index.vue';

// Initialize vue app
new Vue({
    el: '#app',
    vuetify: new Vuetify,
    router,
    components: {
        index
    },
    icons: {
        iconfont: 'mdi', // default - only for display purposes
    }
});
