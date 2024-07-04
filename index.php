<?php
require_once 'app/config/paths.php';
require_once 'autoload.php';
require_once LIB_ROOT.'/helpersFunctions.php';

//variable de gestion d'erreur pour l'affichage de la mise en page (menu etc..) du site
$rootError = false;
// Récupérer l'URL demandée
$request_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Remplacer les underscores par des tirets dans l'URI
$request_uri = str_replace('_', '-', $request_uri);
//déclaration de variable $is_home_page qui est initialisé à true si l'url correspond au nom de domaine suivi de /  ou /accueil
$is_home_page = $request_uri === '/' || $request_uri === '/accueil';
//déclaration de variable $loginPage initialisé à true si l'url correspond au nom de domaine suivi de /admin
$loginPage = $request_uri === '/admin';
$content = '';

// Rediriger depuis /index.php vers /accueil
if ($request_uri === '/index.php' || $request_uri === '/') {
    header('Location: /accueil');
    exit();
}

// Router les demandes en fonction de l'URL
switch ($request_uri) {
    case '/':
    case '/accueil':
        // Inclure le contenu de la page d'accueil
        require_once VIEW_ROOT . '/home/Accueil/accueil.php';
        break;
    case '/decouvrir-melabio':
        // Inclure le contenu de la page "Découvrir Melabio"
        require_once VIEW_ROOT . '/home/DecouvrirMelabio/decouvrirMelabio.php';
        break;
    case '/les-prestations':
        // Inclure le contenu de la page "Les prestations"
        OfferController::getPublicationOffer();
        break;
    case '/contact':
        // Inclure le contenu de la page "contact"
        require_once VIEW_ROOT . '/home/Contact/contact.php';
        break;
    case '/conditions-utilisations':
        // Inclure le contenu de la page "condition d'utilisation"
        require_once VIEW_ROOT . '/home/ConditionsUtilisations/conditionUtilisations.php';
        break;
    case '/mentions-legales':
        // Inclure le contenu de la page "mentions légales"
        require_once VIEW_ROOT . '/home/MentionsLegales/mentionsLegales.php';
        break;
    case '/admin':
        session_start();
        if(isset($_SESSION)){
            $_SESSION = [];
        }
        AdminController::authenticate();
        break;
    case '/admin/mot-de-passe-oublie':
        AdminController::forgotPassword();
        break;
    case '/admin/reinitialisation-mot-de-passe':
        AdminController::resetPassword();
        break;
    case '/back-office':
        sessionVerification();
        // Inclure le contenu de la page "back-office"
        require_once VIEW_ROOT . '/admin/Dashboard/dashboard.php';
        require_once VIEW_ROOT . '/admin/Dashboard/dashboardLayout.php';
        break;
    case '/back-office/gestion-utilisateurs':
        sessionVerification();
        AdminController::getUser();
        break;
    case '/back-office/ajouter-utilisateurs':
        sessionVerification();
        AdminController::addUser();
        break;
    case '/back-office/modifier-utilisateurs':
        sessionVerification();
        AdminController::modifyUser();
        break;
    case '/back-office/supprimer-utilisateurs':
        sessionVerification();
        AdminController::deleteUser();
        break;
    case '/back-office/gestion-offres':
        sessionVerification();
        OfferController::afficherLesOffres();
        break;
    case '/back-office/ajouter-offres':
        sessionVerification();
        OfferController::ajouterOffres();
        break;
    case '/back-office/modifier-offres':
        sessionVerification();
        OfferController::modifierOffres();
        break;
    case '/back-office/supprimer-offres':
        sessionVerification();
        OfferController::supprimerOffres(); 
        break;
    case '/back-office/publier-offre':
        sessionVerification();
        $idOffre = $_POST["id"];
        OfferController::publierOffres($idOffre);
        break;

    default:
        // Afficher une page d'erreur 404
        http_response_code(404);
        echo '404 - Page Not Found';
        $rootError = true;
}
// on inclu le bon layout en fonction de l'url demandé
if ($rootError === false) {
    if ((!(strpos($request_uri, '/admin') === 0)) && (!(strpos($request_uri, '/back-office') === 0))) {
    require_once VIEW_ROOT . '/home/Layout/layout.php';
    }
}
