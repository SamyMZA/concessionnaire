<?php $titre = "Supprimer - " . $voiture['marque']; ?>
<?php ob_start(); ?>
<article>
    <header>
        <p><h1>
            Supprimer?
        </h1>
        <?= $voiture['marque'] ?>, <?= $voiture['modele'] ?> <?= $voiture['prix'] ?>
        <?= $voiture['lienimg'] ?>
        </p>
    </header>
</article>

<form action="index.php?action=supprimer" method="post">
    <input type="hidden" name="id" value="<?= $voiture['id'] ?>" /><br />
    <input type="submit" value="Oui" />
</form>
<form action="index.php" method="get" >
    <input type="hidden" name="action" value="voiture" />
    <input type="hidden" name="id" value="<?= $voiture['id'] ?>" />
    <input type="submit" value="Annuler" />
</form>
<?php $contenu = ob_get_clean(); ?>

<?php require 'Vue/gabarit.php'; ?>