<?php
include('View/parts/header.php');
?>

<div class="container mb-5">
    <h1 class="text-center text-light mb-4">Modifier le vaisseau <?php echo($starship->getName()) ?></h1>
    <div id="return-btn">
        <a href="index.php?controller=starship&action=list" class="text-decoration-none">Retour</a>
    </div>

    <div class="my-4 d-flex justify-content-center">
        <img src="public/img/hangar.jpg" alt="hangar de vaisseaux spatiaux" class="rounded" width="1180" height="445">
    </div>

    <form method="post" class="row mt-4">

        <div class="col-md-12 mb-3">
            <label for="name" class="form-label text-light">Nom :</label>
            <input type="text" name="name" value="<?php echo($starship->getName()) ?>" id="name" class="form-control
            <?php if (array_key_exists("name", $errors)) {
                echo ('is-invalid');
            } ?>">
            <div id="validateName" class="invalid-feedback">
                <?php if (array_key_exists("name", $errors)) {
                    echo ($errors['name']);
                } ?>
            </div>
        </div>

        <div class="col-md-12 mb-3">
            <label for="taille" class="form-label text-light">Taille :</label>
            <input type="number" step="0.01" name="taille" value="<?php echo($starship->getTaille()) ?>" id="taille" class="form-control
            <?php  if(array_key_exists("taille", $errors)){echo('is-invalid');} ?>"
                   value="<?php if(array_key_exists("taille", $_POST)){echo($_POST["taille"]);};?>">

            <div id="validateNom" class="invalid-feedback">
                <?php if(array_key_exists("taille", $errors)){echo($errors["taille"]);}?>
            </div>">
        </div>

        <div class="col-md-12 mb-3">
            <label for="fonction" class="form-label text-light">Fonction :</label>
            <textarea name="fonction" class="form-control" id="fonction"><?php echo($starship->getFonction());?></textarea>
        </div>

        <div class="col-md-12 mb-3">
            <label for="picture" class="form-label text-light">Photo :</label>
            <input type="text" name="picture" value="<?php echo($starship->getPicture())?>" id="picture" class="form-control
            <?php if (array_key_exists("picture", $errors)) {
                echo ('is-invalid');
            } ?>">
            <div class="invalid-feedback">
                <?php if (array_key_exists("picture", $errors)) {
                    echo ($errors['picture']);
                } ?>
            </div>
        </div>

        <div class="d-flex justify-content-center mt-2">
            <input type="submit" value="VALIDER" id="btn-validate">
        </div>
    </form>
</div>

<?php
include ('View/parts/footer.php');