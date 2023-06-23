<?php
include 'View/parts/header.php';
?>

<div class="container mb-5">
    <h1 class="text-center text-light">La planète <?php echo ($planet->getName()) ?></h1>

    <div id="return-btn">
        <a href="index.php?controller=planet&action=list" class="text-decoration-none">Retour</a>
    </div>

    <div class="d-flex justify-content-center mt-5">
        <img src="<?php echo ($planet->getPicture()) ?>" alt="" width="400" height="400">
    </div>

    <div class="d-flex justify-content-center flex-column mt-3">
    <p class="text-light">Terrain : <?php echo($planet->getTerrain()) ?></p>
    <br>
    <p class="text-light">Description : <?php echo($planet->getDescription()) ?></p>

    </div>
</div>

<?php
include ('View/parts/footer.php');
?>