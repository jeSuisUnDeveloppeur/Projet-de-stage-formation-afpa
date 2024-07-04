<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?=IMAGES_URL?>favicon.ico">
    <link rel="stylesheet" href="<?=CSS_URL?>bootstrap.css">
    <link rel="stylesheet" href="<?=CSS_URL?>style.css">
    <title id="page-title"><?= $titlePage?></title>
</head>
<body class="background-linear">
        <header>
            <?php require_once VIEW_ROOT.'/home/Layout/header.php'; ?>
        </header>
        <main id="main-content">
           <?= $content;?>
        </main>
        <footer>
            <?php require_once VIEW_ROOT.'/home/Layout/footer.php'; ?>
        </footer>


    <script>
        // je défini une variable globale JavaScript pour stocker l'état de la page d'accueil et une pour stocker le chemin absolu vers le dossier image
        let isHomePage = <?=$is_home_page ?'true':'false'?>;
        let images_url = '<?=IMAGES_URL?>';  
    </script>
    <script  src="<?=JS_URL?>bootstrap.js"></script>
    <script src ="<?=JS_URL?>AjaxTransitionPage.js" type="module"></script>
</body>
</html>