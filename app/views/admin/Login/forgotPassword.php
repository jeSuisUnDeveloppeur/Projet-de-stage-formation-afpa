<?php
    $titlePage = "Mot de passe Oublié";
    
ob_start();
?>

<h1 class="fs-1 text-center berliana text-primary fw-bolder text-shadow mt-5">MOT DE PASSE OUBLIÉ ?</h1>   
<div class="container">
    <div class="row justify-content-center">
        
        <form method="post" class=" shadow-lg  georgia fw-bolder text-primary bg-secondary p-5 rounded-4  col-12 col-md-10 col-lg-8 col-xl-7 h-500 mt-5 d-flex flex-column align-items-center justify-content-evenly">
                <p>Entrez l'adresser email associée à votre compte</p>   
                <div class= "form-floating col-12">
                <input type= "email" class="form-control" id="sendToEmail" placeholder = "Email" name = "email" autocomplete="on">
                <label for= "sendToEmail">Email</label>
            </div>
            <div><?=$errorMessage?></div>
            <button id="btnConnexion" type="submit" class="btn btn-primary">Envoyer</button>
            <a href="/admin" class="btn btn-primary ">retourner à l'interface de connexion</a>
        </form>
    </div>
</div>


<?php
$content = ob_get_clean();
?>