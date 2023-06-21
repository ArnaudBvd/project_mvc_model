<?php
include 'View/parts/header.php';
?>

<div class="container mt-4 mb-5">
    <h1 class="text-center text-light">Le vaisseau <?php echo ($starship->getName()) ?></h1>

    <div id="return-btn">
        <a href="index.php?controller=starship&action=list" class="text-decoration-none">Retour</a>
    </div>

    <div class="d-flex justify-content-center mt-5">
        <img src="<?php echo ($starship->getPicture()) ?>" alt="" width="500" height="400" class="img-fluid">
    </div>

    <div class="d-flex justify-content-center flex-column mt-3">
    <p class="text-light">Taille : <?php echo($starship->getTaille()) ?> m</p>
    <br>
    <p class="text-light">Fonction : <?php echo($starship->getFonction()) ?></p>

    </div>
</div>

<?php
include ('View/parts/footer.php');