<?php
$titlePage = "modifier une offre";
ob_start();
?>
<div class="container vh-100">
    <h1 class="fs-1 text-center berliana text-primary fw-bolder text-shadow mt-5">MODIFIER UNE OFFRE</h1>
        <div class="row justify-content-center mt-5 text-primary">
            <form method="post" class="shadow-lg  georgia fw-bolder  bg-secondary p-5 rounded-4  col-12 col-md-10 col-lg-8 col-xl-7 h-500 mt-5 d-flex flex-column align-items-center justify-content-evenly">
                <div class="col-12 bg-secondary p-2 lovelyn">
                    <p><u><b>nom actuel de l'offre :</b></u> <?=$_POST["oldOfferName"]?></p>
                    <p><u><b>description actuelle de l'offre :</b></u> <?=$_POST["oldOfferDescription"]?></p>
                </div>
                <div class="form-floating mb-3 col-12">
                    <input type="text" class="form-control" id="NewOfferName" placeholder = "Utilisateur" value="<?=$_POST["oldOfferName"]?>" name = "offerName">
                    <label for="floatingInput">Nouveau nom d'offre</label>
                </div>
                <div class="form-floating col-12">
                    <textarea class="form-control" placeholder="" id="NewOfferDescription" style="height: 100px" name="offerDescription"><?=$_POST["oldOfferDescription"]?></textarea>
                    <label for="floatingTextarea2">Nouvelle description d'offre</label>
                </div>
                <input type="hidden" name="id" value="<?=$_POST["id"]?>">
                <input type="hidden" name="oldOfferName" value="<?=$_POST["oldOfferName"]?>">
                <input type="hidden" name="oldOfferDescription" value="<?=$_POST["oldOfferDescription"]?>">
                <div class="altert alert-danger my-4"><?=$errorMessage?></div>
                <button type="submit" class="btn btn-primary">MODIFIER L'OFFRE</button>
            </form>
        </div>
</div>

<?php
$content = ob_get_clean();
?>