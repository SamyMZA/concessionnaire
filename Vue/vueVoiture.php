<?php $marque = "Concessionaire Auto - " . $voiture['marque'] . $voiture['modele']; ?>

<?php ob_start(); ?>
<voiture>
    <header>
        <h1 class="marqueVoiture"><?= $voiture['marque'] ?></h1>
    </header>
    <p><?= $voiture['modele'] ?></p>
    <p><?= $voiture['prix'] ?></p>
    <p><?= $voiture['lienimg'] ?></p>
</voiture>
<hr />
<header>

<?php foreach ($achats as $achat): ?>
<p>
    <a href="index.php?action=confirmer&id=<?= $achat['id'] ?>">
        [Supprimer]
    </a>
    <?= $achat['nom'] ?> (<?= $achat['id_utilisateur'] ?>) aimerait acheter cette voiture<br />
</p>
<?php endforeach; ?>

</br>
<form action="index.php?action=achat" method="post">
    <h2>Voulez-vous acheter cette voiture?</h2>
    <!-- <p> -->
        <label for="texte">Votre Nom</label> : <input type="text" name="nom" id="nom" /> <br />
        <label for="texte">Votre telephone</label> : <input type="text" name="id_utilisateur" id="id_utilisateur" /> <br />
        <input type="hidden" name ="voiture_id" value="<?= $voiture['id'] ?>" />
        <input type="hidden" name ="prix" value="<?= $voiture['prix'] ?>" />
        <input type="submit" value="Acheter cette voiture" />
    <!-- </p> -->
</form>
</br>

