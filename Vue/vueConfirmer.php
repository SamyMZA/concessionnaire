<?php $titre = "Supprimer - " . $achat['nom']; ?>
<?php ob_start(); ?>
<achat>
    <header>
        <p><h1>
            Supprimer?
        </h1>
        <?= $achat['nom'] ?>, <?= $achat['id_utilisateur'] ?>
        </p>
    </header>
</achat>

<form action="index.php?action=supprimer" method="post">
    <input type="hidden" name="id" value="<?= $achat['id'] ?>" /><br />
    <input type="submit" value="Oui" />
</form>
<form action="index.php" method="get" >
    <input type="hidden" name="action" value="voiture" />
    <input type="hidden" name="id" value="<?= $voiture['id'] ?>" />
    <input type="submit" value="Annuler" />
</form>
<?php $contenu = ob_get_clean(); ?>

<?php require 'Vue/gabarit.php'; ?>