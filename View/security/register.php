<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un compte</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="public/css/style.css" />
</head>

<body>

    <div class="container">
        <h1 class="text-center text-light my-5">Créer un compte</h1>

        <div id="return-btn">
            <a href="index.php?controller=security&action=login" class="text-decoration-none">Retour</a>
        </div>

        <div class="my-4 d-flex justify-content-center">
            <img src="public/img/register.jpg" alt="salle de contrôle" class="rounded" width="1180" height="445">
        </div>

        <form method="post">

            <div class="col-md-12">
                <label for="username" class="text-light">Username :</label>
                <input type="text" id="username"
                value="<?php if(array_key_exists("username", $_POST)){echo($_POST['username']);} ?>"
                 name="username" class="form-control
                <?php if(array_key_exists('username', $errors)){echo('is-invalid');}?>">

                <div class="invalid-feedback">
                <?php if (array_key_exists("username", $errors)) {
                    echo ($errors['username']);
                } ?>
                </div>
            </div>

            <div class="col-md-12">
                <label for="nom" class="text-light">Nom :</label>
                <input type="text" id="nom"
                value="<?php if(array_key_exists("nom", $_POST)){echo($_POST['nom']);} ?>"
                 name="nom" class="form-control
                 <?php if(array_key_exists('nom', $errors)){echo('is-invalid');}?>">

                <div class="invalid-feedback">
                    <?php if (array_key_exists("nom", $errors)) {
                    echo ($errors['nom']);
                    } ?>
                </div>
            </div>

            <div class="col-md-12">
                <label for="prenom" class="text-light">Prénom :</label>
                <input type="text" id="nom"
                value="<?php if(array_key_exists("nom", $_POST)){echo($_POST['prenom']);} ?>"
                 name="prenom" class="form-control
                 <?php if(array_key_exists('prenom', $errors)){echo('is-invalid');}?>">

                <div class="invalid-feedback">
                    <?php if (array_key_exists("prenom", $errors)) {
                    echo ($errors['prenom']);
                    } ?>
                </div>
            </div>

            <div class="col-md-12 mt-3">
                <label for="password" class="text-light">Mot de passe :</label>
                <input type="password" id="password" name="password" class="form-control
                <?php if(array_key_exists('password', $errors)){echo('is-invalid');}?>">

                <div class="invalid-feedback">
                    <?php if (array_key_exists("password", $errors)) {
                    echo ($errors['password']);
                    } ?>
                </div>
            </div>

            <div class="col-md-12">
                <label for="password2" class="text-light"> Confirmer le mot de passe :</label>
                <input type="password" id="password2" name="password2" class="form-control
                <?php if(array_key_exists('password2', $errors)){echo('is-invalid');}?>">

                <div class="invalid-feedback">
                    <?php if (array_key_exists("password2", $errors)) {
                    echo ($errors['password2']);
                    } ?>
                </div">
            </div>

            <div class="d-flex justify-content-center mt-4">
                <input type="submit" value="VALIDER" id="btn-validate">
            </div>

        </form>
        <?php
include 'View/parts/footer.php';
?>
    </div>

</body>
</html>
