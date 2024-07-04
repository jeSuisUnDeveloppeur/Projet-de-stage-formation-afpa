<?php
require_once CONFIG_ROOT.'/config.php';
    class Database{
        //Informations de connexion à la base de données
        private $dsn = 'mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8mb4'; //data source name de l'hebergeur
        private $username = DB_USER; //nom d'utilisateur de la base de données
        private $password = DB_PASS; //mot de passe de la base de données
        private $connexion; //propriété qui stock la connexion ou la déconnexion
        //Options de connexion PDO
        private $options = [
            PDO::ATTR_ERRMODE =>PDO::ERRMODE_EXCEPTION, //Gérer les erreurs avec des exceptions
            PDO::ATTR_EMULATE_PREPARES=>false, // Désactiver la simulation des requêtes préparées pour plus de sécurité et une meilleure compatibilité
        ];
        
        public function __construct()
        {
            //Connexion à la base de donnée avec PDO
            try{
                $this->connexion = new PDO($this->dsn,$this->username,$this->password,$this->options);
            }catch(PDOException $e){
                die("Echec de la connexion à la base de données : ".$e->getMessage());
            }
        }

        public function getConnexion(){
            return $this->connexion;
        }
    }   
?>