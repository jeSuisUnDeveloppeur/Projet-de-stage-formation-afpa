<?php

class OfferController{
    const ERROR_EMPTY_FIELDS = "veuillez remplir les 2 champs (nom de l'offre et Description de l'offre)";

    public static function afficherLesOffres(){
        $offres = OfferModel::getOffers();
        require_once VIEW_ROOT.'/admin/Offer/manageOffers.php';
        require_once VIEW_ROOT.'/admin/Dashboard/dashboardLayout.php';
    }

    public static function ajouterOffres(){
        if(isset($_POST["offerName"],$_POST["offerDescription"])){
            $offerName = $_POST["offerName"];
            $offerDescription = $_POST["offerDescription"];
            if($offerName !="" && $offerDescription !=""){
                $offerName = AdminController::sanitize($offerName);
                $offerDescription = AdminController::sanitize($offerDescription);
                OfferModel::insertOffer($offerName,$offerDescription);
                self::afficherLesOffres();
                unset($_POST);
            }  
            else{
                $errorMessage = self::ERROR_EMPTY_FIELDS;
                require_once VIEW_ROOT.'/admin/Offer/addOffers.php';
                require_once VIEW_ROOT.'/admin/Dashboard/dashboardLayout.php';
            }
        }
        else{
            $errorMessage = "";
            require_once VIEW_ROOT.'/admin/Offer/addOffers.php';
            require_once VIEW_ROOT.'/admin/Dashboard/dashboardLayout.php';
        }  
    }

    public static function supprimerOffres(){
        if(isset($_POST["id"])){
            $idOffre = $_POST["id"];
            $idOffre = intval($_POST["id"]);
            OfferModel::deleteOffer($idOffre);
            self::afficherLesOffres();
        }  
    }

    public static function modifierOffres(){
        if(isset($_POST["offerName"],$_POST["offerDescription"])){
            $offerName = $_POST["offerName"];
            $offerDescription = $_POST["offerDescription"];
            $idOffre = intval($_POST["id"]);
           
            if($offerName !="" && $offerDescription !=""){
                $offerName = AdminController::sanitize($offerName);
                $offerDescription = AdminController::sanitize($offerDescription);
                OfferModel::updateOffer($idOffre,$offerName,$offerDescription);
                self::afficherLesOffres();
            }  
            else{
                $errorMessage = self::ERROR_EMPTY_FIELDS;
                require_once VIEW_ROOT.'/admin/Offer/modifyOffers.php';
                require_once VIEW_ROOT.'/admin/Dashboard/dashboardLayout.php';
            }
        }
        else{
            $errorMessage = "";
            require_once VIEW_ROOT.'/admin/Offer/modifyOffers.php';
            require_once VIEW_ROOT.'/admin/Dashboard/dashboardLayout.php';
        }  
    }
    public static function publierOffres($idOffre){

        $_POST["success"] = OfferModel::publicationOffres($idOffre);
        self::afficherLesOffres();
    }

    public static function getPublicationOffer(){
        $offreDuMoment = OfferModel::getOffreDuMoment();
        require_once VIEW_ROOT . '/home/Prestations/prestations.php';
        require_once VIEW_ROOT . '/home/Layout/layout.php';  
    }
}
?>