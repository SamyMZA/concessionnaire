<?php $marque = "Concessionaire Auto - " . $voiture['marque'] . $voiture['modele']; ?>


<div id = annonceHistorique>
    <div id = "annonce">
        <h2> <?= $voiture['marque'] ?> </h2>
        <h3> <?= $voiture['modele'] ?> </h3>             
        <h2> <?= $voiture['prix'] ?> $ </h2>
        <img src= <?= $voiture['img'] ?> />

    </div>
    
    <div id="historique">
        <h2>Acheteur(s) potentiels</h2>
        <?php foreach($achats as $achat):
            ?>
            <p class="achat">  <?=$achat['nom_utilisateur'] ?> a acheter une <?= $voiture['marque'] ?> <?= $voiture['modele'] ?>  </p>
        <?php endforeach; ?> 
        <form action="Voitures/achats" method="post">
            <label for="texte">ID</label> : <input type="text" name="id_utilisateur" id="id_utilisateur" /> <br />    
            <input type="hidden" name ="id_voiture" value="<?= $voiture['id'] ?>" />
            <!-- <button type="submit">Acheter</button> -->
        </form>
    </div>
</div>


