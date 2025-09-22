<?php $this->$titre = "Concessionnaire Auto"; ?>


<div id="pageAccueil">
    <div id = "annonces">
        <?php foreach($voitures as $voiture): ?>
            <div class="voiture" for> 
                <img src= <?= $voiture['img'] ?> />
                <a href="<?= "AdminVoitures/voiture/" . $voiture['id'] ?>"> 
                    <h2> <?= $voiture['prix'] ?> $ </h2>
                    <p> <?= $voiture['marque'] ?> </p>
                    <p> <?= $voiture['modele'] ?> </p>             
                </a> 
            </div>
        <?php endforeach; ?>    
        
        
    </div>
<div>
    <a href="Adminvoitures/ajouter">Ajouter un vehicule</a>
</div>
