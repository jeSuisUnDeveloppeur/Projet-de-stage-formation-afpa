<?php
$titlePage = "Ajouter un compte administrateur";
ob_start();
?>
<div class="container vh-100">
    <h1 class="fs-1 text-center berliana text-primary fw-bolder text-shadow mt-5">CREATION COMPTE ADMINISTRATEUR</h1>
    <div class="row justify-content-center">
        <form method="post" class=" shadow-lg  georgia fw-bolder text-primary bg-secondary p-5 rounded-4  col-12 col-md-10 col-lg-8 col-xl-7 h-500 mt-5 d-flex flex-column align-items-center justify-content-evenly">
            <div class="form-floating mb-2 col-12">
                <input type="text" class="form-control" id="floatingInput" placeholder = "" name = "userName">
                <label for="floatingInput">Nom utilisateur</label>
            </div>
            <div class="form-floating mb-2 col-12">
                <input type="password" class="form-control" placeholder="" id="floatingTextarea2" name="userPassword"></input>
                <label for="floatingTextarea2">Mot de passe</label>
            </div>
            <div class="form-floating mb-2 col-12">
                <input type="email" class="form-control" placeholder="" id="floatingTextarea2" name="userEmail"></input>
                <label for="floatingTextarea2">Email</label>
            </div>
            <div class="altert alert-danger"><?=$errorMessage?></div>
            <button type="submit" class="btn btn-primary">VALIDER</button>
    </div>
</div>

<?php
$content = ob_get_clean();
?>