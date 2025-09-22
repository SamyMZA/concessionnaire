<!-- <?php $this->titre = "Historique achat" ?> -->


<!-- <div id="historique"> -->
    <h2>Historique d'achat</h2>
    <?php foreach($achats as $achat):
        ?>
        <?php if ($achat['efface'] == '0') : ?>
        <p><a href="Adminachats/confirmer/<?= $this->nettoyer($achat['id']) ?>" >
                [Effacer]</a>
        <p class="achat">  <?= $achat['nom_utilisateur'] ?> a acheter une <?= $achat['marque_voiture'] ?>   </p>
    <?php else : ?> 
        <p class="efface"><a href="Adminachats/retablir/<?= $this->nettoyer($achat['id']) ?>" >
                [Rétablir]</a>
            Achat de <?= $this->nettoyer($achat['id_utilisateur']) ?> effacé! ?>
        </p>
    <?php endif; ?>
<?php endforeach; ?>
<!-- </div> -->