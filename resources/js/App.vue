<!-- À modifier* -->
<template>
    <div class="container">
        <div
            class="text-center"
            style="
                margin: 20px 0px 20px 0px;
                background-color: #2769b0;
                color: #ffff;
            "
        >
            <h2>Site monopage Laravel-Vue avec authentification</h2>
        </div>
        <nav
            class="navbar navbar-expand-lg navbar-light bg-light"
            style="background-color: #3485dc; color: #ffff"
        >
            <div
                class="collapse navbar-collapse"
                style="background-color: #3485dc; color: #ffff"
            >
                <!-- for logged-in user-->
                <div
                    class="navbar-nav"
                    v-if="isLoggedIn"
                    style="background-color: #3485dc; color: #ffff"
                >
                    <router-link to="/dashboard" class="nav-item nav-link"
                        >Dashboard</router-link
                    >
                    <router-link to="/voitures" class="nav-item nav-link"
                        >Voitures</router-link
                    >
                    <a
                        class="nav-item nav-link"
                        style="cursor: pointer"
                        @click="logout"
                        >Logout</a
                    >
                </div>
                <!-- for non-logged user-->
                <div
                    class="navbar-nav"
                    v-else
                    style="background-color: #3485dc; color: #ffff"
                >
                    <router-link to="/" class="nav-item nav-link"
                        >Home</router-link
                    >
                    <router-link to="/voitures" class="nav-item nav-link"
                        >Voitures</router-link
                    >
                      <router-link to="/about" class="nav-item nav-link">About</router-link>
                    <router-link to="/login" class="nav-item nav-link">login</router-link>
                    <router-link to="/register" class="nav-item nav-link">Register </router-link>
                </div>
            </div>
            <div>
                <SearchBar />
            </div>
        </nav>
        <br />
        <router-view />

        <footer class="footer">
            <div class="container">
                <h6>Site monopage créé avec Laravel 8 et Vue js</h6>
                <h6>Cours: Applications Web trensactionnelles</h6>
                <h6>Crée par: Marshlee et Samy</h6>
            </div>
        </footer>
    </div>
</template>

<script>

import api from './axios'; // adapte le chemin selon ton projet
import { useRouter } from 'vue-router'; // si tu veux utiliser router.push

async function logout() {
    try {
        await api.post('/logout'); // Appel au controller Laravel
        localStorage.removeItem('token'); // Supprime le token côté client
        router.push('/login'); // Redirige vers login
    } catch (err) {
        console.error('Erreur logout:', err.response?.data || err.message);
    }
}

export default {
    name: "App",
    data() {
        return {
            isLoggedIn: false,
        };
    },
    created() {
        if (window.Laravel.isLoggedin) {
            this.isLoggedIn = true;
        }
    },
    methods: {
        async logout(e) {
            e.preventDefault();
            try {
                await api.get('/sanctum/csrf-cookie'); // si tu utilises sanctum
                const response = await api.post('/logout');

                if (response.data.success) {
                    // Supprimer le token
                    localStorage.removeItem('token');

                    // Mettre à jour le state
                    this.isLoggedIn = false;

                    // Rediriger via router (SPA)
                    this.$router.push('/login');
                } else {
                    console.log(response.data);
                }
            } catch (error) {
                console.error('Erreur logout:', error.response?.data || error.message);
            }
        }

    }

};
</script>

<style scoped>
.footer {
    background-color: #000000;
    padding: 20px;
    color: rgb(255, 255, 255);
    text-align: center;
    position: relative;
    bottom: 0;
    width: 100%;
}
</style>
