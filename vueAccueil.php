<?php $titre = "Concessionaire Auto" ?>

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

<form action="index.php?action=ajouter" method="post">
    <h2>Ajouter une voiture</h2>
    <p>
        <label for="texte">Marque</label> : <input type="text" name="marque" id="marque" />
        <br />
        <label for="texte">Modele</label> : <input type="text" name="modele" id="modele" /><br />
        <label for="texte">Prix</label> : <input type="text" name="prix" id="prix" /><br />
        <label for="texte">Lien Image</label> : <input type="text" name="lienimg" id="texte"><br />
        <input type="submit" value="Ajouter" />
    </p>
</form>

<?php $contenu = ob_get_clean(); ?>

<?php require 'gabarit.php'; ?>
