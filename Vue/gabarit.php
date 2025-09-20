
<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <base href="<?= $racineWeb ?>" >
        <link rel="stylesheet" href="Contenu/style.css" />
        <title><?= $titre ?></title>
    </head>
    <body>
        <div id="global">
            <header>
                <h1 id="titreSite">Concessionnaire Auto</h1>
                <p>Je vous souhaite la bienvenue sur notre concessionnaireAuto !.</p>
                <?php if (isset($utilisateur)) : ?>
                        <h3>Bonjour <?= $utilisateur['nom'] ?>,
                            <a href="Utilisateurs/deconnecter"><small>[Se déconnecter]</small></a>
                        </h3>
                <?php else : ?>
                        <h3>[<a href="Utilisateurs/index">Se connecter</a>] <small>(admin/admin)</small></h3>
                <?php endif; ?>
            </header>
            <div id="contenu">
                <?= $contenu ?>
            </div> 
            <footer id="piedSite">
                Site réalisé avec PHP, HTML5 et CSS.
            </footer>
        </div> 
    </body>
</html>



