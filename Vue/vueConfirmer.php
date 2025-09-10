<?php $titre = "Supprimer - " . $achat['nom']; ?>
<?php ob_start(); ?>
<achat>
    <header>
        <p><h1>
            Supprimer?
        </h1>
        <?= $achat['nom_utilisateur'] ?> voudrait acheter la voiture de marque <?= $achat['marque_voiture'] ?>
        </p>
    </header>
</achat>

<form action="index.php?action=supprimer" method="post">
    <input type="hidden" name="id" value="<?= $achat['id'] ?>" /><br />
    <input type="submit" value="Oui" />
</form>
<form action="index.php" method="get" >
    <input type="hidden" name="action" value="voiture" />
    <input type="hidden" name="id" value="<?= $achat['id_voiture'] ?>" />
    <input type="submit" value="Annuler" />
</form>
<?php $contenu = ob_get_clean(); ?>

<?php require 'Vue/gabarit.php'; ?>