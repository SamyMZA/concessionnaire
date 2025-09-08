<?php $titre = "Concessionaire Auto" ?>

<?php ob_start(); ?>
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

</br>
<form action="index.php?action=ajouter" method="post">
    <h2>Ajouter une voiture</h2>
    <!-- <p> -->
        <label for="texte">Marque</label> : <input type="text" name="marque" id="marque" />
        <br />
        <label for="texte">Modele</label> : <input type="text" name="modele" id="modele" /><br />
        <label for="texte">Prix</label> : <input type="text" name="prix" id="prix" /><br />
        <label for="texte">Lien Image</label> : <input type="text" name="lienimg" id="texte"><br />
        <!-- <input type="hidden" name="id" value="<?= $voiture['id'] ?>" /> -->
        <input type="submit" value="Ajouter" />
    <!-- </p> -->
</form>
</br>

<?php $contenu = ob_get_clean(); ?>

<?php require 'gabarit.php'; ?>
