<?php $this->titre = "Historique achat" ?>


<div id="historique">
    <h2>Historique d'achat</h2>
    <?php foreach($achats as $achat):
        ?>
        <p class="achat">  <?= $achat['id_utilisateur'] ?> a acheter une <?= $achat['id_voiture'] ?>   </p>
    <?php endforeach; ?> 
</div>