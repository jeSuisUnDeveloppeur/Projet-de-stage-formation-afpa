<?php
    $titlePage = "Connexion administrateur";
    
ob_start();
?>

<h1 class="fs-1 text-center berliana text-primary fw-bolder text-shadow mt-5">ADMINISTRATEUR</h1>
<div class="container">
    <div class="row justify-content-center">
        <form method="post" id="formConnexion" class=" shadow-lg  georgia fw-bolder text-primary bg-secondary p-5 rounded-4  col-12 col-md-10 col-lg-8 col-xl-7 h-500 mt-5 d-flex flex-column align-items-center justify-content-evenly">
            <div class="form-floating mb-3 col-12">
                <input type="text" class="form-control" id="user" placeholder = "Utilisateur" name = "user">
                <label for="user">Utilisateur</label>
            </div>
            <div class="form-floating col-12">
                <input type="password" class="form-control" id="password" placeholder="Password" name = "password">
                <label for="password">Mot de passe</label>
            </div>
            <button id="btnConnexion" type="submit" class="btn btn-primary">Connexion</button>
            <a href="/admin/mot-de-passe-oublie" id="forgotPassword" class="fs-6 fw-bolder link-primary">mot de passe oublié ?</a>
        </form>
    </div>
</div>


<?php
$content = ob_get_clean();
?>