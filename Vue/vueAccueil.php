<?php $titre = "Concessionaire Auto" ?>

<?php ob_start(); ?>
<div id="pageAccueil">
    <div id = "annonces">

        <?php foreach($voitures as $voiture):
            ?>
                <voiture>
                    <div class="voiture"> 
                        <img src= <?= $voiture['lienimg'] ?> />
                        <h2> <?= $voiture['prix'] ?> $ </h2>
                        <a href="<?= "index.php?action=voiture&id=" . $voiture['id'] ?>"> 
                        <p> <?= $voiture['marque'] ?> </p>
                        </a>
                        <p> <?= $voiture['modele'] ?> </p> 
                    </div> 
                </voiture>
        <?php endforeach; ?> 
    </div>
</div>

<?php $contenu = ob_get_clean(); ?>

<?php require 'gabarit.php'; ?>
