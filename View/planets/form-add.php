<?php
include('View/parts/header.php');
?>

<div class="container mb-5">
    <h1 class="text-center text-light mb-4">Ajouter une planète !!</h1>
    <div id="return-btn">
        <a href="index.php?controller=planet&action=list" class="text-decoration-none">Retour</a>
    </div>

    <div class="my-4 d-flex justify-content-center">
        <img src="public/img/panorama.webp" alt="r2d2 projecte un hologramme" class="rounded" width="1180" height="445">
    </div>

    <form method="post" class="row mt-4">

        <div class="col-md-12 mb-3">
            <label for="name" class="form-label text-light">Nom :</label>
            <input type="text"
            value="<?php if(array_key_exists('name', $_POST)){echo($_POST['name']);} ?>"
             name="name" id="name" class="form-control
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
            <label for="description" class="form-label text-light">Description :</label>
            <textarea name="description" class="form-control" id="description"></textarea>
        </div>

        <div class="col-md-12 mb-3">
            <label for="terrain" class="form-label text-light">Terrain :</label>
            <select name="terrain" id="terrain" class="form-select
            <?php if (array_key_exists("terrain", $errors)) {
                echo ('is-invalid');
            } ?>">
                <option value=" ">Pas d'info</option>

                <?php foreach (PlanetController::$allowedTerrain as $terrain) {
                    $selected = '';
                    if(array_key_exists("terrain", $_POST) && $_POST["terrain"] == $terrain){
                        $selected = 'selected';
                    }
                    echo('<option' .$selected.' value="' .$terrain. '">'.$terrain.'</option>');
                    }?>
                    
            </select>
            <div class="invalid-feedback">
                <?php if (array_key_exists("terrain", $errors)) {
                    echo ($errors['terrain']);
                } ?>
            </div>
        </div>

        <div class="col-md-12 mb-3">
            <label for="picture" class="form-label text-light">Photo :</label>
            <input type="text" name="picture" id="picture" class="form-control
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