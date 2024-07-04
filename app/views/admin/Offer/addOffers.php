<?php
$titlePage = "Ajouter une offre";
ob_start();
?>
<div class="container vh-100">
    <h1 class="fs-1 text-center berliana text-primary fw-bolder text-shadow mt-5">AJOUTER UNE OFFRE DANS LA BASE DE DONNEES</h1>
    <div class="row justify-content-center">
        <form method="post" class=" shadow-lg  georgia fw-bolder text-primary bg-secondary p-5 rounded-4  col-12 col-md-10 col-lg-8 col-xl-7 h-500 mt-5 d-flex flex-column align-items-center justify-content-evenly">
            <div class="form-floating mb-3 col-12">
                <input type="text" class="form-control" id="floatingInput" placeholder = "Utilisateur" name = "offerName">
                <label for="floatingInput">Nom de l'offre</label>
            </div>
            <div class="form-floating col-12">
                <textarea class="form-control" placeholder="" id="floatingTextarea2" style="height: 100px" name="offerDescription"></textarea>
                <label for="floatingTextarea2">Description de l'offre</label>
            </div>
            <div class="altert alert-danger"><?=$errorMessage?></div>
            <button type="submit" class="btn btn-primary">AJOUTER L'OFFRE</button>
    </div>
</div>


<?php
$content = ob_get_clean();
?>