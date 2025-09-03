<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Concessionaire</title>
    </head>

    <body>
        <h1>Concessionaire Auto</h1>

        <?php

        try {
            $bdd = new PDO('mysql:host=localhost;dbname=concessionaire;charset=utf8', 'root', 'mysql');
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

