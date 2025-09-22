<?php $titre = "Supprimer - " . $achat['id_utilisateur']; ?>

<voiture>
    <header>
        <p><h1>
            Effacer?
        </h1>
        <?= $achat['id'] ?>, <?= $achat['id_utilisateur'] ?>, <?= $achat['id_voiture'] ?> <br/>
        </p>
    </header>
</voiture>

<form action="Adminachats/supprimer/<?= $achat['id'] ?>" method="post">
    <input type="submit" value="Oui" />
</form>
<form action="Adminvoitures/lire/<?= $achat['id_voiture'] ?>" method="post" >
    <input type="submit" value="Annuler" />
</form>