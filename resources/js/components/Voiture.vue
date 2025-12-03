<template>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Voiture</div>

                    <h2 class="card-body">Voiture</h2>

                        <div v-if="voiture">
                            <h3>{{ voiture.marque }} - {{ voiture.modele }}</h3>
                            <img
                                class="img-thumbnail"
                                :src="'/storage/images/upload/' + voiture.img"
                                width="300px"
                                height="200px"
                            />
                            <p>Prix : {{ voiture.prix }} $</p>
                            <p>Disponible : {{ voiture.dispo ? 'Oui' : 'Non' }}</p>
                        </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios';

export default {
  data() {
    return {
      voiture: null,
    };
  },
  created() {
    const id = this.$route.params.id;
    axios.get(`/api/voiture/${id}`)
      .then(res => { this.voiture = res.data; })
      .catch(err => { console.error(err); });
  },
};
</script>
