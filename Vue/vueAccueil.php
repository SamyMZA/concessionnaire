<?php $titre = "Concessionnaire Auto" ?>

<?php ob_start(); ?>
<?php foreach($voitures as $voiture):
     ?>
        <div class="voiture"> 
            <img src= <?= $voiture['lienimg'] ?> />
            <h2> <?= $voiture['prix'] ?> $ </h2>
            <p> <?= $voiture['marque'] ?> </p>
            <p> <?= $voiture['modele'] ?> </p> 
        </div>
<?php endforeach; ?>    
<?php $contenu = ob_get_clean(); ?>

<?php require 'gabarit.php'; ?>
