<?php
class UserModel {
    public static function verifyCredentials($username, $password) {
       try{
            //Création d'une instance de la classe Database pour établir la connexion à la base de données
            $pdo = new Database;
            $rqt = "SELECT*FROM utilisateur WHERE pseudo = :username";
            $statement = $pdo->getConnexion()->prepare($rqt);
            $statement->bindValue("username",$username,PDO::PARAM_STR);
            $statement->execute();
            //récupération de l'utilisateur si il existe dans la variable $user
            $user = $statement->fetch(PDO::FETCH_ASSOC);  //prend false si aucun resultat n'est trouvé

            if(!$user){
                return false; // si l'utilisateur n'existe pas on return false et on sort de la fonction
            }
            else{
                //on vérifie le mot de passe 
                return password_verify($password,$user["mot_de_passe"]);
            }
        }catch(PDOException $e){
            die("Erreur de base de données: ".$e->getMessage());
        }
    }

    public static function addUser($username,$password,$email){
        try{
            //Création d'une instance de la classe Database pour établir la connexion à la base de données
            $pdo = new Database;
            $rqt = "INSERT INTO utilisateur VALUES (null,:username,:password,:email,null)";
            $statement = $pdo->getConnexion()->prepare($rqt);
            $statement->bindValue(":username",$username,PDO::PARAM_STR);
            $statement->bindValue(":password",$password,PDO::PARAM_STR);
            $statement->bindValue(":email",$email,PDO::PARAM_STR);
            $statement->execute();
        }catch(PDOException $e){
            die("Erreur de base de données: ".$e->getMessage());
        }
    }

    public static function deleteUser($idUser){
        try{
            $pdo = new Database;
            $rqt = "DELETE FROM utilisateur WHERE id_utilisateur = :idUser;";
            $statement = $pdo->getConnexion()->prepare($rqt);
            $statement->bindValue(':idUser',$idUser,PDO::PARAM_INT);
            $statement->execute();
        }catch(PDOException $e){
            die("Erreur de base de données,suppression impossible :".$e->getMessage());
        }
    }

    public static function readUser(){
         try{
            //Création d'une instance de la classe Database pour établir la connexion à la base de données
            $pdo = new Database;
            $rqt = "SELECT*FROM utilisateur";
            $statement = $pdo->getConnexion()->prepare($rqt);
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
         }catch(PDOException $e){
            die("Erreur de base de données:".$e->getMessage());
         }
    }

    public static function updateUsers($id,$userName,$userPassword,$userEmail){
        try{
            $pdo = new Database;
            $rqt = "UPDATE utilisateur SET pseudo = :userName,mot_de_passe = :userPassword,email = :userEmail WHERE id_utilisateur = :id;";
            $statement = $pdo->getConnexion()->prepare($rqt);
            $statement->bindValue(":userName",$userName,PDO::PARAM_STR);
            $statement->bindValue(":userPassword",$userPassword,PDO::PARAM_STR);
            $statement->bindValue(":userEmail",$userEmail,PDO::PARAM_STR);
            $statement->bindValue(":id",$id,PDO::PARAM_INT);
            $statement->execute();
        }catch(PDOException $e){
            die("Erreur de base de donnée, modification de l'utilisateur impossible:".$e->getMessage());
        }    
    }

    public static function emailExists($email) {
        try{
            $pdo = new Database;
            $rqt = "SELECT COUNT(*) AS count FROM utilisateur WHERE email = :email";
            $statement = $pdo->getConnexion()->prepare($rqt);
            $statement->bindValue(":email",$email,PDO::PARAM_STR);
            $statement->execute();
            // Récupération du résultat de la requête
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            // Si le nombre de lignes est supérieur à zéro, l'e-mail existe déjà
            if ($result['count'] > 0) {
                return true;
            } else {
                return false;
            }
        }catch(PDOException $e){
            die("Erreur de base de donnée, connexion perdu,verifier votre connexion internet:".$e->getMessage());
        }
    }

    public static function updateToken($token,$email){
        try{
            $pdo = new Database;
            $rqt = "UPDATE utilisateur SET token = :token WHERE email = :email;";
            $statement = $pdo->getConnexion()->prepare($rqt);
            $statement->bindValue(":token",$token,PDO::PARAM_STR);
            $statement->bindValue(":email",$email,PDO::PARAM_STR);
            $statement->execute();
        }catch(PDOException $e){
            die("erreur de base de donnée impossible de mettre le jeton à jours:".$e->getMessage());
        }
    }

    public static function tokenExist($token){
        try{
            $pdo = new Database;
            $rqt = "SELECT COUNT(*) AS count FROM utilisateur WHERE token = :token";
            $statement = $pdo->getConnexion()->prepare($rqt);
            $statement->bindValue(":token",$token,PDO::PARAM_STR);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            if ($result['count'] > 0) {
                return true;
            } else {
                return false;
            }
        }catch(PDOException $e){
            die("erreur de base de donnée:".$e->getMessage());
        }
    }

    public static function updatePassword($token,$password){
        try{
            $pdo = new Database;
            $rqt = "UPDATE utilisateur SET mot_de_passe = :password WHERE token = :token;";
            $statement = $pdo->getConnexion()->prepare($rqt);
            $statement->bindValue(":password",$password,PDO::PARAM_STR);
            $statement->bindValue(":token",$token,PDO::PARAM_STR);
            $statement->execute();
            self::resetToken($token);
        }catch(PDOException $e){
            die("erreur de connexion à la base de donnée, réinitialisation du mot de passe impossible, vérifier votre connexion".$e->getMessage());
        }
    }

    public static function resetToken($token){
        try{
            $pdo = new Database;
            $rqt = "UPDATE utilisateur SET token = :newValue WHERE token = :token;";
            $statement = $pdo->getConnexion()->prepare($rqt);
            $statement->bindValue(":newValue",null);
            $statement->bindValue(":token",$token,PDO::PARAM_STR);
            $statement->execute();
        }catch(PDOException $e){
            die("erreur de connexion,impossibilité de supprimer le jetons,vérifier votre connexion internet".$e->getMessage());
        }
    }
}
?>
