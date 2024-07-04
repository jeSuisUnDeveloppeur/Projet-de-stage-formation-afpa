<?php 
$titlePage ='Accueil';
ob_start();
?>
        <div class="container h-100">
                <div class="row justify-content-between align-items-end h-100">
                        <div>
                                <h1 class="m-auto w-mc bg-secondary bg-opacity-75 p-3 rounded-4 title-accueil fs-2 text-center berliana text-primary text-shadow fw-bolder mt-5">MODELAGES</h1>
                        </div>
                        <p class="text-accueil fs-6 georgia text-primary bg-secondary rounded-4 col-12 col-md-8 col-lg-5 p-4 mt-5 mt-md-10"></p>
                        <button id="accueil-suivant" class=" lovelyn button-accueil text-center ms-65">></button>
                </div>
        </div>
    
<?php 
$content = ob_get_clean();
?>


