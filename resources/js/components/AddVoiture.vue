<template>
    <div class="container mt-4">
        <h4 class="text-center mb-4">Ajouter une voiture</h4>

        <form
            @submit.prevent="addVoiture"
            enctype="multipart/form-data"
            class="p-3 border rounded bg-light"
        >
            <div class="mb-3">
                <label class="form-label">Marque :</label>
                <input
                    type="text"
                    v-model="voiture.marque"
                    class="form-control"
                    required
                />
            </div>

            <div class="mb-3">
                <label class="form-label">Modele :</label>
                <textarea
                    v-model="voiture.modele"
                    class="form-control"
                    required
                ></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Prix :</label>
                <input
                    type="text"
                    v-model="voiture.prix"
                    class="form-control"
                    required
                />
            </div>

            <div class="mb-3">
                <label class="form-label">Image :</label>
                <input
                    type="file"
                    class="form-control"
                    @change="onFileChange"
                />
            </div>

            <button type="submit" class="btn btn-primary" :disabled="loading">
                {{ loading ? "Envoi en cours..." : "Enregistrer" }}
            </button>
        </form>
    </div>
</template>

<script setup>
import { ref } from "vue";

const voiture = ref({
    marque: "",
    modele: "",
    prix: "",
    dispo: 1,
    img: null,
});

const loading = ref(false);

function onFileChange(e) {
    voiture.value.img = e.target.files[0];
}

async function addVoiture() {
    try {
        loading.value = true;

        // const id = this.$route.params.id;
        const token = localStorage.getItem("token");

        if (!token) {
            alert("Veuillez vous connecter d'abord.");
            return this.$router.push("/login");
        }
        // Préparer les données
        const formData = new FormData();
        formData.append("marque", voiture.value.marque);
        formData.append("modele", voiture.value.modele);
        formData.append("prix", voiture.value.prix);
        // formData.append("dispo", voiture.value.dispo);
        if (voiture.value.img) formData.append("img", voiture.value.img);

        // Envoi de la voiture
        const response = await axios.post("/api/voitures", formData, {
            headers: {
                Authorization: `Bearer ${token}`,
                "Content-Type": "multipart/form-data",
            },
            //withCredentials: true,
        });

        alert("Voiture ajouté avec succès !");
        window.location.href = "/voitures";
    } catch (error) {
        console.error("Erreur complète :", error);
        console.error("Réponse :", error.response?.data);
        alert(
            "Erreur : " +
                (error.response?.data?.message || "Erreur lors de l’ajout")
        );
    } finally {
        loading.value = false;
    }
}
</script>

<style scoped>
.container {
    max-width: 600px;
}
</style>
