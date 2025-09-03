<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Concessionnaire</title>
    </head>

    <body>
        <h1>Concessionnaire Auto</h1>

        <?php

        try {
            $bdd = new PDO('mysql:host=localhost;dbname=concessionnaire;charset=utf8', 'root', 'mysql');
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }


        $reponse = $bdd->query('SELECT * FROM voitures ORDER BY ID DESC LIMIT 0, 10');

        while ($donnees = $reponse->fetch()) {
            echo '<p>' . $donnees['marque'] . '</p>';
        }
        $reponse->closeCursor();
        ?>
    </body>
</html>

