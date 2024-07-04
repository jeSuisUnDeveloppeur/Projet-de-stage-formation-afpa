<?php
$titlePage = "Gestion des comptes administrateurs";
ob_start();
?>
<h1 class="fs-1 text-center berliana text-primary fw-bolder text-shadow my-5">GESTION DES COMPTES</h1>
<div class="container">
    <table class="bg-secondary berliana table table-dark table-striped">
        <thead class="table-primary">
            <tr class="lovelyn fw-bolder fs-5">
                <th class="col-sm-2 col-lg-4">NOM UTILISATEUR</th>
                <th class="col-sm-1 col-md-6 col-lg-4">EMAIL</th>
                <th class="col-sm-9 col-md-2 col-lg-4">ACTIONS</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td class="col-sm-2 col-md-1 col-lg-3"><?= $user["pseudo"] ?></td>
                    <td class="col-sm-1 col-md-2 col-lg-6"><?= $user["email"] ?></td>
                    <td class="d-flex flex-row justify-content-center col-sm-9 col-md-9 col-lg-4">
                        <!-- Formulaire pour supprimer -->
                        <form action="/back-office/supprimer-utilisateurs" method="post" class="d-inline">
                            <input type="hidden" name="id" value="<?= $user["id_utilisateur"] ?>">
                            <button type="submit" class="btn btn-primary mb-2" name="supprimer">SUPPRIMER</button>
                        </form>

                        <!-- Formulaire pour modifier -->
                        <form action="/back-office/modifier-utilisateurs" method="post" class="d-inline ms-2">
                            <input type="hidden" name="id" value="<?= $user["id_utilisateur"] ?>">
                            <input type="hidden" name="oldUserPassword" value="<?=$user["mot_de_passe"]?>">
                            <input type="hidden" name="oldUserName" value="<?=$user["pseudo"]?>">
                            <input type="hidden" name="oldUserEmail" value="<?=$user["email"]?>">
                            <button type="submit" class="btn btn-primary mb-2" name="modifier">MODIFIER</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td class="text-center" colspan="3">
                    <a class="btn btn-primary" href="/back-office/ajouter-utilisateurs">CREER UN COMPTE</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<?php
$content = ob_get_clean();
?>