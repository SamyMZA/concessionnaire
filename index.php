<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Concessionnaire</title>
        <link rel="stylesheet" href="./style.css">
    </head>

    <body>
        <h1>Concessionnaire Auto</h1>

        <form action="ajouter.php" method="post">
            <h2>Rajouter voiture</h2>
            <p>
                <label for="marque">marque</label> : <input type="text" name="marque" id="marque" /><br />
                <label for="modele">modele</label> :  <input type="text" name="modele" id="modele" /><br />
                <label for="prix">prix</label> :  <input type="text" name="prix" id="prix" ><br />
                <input type="hidden" name="voitures_id" value="1" /><br />
                <input type="submit" value="Ajouter" />
            </p>
        </form>

        <div id="annonces">
            <?php

            try {
                $bdd = new PDO('mysql:host=localhost;dbname=concessionnaire;charset=utf8', 'root', 'mysql');
            } catch (Exception $e) {
                die('Erreur : ' . $e->getMessage());
            }
 

            $reponse = $bdd->query('SELECT * FROM voitures ORDER BY ID DESC LIMIT 0, 10');

            while ($donnees = $reponse->fetch()) {
                echo 
                '<div class="voiture"> 
                    <img src='. $donnees['lienimg'] .'/>' .
                    '<h2>' . $donnees['prix'] . '$</h2>'.
                    '<p>' . $donnees['marque'] . '</p>'.
                    '<p>' . $donnees['modele'] . ' </p> 
                </div>'
                ;
            }
            $reponse->closeCursor();
            ?>
        </div>
    </body>
</html>