import Vue from 'vue';
import VueRouter from 'vue-router';

import Home from '../pages/Home.vue';
import Dashboard from '../pages/Dashboard.vue';
import Voitures from '../components/Voitures.vue';

Vue.use(VueRouter);

const routes = [
    {
        name: 'home',
        path: '/',
        component: Home
    },
    {
        name: 'dashboard',
        path: '/dashboard',
        component: Dashboard
    },
    {
        name: 'voitures',
        path: '/voitures',
        component: Voitures
    }
];

const router = new VueRouter({
    mode: 'history',
    routes
});

router.beforeEach((to, from, next) => {
    const token = localStorage.getItem('token');
    if (to.meta.requiresAuth && !token) {
        next({ name: 'home' }); // redirige vers la page d’accueil ou login
    } else {
        next();
    }
});

export default router;
