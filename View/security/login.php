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
        <h1 class="text-center text-light my-5">Se connecter</h1>

        <div class="container d-flex flex-column justify-content-center">
            <!-- <div> -->
                <a class="mx-auto d-block" href="index.php?controller=default&action=home">
                    <button class="mt-5">Accueil</button>
                </a>
            <!-- </div> -->
            <!-- <div> -->
                <a class="mx-auto d-block" href="index.php?controller=security&action=register">
                    <button class="mt-5">Créer un compte</button>
                </a>
            <!-- </div> -->
        </div>


        <div class="my-4 d-flex justify-content-center">
            <img src="public/img/login.webp" alt="r2d2 se connecte à un terminal" class="rounded" width="1180" height="445">
        </div>


        <form method="post">

            <div class="col-md-12">
                <label for="username" class="text-light">Username :</label>
                <input type="text" id="username" value="<?php if (array_key_exists("username", $_POST)) {
                                                            echo ($_POST['username']);
                                                        } ?>" name="username" class="form-control
                <?php if (array_key_exists('username', $errors)) {
                    echo ('is-invalid');
                } ?>">

                <div class="invalid-feedback">
                    <?php if (array_key_exists("username", $errors)) {
                        echo ($errors['username']);
                    } ?>
                </div>
            </div>

            <div class="col-md-12 mt-3">
                <label for="password" class="text-light">Mot de passe :</label>
                <input type="password" id="password" name="password" class="form-control
                <?php if (array_key_exists('password', $errors)) {
                    echo ('is-invalid');
                } ?>">

                <div class="invalid-feedback">
                    <?php if (array_key_exists("password", $errors)) {
                        echo ($errors['password']);
                    } ?>
                </div>
            </div>

            <div class="d-flex justify-content-center mt-4">
                <input type="submit" value="VALIDER" id="btn-validate">
            </div>

        </form>
    </div>


    <?php
    include 'View/parts/footer.php';
    ?>