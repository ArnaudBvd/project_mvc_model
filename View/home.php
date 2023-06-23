<?php
include('View/parts/header.php');
?>

<div class="container">
    <h1 class="text-center text-light mb-5">Welcome in StarWars App !</h1>

    <div class="my-4 d-flex justify-content-center">
        <img src="public/img/duel.jpg" alt="deux sabres lasers se croisent" class="rounded" width="860" height="440">
    </div>

    <div class="row">
        <div class="col-3"></div>
        <!-- Ce lien renvoie vers notre router avec le controller = planet et
        le paramètre action = list -->
        <div class="col-3  d-flex justify-content-center my-5">
            <a href="index.php?controller=planet&action=list" class="text-decoration-none text-center">
                <button>Voir les planètes</button>
            </a>
        </div>
        <br>

        <!-- Ce lien renvoie vers notre router avec le controller = starship et
        le paramètre action = list -->
        <div class="col-3  d-flex justify-content-center my-5">
            <a href="index.php?controller=starship&action=list" class="text-decoration-none text-center">
                <button>Voir les vaisseaux</button>
            </a>
        </div>
        <div class="col-3"></div>

    </div>
</div>

<?php
include('View/parts/footer.php');
