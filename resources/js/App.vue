<!-- À modifier* -->
<template>
    <div class="container">
        <div
            class="text-center"
            style="
                margin: 0px 0px 0px 0px;
                background-color: black;
                color: #ffff;
            "
        >
            <h2>Concessionnaire</h2>
        </div>
        <nav
            class="navbar navbar-expand-lg navbar-light bg-light"
            style="background-color: black; color: #ffff"
        >
            <div
                class="collapse navbar-collapse"
                style="background-color: #ffff; color: #ffff"
            >
                                <!-- for logged-in user-->
                <div class="navbar-nav" v-if="isLoggedIn" style="background-color: #FFFF; color: #FFFF;">
                    <router-link to="/" class="nav-item nav-link">Acceuil</router-link>
                    <router-link to="/dashboard" class="nav-item nav-link">Dashboard</router-link>
                    <router-link to="/voitures" class="nav-item nav-link">Voitures</router-link>
                    <router-link to="/about" class="nav-item nav-link">À propos</router-link>

                    <a class="nav-item nav-link" style="cursor: pointer;" @click="logout">Déconnexion</a>
                </div>
                <!-- for non-logged user-->
                <div class="navbar-nav" v-else style="background-color: #FFFF; color: #FFFF;">
                    <router-link to="/" class="nav-item nav-link">Acceuil</router-link>
                    <router-link to="/voitures" class="nav-item nav-link">Voitures</router-link>
                    <router-link to="/about" class="nav-item nav-link">À propos</router-link>

                    <router-link to="/login" class="nav-item nav-link">Connexion</router-link>
                    <router-link to="/register" class="nav-item nav-link">Inscription</router-link>

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

import SearchBar from './pages/SearchBar.vue';

export default {
    name: "App",
    components: {
        SearchBar,
    },
    name: "App",
    data() {

        return {

            isLoggedIn: false,
        }
    },
    created() {
        if (window.Laravel.isLoggedin) {
            this.isLoggedIn = true
        }
    },
    methods: {
        logout(e) {
            console.log('ss')
            e.preventDefault()
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.post('/logout')
                    .then(response => {
                        if (response.data.success) {
                            window.location.href = "/"
                        } else {
                            console.log(response)
                        }
                    })
                    .catch(function (error) {
                        console.error(error);
                    });
            })
        }
    },
}
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
