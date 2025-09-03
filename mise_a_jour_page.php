<?php
// Connexion à la base de données
try {
    $bdd = new PDO('mysql:host=localhost;dbname=concessionaire;charset=utf8', 'root', 'mysql');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
// Insertion du commentaire à l'aide d'une requête préparée
$req = $bdd->prepare('UPDATE voitures SET marque = ?, modele = ?, prix = ?, WHERE id = ?');
$req->execute(array($_POST['marque'], $_POST['modele'], $_POST['prix'], $_POST['id']));

// Redirection du visiteur vers la page d'accueil du Blogue
// En commentaire si déboguage
header('Location: index.php');
?>
<!-- Pour déboguage -->
<html>
    <body>
        <h2>Mettre à jour page index</h2>
        <form action="index.php">
            *** Pour déboguage ***<br />
            Voici le contenu de $_POST envoyé par le formulaire de modification et transmis à la requête : <br />
            <?php var_dump($_POST); ?>
            <input type="submit" value="Continuer">
        </form>
    </body>     
</html>
