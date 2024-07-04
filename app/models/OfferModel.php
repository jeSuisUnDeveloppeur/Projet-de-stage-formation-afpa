<?php
class OfferModel {
    public static function insertOffer($offerName,$offerDescription){
        try{
            $pdo = new Database;
            $rqt = "INSERT INTO offre VALUES (:id_offre,:nom_offre,:description_offre);";
            $statement = $pdo->getConnexion()->prepare($rqt);
            $statement->bindValue('id_offre',null,PDO::PARAM_INT);
            $statement->bindValue('nom_offre',$offerName,PDO::PARAM_STR);
            $statement->bindValue('description_offre',$offerDescription,PDO::PARAM_STR);
            $statement->execute();
        }catch(PDOException $e){
            die('Erreur de base de donnée : '.$e->getMessage());
        }
    }

    public static function deleteOffer($idOffre){
        try{
            $pdo = new Database;
            $rqtOffreSupprimee = "SELECT description_offre FROM offre WHERE id_offre = :id_offre;";
            $statement = $pdo->getConnexion()->prepare($rqtOffreSupprimee);
            $statement->bindValue('id_offre',$idOffre,PDO::PARAM_INT);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_OBJ);
            $offreSupprimee = $result->description_offre;
            $offreDuMoment = self::getOffreDuMoment();
            if($offreSupprimee === $offreDuMoment){
                $rqtSupprimerPublication = "DELETE FROM offre_publier";
                $statement = $pdo->getConnexion()->prepare($rqtSupprimerPublication);
                $statement->execute();

                $rqtAucuneOffre = "INSERT INTO offre_publier VALUES (:id_offre,:nom_offre,:description_offre);";
                $statement = $pdo->getConnexion()->prepare($rqtAucuneOffre);
                $statement->bindValue(':id_offre',0,PDO::PARAM_INT);
                $statement->bindValue(':nom_offre','aucune offre',PDO::PARAM_STR);
                $statement->bindValue(':description_offre','En ce moment, il n\'y a aucune offre du moment',PDO::PARAM_STR);
                $statement->execute();
            }

            $rqt = "DELETE FROM offre WHERE id_offre =:id_offre;";
            $statement = $pdo->getConnexion()->prepare($rqt);
            $statement->bindValue('id_offre',$idOffre,PDO::PARAM_INT);
            $statement->execute();
   
        }catch(PDOException $e){
            die('Erreur de base de donnée, suppression de l\'offre impossible:'.$e->getMessage());
        }
    }

    public static function updateOffer($idOffre,$offerName,$offerDescription){
        try{
            $pdo = new Database;
            $rqt = "UPDATE offre SET nom_offre= :name, description_offre= :description WHERE id_offre = :idOffre ;";
            $statement = $pdo->getConnexion()->prepare($rqt);
            $statement->bindValue(':idOffre',$idOffre,PDO::PARAM_INT);
            $statement->bindValue(':name',$offerName,PDO::PARAM_STR);
            $statement->bindValue(':description',$offerDescription,PDO::PARAM_STR);
            $statement->execute();
        }catch(PDOException $e){
            die('Erreur de base de donnée, modification de l\'offre impossible:'.$e->getMessage());
        }
    }

    public static function getOffers() {
        try{
            $pdo = new Database;
            $rqt = "SELECT*FROM offre;";
            $statement = $pdo->getConnexion()->prepare($rqt);
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            die('Erreur de base de donnée : '.$e->getMessage());
        }
    }

    public static function publicationOffres($idOffre){
        try{
            $pdo = new Database;
            $rqtSuppAncienneOffre = "DELETE FROM offre_publier;";
            $statement = $pdo->getConnexion()->prepare($rqtSuppAncienneOffre);
            $statement->execute();

            $rqtNouvelleOffre = "SELECT*FROM offre WHERE id_offre = :idOffre;";
            $statement = $pdo->getConnexion()->prepare($rqtNouvelleOffre);
            $statement->bindValue(':idOffre',$idOffre,PDO::PARAM_INT);
            $statement->execute();
            $offreApublier = $statement->fetch(PDO::FETCH_OBJ);

            $rqtPublicationOffre = "INSERT INTO offre_publier VALUES (:id,:nomOffre,:descriptionOffre);";
            $statement = $pdo->getConnexion()->prepare($rqtPublicationOffre);
            $statement->bindValue(':id',$offreApublier->id_offre,PDO::PARAM_INT);
            $statement->bindValue(':nomOffre',$offreApublier->nom_offre,PDO::PARAM_STR);
            $statement->bindValue(':descriptionOffre',$offreApublier->description_offre,PDO::PARAM_STR);
            $statement->execute();
        }catch(PDOException $e){
             die('Erreur de base de donnée, publication impossible'.$e->getMessage());
        }
        return true;
    }

    public static function getOffreDuMoment(){
        try{
            $pdo = new Database;
            $rqt = "SELECT*FROM offre_publier;";
            $statement = $pdo->getConnexion()->prepare($rqt);
            $statement->execute();
            $results = $statement->fetch(PDO::FETCH_OBJ);
            return $results->description_offre;
        }catch(PDOException $e){
            return 'Aucune offre actuellement';
        }
    }
}
?>