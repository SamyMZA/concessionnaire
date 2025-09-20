
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



