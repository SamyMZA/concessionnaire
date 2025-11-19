<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

<<<<<<< Updated upstream
                    <div class="card-body">
                        I'm an example component.
                    </div>
                </div>
            </div>
        </div>
=======
        <!-- Version alternative : toujours visible, redirige vers login si non connecté -->
        <router-link v-if="isLoggedIn" :to="{ name: 'addavoiture' }" class="btn btn-primary">
            Ajouter
        </router-link>

        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th scope="col" class="text-center">Image</th>
                    <th scope="col" class="text-center">Marque</th>
                    <th scope="col" class="text-center">Modele</th>
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
>>>>>>> Stashed changes
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
