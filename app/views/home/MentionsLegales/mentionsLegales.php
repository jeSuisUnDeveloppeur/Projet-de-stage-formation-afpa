<?php
$titlePage = "Mentions Légales";
ob_start();
?>

<div class="container">
        <h1 class="text-center fs-1 berliana text-primary fw-bolder text-shadow mt-5">MENTIONS LÉGALES</h1>
        <h2 class="fs-3 text-md-left berliana text-primary fw-bolder text-shadow mt-7">EDITEUR DU SITE</h2>
        
            <p class="georgia fs-6  lh-lg mt-md-5 ms-md-5 text-primary">
                <b>Raison sociale :</b> Mélabio<br/>

                <b>Forme juridique :</b> micro entreprise<br/>

                <b>Adresse du siège social :</b> 76 rue des chartreux  84420 Piolenc<br/> 

                <b>Numéro de téléphone :</b> 06.99.80.56.66<br/>

                <b>E-mail :</b> grdmelanie09@gmail.com <br/>
                
                <b>Numéro d'immatriculation (RCS) :</b> 902079011
            </p>
        
        <h2 class="fs-3 text-left berliana text-primary fw-bolder text-shadow mt-7 ">HEBERGEUR DU SITE </h2>
        <p class="georgia fs-6 lh-lg ms-md-5 mt-md-5 text-primary ">
            <b>Raison sociale :</b> [Nom de l'hébergeur]<br/>
            <b>Adresse du siège social :</b> [Adresse complète de l'hébergeur]<br/>
            <b>Numéro de téléphone :</b> [Numéro de téléphone de l'hébergeur]<br/>
        </p>
        <h2 class="fs-3 text-left berliana text-primary fw-bolder text-shadow mt-7">PROPIETE INTELLECTUELLE</h2>
        <p class="georgia fs-6 lh-lg mt-md-5 ms-md-5 text-primary">
            Le contenu de ce site web (textes, images, vidéos, etc.) est la propriété de Mélabio ou de ses fournisseurs et est protégé par les lois françaises et   internationales sur la propriété intellectuelle. Toute reproduction, distribution, modification ou utilisation de ce contenu sans autorisation écrite préalable de Mélabio est strictement interdite.
        </p>
        <h2 class="fs-3 text-left berliana text-primary fw-bolder text-shadow mt-7">LIENS EXTERNES</h2>
        <p class="georgia fs-6 lh-lg mt-md-5 ms-md-5 text-primary ">
            Notre site peut contenir des liens vers des sites externes dont nous ne sommes pas responsables du contenu. Nous ne pouvons garantir l'exactitude, l'actualité ou la pertinence de ces contenus externes.
        </p>
        <h2 class="fs-3 text-left berliana text-primary fw-bolder text-shadow mt-7">RESPONSABILITES</h2>
        <p class="georgia fs-6 lh-lg mt-md-5 ms-md-5 text-primary">
            Les informations fournies sur ce site sont à titre informatif seulement. Mélabio ne peut être tenu responsable de toute erreur ou omission dans les informations fournies sur ce site. En outre, Mélabio décline toute responsabilité quant à l'utilisation qui pourrait être faite du contenu de ce site.
        </p>
        <h2 class="fs-3 text-left berliana text-primary fw-bolder text-shadow mt-7">DROIT APPLICABLE ET JURIDICTION COMPETENTES</h2>
        <p class="georgia fs-6 lh-lg mt-md-5 ms-md-5 text-primary ">  
                Les présentes mentions légales sont régies par le droit français. Tout litige relatif à l'utilisation de ce site web sera de la compétence exclusive des    tribunaux français.
        </p>
        <h2 class="fs-3 text-left berliana text-primary fw-bolder text-shadow mt-7">MODIFICATION DES MENTIONS LÉGALES</h2>
        <p class="georgia fs-6 lh-lg mt-md-5 ms-md-5 text-primary ">
                Mélabio se réserve le droit de modifier à tout moment et sans préavis les présentes mentions légales afin de les adapter aux évolutions du site et/ou de son exploitation. Les utilisateurs du site sont invités à consulter régulièrement les mentions légales.
        </p>
</div>

<?php
$content = ob_get_clean();
?>