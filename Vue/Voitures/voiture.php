<?php $marque = "Concessionaire Auto - " . $voiture['marque'] . $voiture['modele']; ?>


<div id = "annonce">
    <h2> <?= $voiture['marque'] ?> </p>
    <h3> <?= $voiture['modele'] ?> </p>             
    <h2> <?= $voiture['prix'] ?> $ </h2>
    <img src= <?= $voiture['lienimg'] ?> />
</div>


<hr />


<h2>Acheteur(s) potentiels</h2>

<?php foreach($achats as $achat): ?>

    <p> <?= $achat['nom_utilisateur'] ?> voudrait acheter cette voiture </p>

<?php endforeach; ?> 
