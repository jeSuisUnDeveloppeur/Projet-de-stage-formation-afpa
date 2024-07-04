<?php
class AdminController {

    // Constantes pour les messages d'erreurs
    const ERROR_EMPTY_FIELDS = "Veuillez remplir les deux champs, utilisateur et mot de passe.";
    const ERROR_INVALID_CREDENTIALS = "Nom d'utilisateur ou mot de passe incorrect.";
    const ERROR_INVALID_EMAIL = "format d'email invalide";
    const ERROR_NO_ACCOUNT_FOUND = "Aucun compte n'est associé à cette adresse email";
    const ERROR_ALREADY_EXIST = "Cet email est déjà associé à un compte";
    const ERROR_SEND_MAIL  = "une erreur est survenue envoie de l'email impossible, vérifier vôtre connexion";
    const MAIL_SEND = "email de réinitialisation de mot de passe envoyé avec succès";
    const ERROR_EMPTY_PASSWORD = "Pour la sécurité de votre compte le champs du mot de passe ne doit pas être vide";
    const PASSWORD_SUCCESS_CHANGED = "votre nouveau mot de passe à été mis à jour !";

    // Méthode pour traiter la soumission du formulaire de connexion
    public static function authenticate() {
            if(isset($_POST["user"], $_POST["password"])) {
                $user = $_POST["user"];
                $password = $_POST["password"];
                // Validation des données
                if(empty($user) || empty($password)) {
                    echo "<div id='errorMessage' class='altert alert-danger'>".self::ERROR_EMPTY_FIELDS."</div>";
                    exit();
                }
                // Nettoyage des entrées utilisateur
                $user = self::sanitize($user);
                $password = self::sanitize($password);
                // Vérification des identifiants
                if(UserModel::verifyCredentials($user, $password)) {
                    $_SESSION["Mélabio"] = 'MélanieAdmin30200';
                    header('Location:/back-office');
                    exit();
                } else {
                    echo "<div id='errorMessage' class='altert alert-danger'>".self::ERROR_INVALID_CREDENTIALS."</div>";
                    exit();
                }
            }
            else{
           // Inclure le contenu de la page "admin"
        require_once VIEW_ROOT . '/admin/Login/login.php';
        require_once VIEW_ROOT . '/admin/Login/loginLayout.php'; 
        }
    }

    //Méthode pour nettoyer les entrées des input 
    public static function sanitize($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        $data = substr($data,0,200);
        return $data;
    }

    //Méthode pour valider la confirmitée d'une adressse mail
    public static function validateEmail($email){
        //création d'une regex pour email
        $regex = "/^[a-zA-Z0-9._%+\-\*\!\^\$\#\~\&]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
        //vérification de l'email et retourne vrai ou faux si l'email correspond ou non la regex
        return (preg_match($regex,$email));
    }
    
    //méthode pour afficher les comptes utilisateurs
    public static function getUser(){
        $users = UserModel::readUser();
        require_once VIEW_ROOT.'/admin/User/manageUsers.php';
        require_once VIEW_ROOT.'/admin/Dashboard/dashboardLayout.php';
    }

    // Méthode pour supprimer un utilisateur
    public static function deleteUser() {
        if(isset($_POST["id"])){
                $idUser = $_POST["id"];
                $idUser = intval($_POST["id"]);
                UserModel::deleteUser($idUser);
                self::getUser(); 
        }
    }

    //méthode pour ajouter un utilisateur
    public static function addUser(){
        if(isset($_POST["userName"],$_POST["userPassword"],$_POST["userEmail"])){
            $userName = $_POST["userName"];
            $userPassword = $_POST["userPassword"];
            $userEmail = $_POST["userEmail"];
            if(!empty($userName) && !empty($userPassword) && !empty($userEmail)){
                $userName = self::sanitize($userName);
                $userPassword = self::sanitize($userPassword);
                $userPassword = password_hash($userPassword,PASSWORD_DEFAULT);
                if(self::validateEmail($userEmail)){
                    $userEmail = self::sanitize($userEmail);
                    if(UserModel::emailExists($userEmail)){
                        $errorMessage = self::ERROR_ALREADY_EXIST;
                        require_once VIEW_ROOT.'/admin/User/addUsers.php';
                        require_once VIEW_ROOT.'/admin/Dashboard/dashboardLayout.php';
                    }
                    else{
                        UserModel::addUser($userName,$userPassword,$userEmail);
                        self::getUser();
                    }  
                }
                else{
                    $errorMessage = self::ERROR_INVALID_EMAIL;
                    require_once VIEW_ROOT.'/admin/User/addUsers.php';
                    require_once VIEW_ROOT.'/admin/Dashboard/dashboardLayout.php';
                }
            }
            else{
                $errorMessage = self::ERROR_EMPTY_FIELDS;
                require_once VIEW_ROOT.'/admin/User/addUsers.php';
                require_once VIEW_ROOT.'/admin/Dashboard/dashboardLayout.php';
            }
        }
        else{
                $errorMessage = "";
                require_once VIEW_ROOT.'/admin/User/addUsers.php';
                require_once VIEW_ROOT.'/admin/Dashboard/dashboardLayout.php';
        }
    }

