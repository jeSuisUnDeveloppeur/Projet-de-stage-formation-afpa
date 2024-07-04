<?php
// Définition de la racine du serveur
define('SERVER_ROOT', realpath(dirname(__FILE__).'/..'));

// Chemins absolus vers les répertoires principaux de l'application
define('APP_ROOT', SERVER_ROOT . '/app');
define('PUBLIC_ROOT', SERVER_ROOT . '/public');
define('CONFIG_ROOT', SERVER_ROOT . '/config');
define('VIEW_ROOT', SERVER_ROOT . '/views');
define('MODEL_ROOT', SERVER_ROOT . '/models');
define('CONTROLLER_ROOT', SERVER_ROOT . '/controllers');
define('LIB_ROOT', SERVER_ROOT . '/lib');


// URL de base pour les liens et ressources publiques
define('BASE_URL', 'http://localhost:3000');
define('CSS_URL', BASE_URL .'/public/css/');
define('JS_URL', BASE_URL .'/public/js/');
define('IMAGES_URL', BASE_URL.'/public/assets/img/');
define('FONTS_URL', BASE_URL.'/public/assets/fonts/');

?>
