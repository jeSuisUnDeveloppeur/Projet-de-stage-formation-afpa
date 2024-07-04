<?php
    function sessionVerification(){
        session_start();
            // Vérifie si la clé de session "Mélabio" est définie
            if (!isset($_SESSION["Mélabio"]) || $_SESSION["Mélabio"] !== 'MélanieAdmin30200') {
            header('Location: /admin');
            exit(); 
            }  
}
?>