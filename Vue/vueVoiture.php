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

<?php foreach ($voitures as $voiture): ?>
<p>
    <a href="index.php?action=supprimer&id=<?= $voiture['id'] ?>">
        [Supprimer]
    </a>
</p>
<?php endforeach; ?>