    //méthode pour modifier un utilisateur
    public static function modifyUser(){
        if(isset($_POST["userName"],$_POST["userPassword"],$_POST["userEmail"])){
            $userName = $_POST["userName"];
            $userPassword = $_POST["userPassword"];
            $userOldPassword = $_POST["oldUserPassword"];
            $userEmail = $_POST["userEmail"];
            $id = $_POST["id"];
            if(!empty($userName) && !empty($userPassword) && !empty($userEmail)){
                $userName = self::sanitize($userName);
                $userPassword = self::sanitize($userPassword);
                if(self::validateEmail($userEmail)){
                    $userEmail = self::sanitize($userEmail);
                    if($userPassword === $userOldPassword){
                        UserModel::updateUsers($id,$userName,$userPassword,$userEmail);
                        self::getUser();
                    }
                    else{
                        $userPassword = password_hash($userPassword,PASSWORD_DEFAULT);
                        UserModel::updateUsers($id,$userName,$userPassword,$userEmail);
                        self::getUser();
                    }
                }
                else{
                    $errorMessage = self::ERROR_INVALID_EMAIL;
                    require_once VIEW_ROOT.'/admin/User/modifyUsers.php';
                    require_once VIEW_ROOT.'/admin/Dashboard/dashboardLayout.php';
                    exit();
                }
            }
            else{
                $errorMessage = self::ERROR_EMPTY_FIELDS;
                require_once VIEW_ROOT.'/admin/User/modifyUsers.php';
                require_once VIEW_ROOT.'/admin/Dashboard/dashboardLayout.php';
                exit();
            }
        }
        else{
            $errorMessage ='';
            require_once VIEW_ROOT.'/admin/User/modifyUsers.php';
            require_once VIEW_ROOT.'/admin/Dashboard/dashboardLayout.php';
        }
    }

    public static function forgotPassword(){
        if(isset($_POST["email"]) && !empty($_POST["email"])){
            $email = $_POST["email"];
            if(self::validateEmail($email)){
                $email = self::sanitize($email);
                if(UserModel::emailExists($email)){
                    $token = uniqid();
                    $url = BASE_URL."/admin/reinitialisation-mot-de-passe?token=$token";
                    $mailHeaders = "Content-type: text/plain; charset='utf-8'"." ";
                    $subject = "Mot de passe oublié Mélabio";
                    $mailMessage = "Bonjour, voici votre lien pour la réinitialisation de votre mot de passe : $url , \n si vous n'êtes pas l'auteur de cette demande, veuillez ne pas tenir compte de cet email";
                    if(mail($email,$subject,$mailMessage,$mailHeaders)){
                        UserModel::updateToken($token,$email);
                        $errorMessage = self::MAIL_SEND;
                        require_once VIEW_ROOT.'/admin/Login/forgotPassword.php';
                        require_once VIEW_ROOT.'/admin/Login/loginLayout.php';
                    }
                    else{
                        $errorMessage = self::ERROR_SEND_MAIL;
                        require_once VIEW_ROOT.'/admin/Login/forgotPassword.php';
                        require_once VIEW_ROOT.'/admin/Login/loginLayout.php';
                    }
                }
                else{
                    $errorMessage = self::ERROR_NO_ACCOUNT_FOUND;
                    require_once VIEW_ROOT.'/admin/Login/forgotPassword.php';
                    require_once VIEW_ROOT.'/admin/Login/loginLayout.php';
                }
            }
            else{
                $errorMessage = self::ERROR_INVALID_EMAIL;
                require_once VIEW_ROOT.'/admin/Login/forgotPassword.php';
                require_once VIEW_ROOT.'/admin/Login/loginLayout.php';
            }
        }
        else{
            $errorMessage='';
            require_once VIEW_ROOT.'/admin/Login/forgotPassword.php';
            require_once VIEW_ROOT.'/admin/Login/loginLayout.php';
        }
    }
    
    public static function resetPassword(){
        if(isset($_POST["newPassword"])){
            $token = $_POST["token"];
            if(UserModel::tokenExist($token)){
                    $newPassword = $_POST["newPassword"];
                    if(!empty($newPassword)){
                        $newPassword = self::sanitize($newPassword);
                        $newPassword = password_hash($newPassword,PASSWORD_DEFAULT);
                        UserModel::updatePassword($token,$newPassword);
                        $errorMessage = self::PASSWORD_SUCCESS_CHANGED;
                        $_GET['token'] = $token;
                        require_once VIEW_ROOT.'/admin/Login/passwordReset.php';
                        require_once VIEW_ROOT.'/admin/Login/loginLayout.php';
                        exit();
                    }
                    else{
                        $_GET['token'] = $token;
                        $errorMessage = self::ERROR_EMPTY_PASSWORD;
                        require_once VIEW_ROOT.'/admin/Login/passwordReset.php';
                        require_once VIEW_ROOT.'/admin/Login/loginLayout.php';
                    }
            }           
            else{
                header('location:/accueil');
                exit();
            }
        }
        else{
            $errorMessage ='';
            require_once VIEW_ROOT.'/admin/Login/passwordReset.php';
            require_once VIEW_ROOT.'/admin/Login/loginLayout.php';
        }
    }
}

?>
