<?php
// Connexion à la base de données
try {
    $bdd = new PDO('mysql:host=localhost;dbname=concessionnaire;charset=utf8', 'root', 'mysql');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
// Préparation de la case à cocher
//$prive = (isset($_POST['prive'])) ? 1 : 0;
// Insertion du commentaire à l'aide d'une requête préparée
$req = $bdd->prepare('INSERT INTO voitures (voitures_id, marque, modele, prix,) VALUES(?, ?, ?, ?)');
$req->execute(array($_POST['voitures_id'], $_POST['marque'], $_POST['modele'], $_POST['prix']));

// Redirection du visiteur vers la page d'accueil
// En commentaire si déboguage

//header('Location: index.php');
?>
<html>
    <body>
        <!-- Ce bout de code HTML peut-être réutilisé n'importe où au besoin ---
        --- Seule l'action de la balise Form ci-dessous doit être adaptée au contexte ---
        --- Notez la différence dans l'affichage de "print_r" et de "var_dump" ---
        --- elle est due à la présence de l'extension "xdebug" dans l'environnement php de Ampps (cf. phpinfo) ---
        --- sinon l'affichage serait identique --- 
        --- comme xdebug est souvent présent dans les environnements de développement PHP, "var_dump" est préféré -->
        <h2>Envoyer un commentaire V0.3.1</h2>
        *** Pour déboguage ***<br />
        Voici le contenu de $_POST envoyé par le formulaire d'envoi et transmis à la requête : <br />
        <?php var_dump($_POST); ?>
        
        <?php // print_r($_POST); // décommentez pour comparer avec var_dump ?>
        <form action="index.php">
            <input type="submit" value="Continuer">
        </form>
    </body>     
</html>