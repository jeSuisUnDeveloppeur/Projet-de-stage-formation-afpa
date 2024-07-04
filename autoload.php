<?php
        spl_autoload_register(function ($class) {
        // Convertit les backslashes en slashes
        $classPath = str_replace('\\', '/', $class) . '.php';
        
        // on ajoute les sous dossier /models et /controllers
        $additionalPaths = ['/models/', '/controllers/'];

        // Parcourir les sous-dossiers et essayer de charger la classe depuis chacun d'eux
        foreach ($additionalPaths as $path) {
            $fullPath = __DIR__ . '/app' . $path . $classPath;
            if (file_exists($fullPath)) {
                require_once $fullPath;
                return;
            }
        }

    });
?>

