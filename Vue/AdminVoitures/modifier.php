<?php $titre = "Concessionnaire - " . $voiture['marque']; ?>
<div id="ajout-voiture">

    <header>
        <h2 id="titreReponses">Modifier une voiture:</h2>
    </header>
    <form action="AdminVoitures/miseAjour" method="post">
        <p>
            <input type="hidden" name="id" value="<?= $voiture['id'] ?>" /><br />
            <label for="marque">Marque</label> : <input type="text" name="marque" id="marque" value="<?=$voiture['marque']?>"/> <br />
            <label for="modele">Modele</label> :  <input type="text" name="modele" id="modele"value="<?=$voiture['modele']?>"/> <br />
            <label for="prix">Prix</label> :  <input type="number" name="prix" id="prix" value="<?=$voiture['prix']?>"/> <br />
            <label for="img">Lien de l'image</label> : <input type="text" name="img" id="img" value="<?=$voiture['img']?>"/> <br />
            <input type="submit" value="Envoyer" />
        </p>
    </form>
    
</div>
