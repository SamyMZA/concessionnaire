<?php $this->titre = "Historique achat" ?>


<div id="historique">
    <h2>Historique d'achat</h2>
    <?php foreach($achats as $achat):
        ?>
        <p class="achat">  <?= $achat['nom_utilisateur'] ?> a acheter une <?= $achat['marque_voiture'] ?>   </p>
    <?php endforeach; ?> 
</div>