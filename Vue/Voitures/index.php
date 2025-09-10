<?php $titre = "Concessionnaire Auto" ?>


<div id="pageAccueil">
    <div id = "annonces">
        <?php foreach($voitures as $voiture): ?>
            <div class="voiture" for> 
                    <img src= <?= $voiture['lienimg'] ?> />
                    <h2> <?= $voiture['prix'] ?> $ </h2>
                    <p> <?= $voiture['marque'] ?> </p>
                    <p> <?= $voiture['modele'] ?> </p> 
            </div>
        <?php endforeach; ?>    
        
        
    </div>

</div>
