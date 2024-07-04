<?php
$titlePage = "modifier un compte";
ob_start();
?>

<div class="container vh-100">
    <h1 class="fs-1 text-center berliana text-primary fw-bolder text-shadow mt-5">MODIFIER UN COMPTE</h1>
    <div class="row justify-content-center mt-5 text-primary">
        <form method="post" class="shadow-lg  georgia fw-bolder  bg-secondary p-5 rounded-4  col-12 col-md-10 col-lg-8 col-xl-7 h-500 mt-5 d-flex flex-column align-items-center justify-content-evenly">
            <div class="col-12 bg-secondary p-2 lovelyn">
                <p><u><b>NOM UTILISATEUR ACTUEL :</b></u> <?= $_POST["oldUserName"] ?></p>
            </div>
            <div class="form-floating mb-3 col-12">
                <input type="text" class="form-control" id="NewName" placeholder="Utilisateur" value="<?= $_POST["oldUserName"] ?>" name="userName" autocomplete = off>
                <label for="NewName">Nouveau nom d'utilisateur</label>
            </div>
            <div class="form-floating col-12 mb-3">
                <input type="password" class="form-control" placeholder="mot de passe" id="NewPassword" value="<?=$_POST["oldUserPassword"]?>" name="userPassword" autocomplete = off>
                <label for="NewPassword">Nouveau mot de passe</label>
            </div>
            <div class="form-floating col-12">
                <input type="email" class="form-control" placeholder="email" id="NewUserEmail" value="<?= $_POST["oldUserEmail"] ?>" name="userEmail" autocomplete = off>
                <label for="NewUserEmail">Nouvelle Email</label>
            </div>
            <input type="hidden" name="id" value="<?= $_POST["id"] ?>">
            <input type="hidden" name="oldUserName" value="<?=$_POST["oldUserName"]?>" >
            <input type="hidden" name="oldUserPassword" value="<?=$_POST["oldUserPassword"]?>">
            <input type="hidden" name="oldUserEmail" value="<?=$_POST["oldUserEmail"]?>">
            <div class="altert alert-danger my-4"><?= $errorMessage ?></div>
            <button type="submit" class="btn btn-primary">MODIFIER L'UTILISATEUR</button>
        </form>
    </div>
</div>


<?php
$content = ob_get_clean();
?>