<?php
$titlePage = "Gestion des offres";
$success = false;
$display = 'none';
if(isset($_POST["success"]) && $_POST["success"] === true){
    $success = true;
    $display = 'block';
}
ob_start();
?>

<div class="container">
    <h1 class="fs-1 text-center berliana text-primary fw-bolder text-shadow my-5">GESTION DES OFFRES</h1>
    <p class="text-secondary bg-primary rounded-2 p-2 col-9 col-md-4 col-lg-3" style="display:<?=$display?>";><?=$success ?"publication ajouter avec succès ! ":""?></p>
    <table class="bg-secondary berliana w-100 table table-dark table-striped">
        <thead class="table-primary">
            <tr class="lovelyn fw-bolder fs-5">
                <th>NOM DE L'OFFRE</th>
                <th>DESCRIPTION DE L'OFFRE</th>
                <th>ACTIONS</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php foreach ($offres as $offre) : ?>
                <tr>
                    <td><?= $offre["nom_offre"] ?></td>
                    <td><?= $offre["description_offre"] ?></td>
                    <td>
                        <!-- Formulaire pour supprimer -->
                        <form action="/back-office/supprimer-offres" method="post" class="d-inline">
                            <input type="hidden" name="id" value="<?= $offre["id_offre"] ?>">
                            <button type="submit" class="btn btn-primary mb-2" name="supprimer">SUPPRIMER</button>
                        </form>

                        <!-- Formulaire pour modifier -->
                        <form action="/back-office/modifier-offres" method="post" class="d-inline">
                            <input type="hidden" name="id" value="<?= $offre["id_offre"] ?>">
                            <input type="hidden" name="oldOfferName" value="<?=$offre["nom_offre"]?>">
                            <input type="hidden" name="oldOfferDescription" value="<?=$offre["description_offre"]?>">
                            <button type="submit" class="btn btn-primary mb-2" name="modifier">MODIFIER</button>
                        </form>
                        <form action="/back-office/publier-offre" method="post" class="d-inline">
                            <input type="hidden" name="id" value="<?=$offre["id_offre"]?>">
                            <button type="submit" class="btn btn-primary">PUBLIER L'OFFRE SUR LE SITE</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td class="text-center" colspan="3">
                    <a class="btn btn-primary" href="/back-office/ajouter-offres">AJOUTER UNE OFFRE</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<?php
$content = ob_get_clean();
?>
