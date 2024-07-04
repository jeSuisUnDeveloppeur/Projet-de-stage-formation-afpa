<?php
$titlePage = "Contact";
ob_start();
?>
<div class="container ">
    <h1 class="fs-1 text-center berliana text-primary fw-bolder text-shadow mt-5">
        CONTACT
    </h1>
    <p class="georgia fs-6  text-justify lh-lg mt-md-5 text-primary">
        Bienvenue chez Mélabio
        Je suis ravie de vous accueillir dans mon espace dédié au bien-être et à la beauté. Chez Mélabio, je vous propose une expérience unique où vous pourrez vous détendre et prendre soin de vous.
        Vous trouverez ci-dessous les informations pour réserver et vous rendre à vôtre moment bien être.  
    </p>
    <h2 class=" fs-3 text-start berliana text-primary fw-bolder mt-5 ms-0">
        Contactez-moi :
    </h2>
    <div class="d-flex flex-column ms-md-7 ms-xl-5">
        <div class="col-12 mt-4 text-primary d-flex flex-row flex-wrap justify-content-center justify-content-xl-start">
            <p class="fs-5 col-6 col-sm-5 col-md-3 col-lg-2 w-xl-1 lovelyn  fw-bolder"><u>TÉLÉPHONE :</u></p>
            <p class="fs-6 col-6 col-sm-6 col-md-9 col-lg-10 georgia  fw-normal">06.99.80.56.66</p>
        </div>
        <div class="col-12 mt-4 text-primary d-flex flex-row justify-content-center align-items-end align-items-sm-start justify-content-xl-start">
            <p class="fs-5 col-4 col-sm-5 col-md-4 col-lg-3 w-xl-2 lovelyn  fw-bolder"><u>ADRESSE E-MAIL :</u></p>
            <p class="fs-6 col-8 col-sm-6 col-md-8 col-lg-9  georgia  fw-normal">grdmelanie09@gmail.com</p>
        </div>
    </div>
    <h2 class="text-start fs-3 berliana text-primary fw-bolder mt-5 ms-0">
        Horaires d'ouverture :
    </h2>
    <div class="row ms-md-6 ms-lg-6 ms-xl-5 text-xs-center">
        <p class="col-12 col-md-12  col-lg-9 col-xl-12 fs-5 mt-4 georgia text-primary">Sur rendez-vous , 7 jours sur 7 de 08h00 à 19h00</p>
    </div>
    <h2 class="text-start fs-3 berliana text-primary fw-bolder mt-5 ms-0">
        Où me trouver :
    </h2>
    <div class="row mb-5 ms-md-6 ms-xl-5 text-xs-center">
        <p class="col-xs-12 col-md-12 col-lg-7 col-xl-6 fs-5 text-justify mt-4 georgia text-primary">
            Mon salon est situé au :  <br/><b>76 rue des chartreux <br/>84420 Piolenc (A 100m du parking des moutons). <br/></b>N'hésitez pas à me contacter si vous avez besoin d'indications pour m'y rejoindre.
        </p>
    </div>
    <!--div pour l'intégration de la google map-->
    <div id="map">

    </div>
    <h2 class="text-start fs-3 berliana text-primary fw-bolder mt-5 ms-0 ">
        Réserver votre moment de bien - être
    </h2>
    <div class="row ms-md-6 ms-xl-5">
        <p class="col-12 fs-5 text-justify mt-4 georgia text-primary">
        Que vous souhaitiez bénéficier d'un massage relaxant, d'un soin esthétique ou d'une séance de beauté, je suis là pour vous offrir des prestations de qualité adaptées à vos besoins.
        </p>
    </div> 
    <h2 class="text-start fs-3 berliana text-primary fw-bolder mt-5 ms-0">
        Prenez le temps de vous accorder une pause et confiez votre bien-être entre mes mains expertes.
    </h2>
    <div class="row ms-md-6 ms-xl-5">
        <p class="col-12 fs-5 text-justify mt-4 georgia text-primary">
            Contactez-moi dès aujourd'hui pour réserver votre rendez-vous et laissez-vous chouchouter chez Mélabio.
        </p>
    </div>
</div>            
<?php
$content = ob_get_clean();
?>