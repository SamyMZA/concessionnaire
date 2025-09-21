<?php $titre = "Concessionnaire - " . $voiture['marque']; ?>
<div id="ajout-voiture">

    <header>
        <h2 id="titreReponses">Modifier une voiture:</h2>
    </header>
    <form action="AdminVoitures/modifier" method="post">
        <p>
            <label for="marque">Marque</label> : <input type="text" name="marque" id="marque" /> <br />
            <label for="modele">Modele</label> :  <input type="text" name="modele" id="modele" /><br />
            <label for="prix">Prix</label> :  <input type="number" name="prix" id="prix" ></input><br />
            <label for="img">Lien de l'image</label> : <input type="text" name="img" id="img" /> <br />
            <input type="hidden" name="id" value="<?= $voiture['id'] ?>" /><br />
            <input type="submit" value="Envoyer" />
        </p>
    </form>
    
</div>
