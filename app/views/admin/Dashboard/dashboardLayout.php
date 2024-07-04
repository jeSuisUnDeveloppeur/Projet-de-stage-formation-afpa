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
<body class="background-linear fade-in">
        <header id="dashboard-header">
            <?php require_once VIEW_ROOT.'/admin/Dashboard/dashboardHeader.php'; ?>
        </header>
        <main id="main-dashboardContent">
           <?= $content;?>
        </main>
    <script> let isLoginPage = false; </script>
    <script  src="<?=JS_URL?>bootstrap.js"></script>
    <script  src ="<?=JS_URL?>transitionBackOffice.js"></script>
</body>
</html>