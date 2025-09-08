<?php

class Vue{
    private $fichier;
    private $titre;

    public function __construct($action){
        $this->fichier = "Vue/vue" . $action . ".php"; // sois vue...Voiture
    }

    // cree et affiche la vue

    public function generer($donnes = null){
        $contenu = $this->genererFichier($this->fichier, $donnes);

        $vue = $this->genererFichier("Vue/gabarit.php", array('titre' => $this->titre, 'contenu' => $contenu ));

        echo $vue;
    }

    private function genererFichier($fichier, $donnees) {
        if (file_exists($fichier)) {
            if ($donnees != NULL) {
                extract($donnees);
            }
            ob_start();
            require $fichier;

            return ob_get_clean();
        } else {
            throw new Exception("Fichier '$fichier' introuvable");
        }
    }
}