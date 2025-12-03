import { createWebHistory, createRouter } from "vue-router";

import Home from '../pages/Home.vue';
import Dashboard from '../pages/Dashboard.vue';
import Register from '../pages/Register.vue';
import Voitures from '../components/Voitures.vue';
import Login from "../pages/Login.vue";
import AddVoiture from "../components/AddVoiture.vue";
import About from "../pages/About.vue";
import Voiture from "../components/Voiture.vue";

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
    },
    {
        name: 'register',
        path: '/register',
        component: Register
    },
    {
        name: 'login',
        path: '/login',
        component: Login
    },
    {
        name: 'addvoiture',
        path: '/add',
        component: AddVoiture
    },
    {
        name: 'about',
        path: '/about',
        component: About
    },    
    {
        name: 'voiture',
        path: '/voiture/:id',
        component: Voiture
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes: routes,
});


router.beforeEach((to, from, next) => {
    const token = localStorage.getItem('token');
    if (to.meta.requiresAuth && !token) {
        next({ name: '/login' }); // redirige vers la page d’accueil ou login
    } else {
        next();
    }
});

export default router;
