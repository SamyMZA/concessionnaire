<template>
    <div>
        <h4 class="text-center">Liste des voitures</h4>
        <br />

        <!-- Version alternative : toujours visible, redirige vers login si non connecté -->

        <router-link v-if="isLoggedIn" :to="{ name: 'addvoiture' }" class="btn btn-primary">
            Ajouter
        </router-link>

        <button v-else @click="goAdd" class="btn btn-primary">Ajouter</button>

        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th scope="col" class="text-center">Image</th>
                    <th scope="col" class="text-center">Marque</th>
                    <th scope="col" class="text-center">Modele</th>
                    <th scope="col" class="text-center">Prix</th>
                    <th scope="col" class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="voiture in voitures" :key="voiture.id">
                    <td style="text-align: center; vertical-align: middle">
                        <div v-if="voiture.img">
                            <img
                                class="img-thumbnail"
                                :src="'/images/upload/' + voiture.img"
                            />
                        </div>
                    </td>
                    <td style="text-align: center; vertical-align: middle">
                        {{ voiture.marque }}
                    </td>
                    <td style="text-align: center; vertical-align: middle">
                        {{ voiture.modele }}
                    </td>
                    <td style="text-align: center; vertical-align: middle">
                        {{ voiture.prix }} $
                    </td>
                    <td>
                        <div style="text-align: center; vertical-align: middle">
                            <!--  <router-link :to="{ name: 'infovoiture', params: { id: voiture.id } }"
                                class="btn btn-primary">Plus
                            </router-link>

                            <router-link :to="{ name: 'modifiervoiture', params: { id: voiture.id } }"
                                class="btn btn-warning" v-if="isLoggedIn">Modifier
                            </router-link> -->

                            <button
                                class="btn btn-danger"
                                @click="checkAuthBeforeDelete(voiture.id)"
                            >
                                Delete
                            </button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    data() {
        return {
            voitures: [],
            isLoggedIn: false,
        };
    },
    created() {
        this.checkLoginStatus(); // Vérification de la connexion dès la création du composant
        // Chargement des articles
        axios
            .get("/api/voitures")
            .then((response) => {
                this.voitures = response.data;
            })
            .catch((error) => {
                console.error(error);
            });
    },
    methods: {
        checkLoginStatus() {
            // Si tu utilises session auth (Laravel) on lit window.Laravel.isLoggedin, sinon localStorage token
            if (
                window.Laravel &&
                typeof window.Laravel.isLoggedin !== "undefined"
            ) {
                this.isLoggedIn = !!window.Laravel.isLoggedin;
            } else {
                // fallback si tu utilises un token localStorage
                const token = localStorage.getItem("token");
                this.isLoggedIn = !!token;
            }
        },

        goAdd() {
             // Si pas connecté -> redirection vers la page de login
             if (!this.isLoggedIn) {
                 // Utilise le nom de route 'login' si tu l'as défini, sinon chemin '/login'
                 this.$router.push({ name: 'login' }).catch(() => { this.$router.push('/login') });
                 return;
             }
             // sinon rediriger vers addvoiture (nom de route)
             this.$router.push({ name: 'addvoiture' }).catch(() => { this.$router.push('/add') });
         }, 

        checkAuthBeforeDelete(id) {
            if (!this.isLoggedIn) {
                // redirection correcte : name ou path
                this.$router.push({ name: "login" }).catch(() => {
                    this.$router.push("/login");
                });
            } else {
                this.deleteArticle(id);
            }
        },

        deleteArticle(id) {
            if (!confirm("Voulez vous vraiment supprimer cette voiture ?")) {
                return;
            }
            axios
                .delete(`/api/voitures/${id}`)
                .then(() => {
                    this.voitures = this.voitures.filter(
                        (voiture) => voiture.id !== id
                    );
                })
                .catch((error) => {
                    console.error(
                        "Erreur lors de la suppression de la voiture :",
                        error
                    );
                    // si erreur 401/403 -> rediriger vers login
                    if (
                        error.response &&
                        (error.response.status === 401 ||
                            error.response.status === 403)
                    ) {
                        this.$router.push({ name: "login" }).catch(() => {
                            this.$router.push("/login");
                        });
                    }
                });
        },
    },
};
</script>
