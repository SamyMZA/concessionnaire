<?php $titre = "Concessionnaire Auto" ?>

<?php ob_start(); ?>
<div id="pageAccueil">
    <div id = "annonces">

        <?php foreach($voitures as $voiture):
            ?>
                <div class="voiture"> 
                    <img src= <?= $voiture['lienimg'] ?> />
                    <h2> <?= $voiture['prix'] ?> $ </h2>
                    <p> <?= $voiture['marque'] ?> </p>
                    <p> <?= $voiture['modele'] ?> </p> 
                    <button>Acheter</button>
                </div>
        <?php endforeach; ?>    
        
        
    </div>
    <div id="historique">
        <h2>Historique d'achat</h2>
        <?php foreach($achats as $achat):
            ?>
            <p class="achat">  <?= $achat['nom_utilisateur'] ?> a acheter une <?= $achat['marque_voiture'] ?>   </p>
        <?php endforeach; ?> 
    </div>
</div>
<?php $contenu = ob_get_clean(); ?>

<?php require 'gabarit.php'; ?>

