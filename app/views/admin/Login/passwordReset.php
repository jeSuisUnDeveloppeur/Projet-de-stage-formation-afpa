<?php
    $titlePage = "réinitialisation de mot de passe";
    
ob_start();
?>

<h1 class="fs-1 text-center berliana text-primary fw-bolder text-shadow mt-5">FORMULAIRE DE CHANGEMENT DE MOT DE PASSE</h1>   
<div class="container">
        <form method="post" id="passwordResetForm" class=" shadow-lg  georgia fw-bolder text-primary bg-secondary p-5 rounded-4  col-12 col-md-10 col-lg-8 col-xl-7 h-500 mt-5 d-flex flex-column align-items-center justify-content-center m-auto">  
            <div class= "form-floating col-12">
                <input type= "password" class="form-control" id="newPassword" placeholder = "password" name = "newPassword">
                <input type="hidden" name = "token" value="<?=$_GET["token"]?>">
                <label for= "newPassword">Nouveau mot de passe</label>
            </div>
            <div id="errorMessage"><?=$errorMessage?></div>
            <button id="btnConnexion" type="submit" class="btn btn-primary mt-5">Valider</button>
        </form>
</div>


<?php
$content = ob_get_clean();
?>