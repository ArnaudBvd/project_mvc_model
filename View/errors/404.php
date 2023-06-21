<?php
include 'View/parts/header.php';
?>
<div class="container">
    <h1 class="text-center text-light">Oops ! Cette page n'existe pas</h1>
    <?php
    if ($_GET["scope"] == 'planet') {
        echo ('<h2 class="text-center text-light mt-4">Cette planète a probablement été supprimée</h2>');
    }
    if ($_GET["scope"] == 'starship') {
        echo ('<h2 class="text-center text-light mt-4">Ce vaisseau a probablement été supprimé</h2>');
    }
    ?>
    
    <div class="d-flex justify-content-center mt-5">
        <a onclick="window.history.back()">
            <button>Retour</button>
        </a>
    </div>

    <div class="my-4 d-flex justify-content-center">
        <img src="public/img/debris.jpg" alt="debris" class="rounded">
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</div>

<?php
include 'View/parts/footer.php';
?>