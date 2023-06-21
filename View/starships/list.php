<?php
include('View/parts/header.php');
?>

<div class="container mb-5">
    <h1 class="text-center text-light mb-4">Les vaisseaux !</h1>
    <div id="return-btn">
        <a href="index.php?controller=default&action=home" class="text-decoration-none">Retour</a>
    </div>

    <a href="index.php?controller=starship&action=ajout">
        <button class="mt-5">Ajouter un vaisseau</button>
    </a>

    <table class="table mt-5">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nom</th>
                <th scope="col">Taille</th>
                <th scope="col">Fonction</th>
                <th scope="col">Picture</th>
                <th scope="col">Détail</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($starships as $starship) : ?>
                <tr>
                    <th scope="row"><?php echo ($starship->getId()) ?></th>
                    <td><?php echo ($starship->getName()) ?></td>
                    <td><?php echo ($starship->getTaille()) ?> m</td>
                    <td><?php echo ($starship->getFonction()) ?></td>
                    <td><img src="<?php echo ($starship->getPicture()) ?>" alt="un vaisseau spatiale" width="150" height="100" class="rounded"></td>
                    <td><a href="index.php?controller=starship&action=detail&id=<?php echo($starship->getId()) ?>"><img src="public/img/detailstarship.jpg" alt="image de vaisseau" width="100" height="100" class="rounded"></a></td>
                <?php endforeach; ?>
                </tr>
        </tbody>
    </table>
</div>

<?php
include ('View/parts/footer.php');