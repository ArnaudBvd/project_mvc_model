<?php
include('View/parts/header.php');
?>

<div class="container mb-4">
    <h1 class="text-center text-light mb-4">Les planètes !</h1>
    <div id="return-btn">
        <a href="index.php?controller=default&action=home" class="text-decoration-none">Retour</a>
    </div>

    <a href="index.php?controller=planet&action=ajout">
        <button class="mt-5">Ajouter une planète</button>
    </a>

    <table class="table mt-5">
        <thead class="bg-info">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nom</th>
                <th scope="col">Description</th>
                <th scope="col">Terrain</th>
                <th scope="col" class="text-center">Picture</th>
                <th scope="col" class="text-center">Détail</th>
                <th scope="col" class="text-center">Modifier</th>
                <th scope="col" class="text-center">Supprimer</th>                
            </tr>
        </thead>
        <tbody>
            <?php foreach ($planets as $planet) : ?>
                <tr>
                    <th scope="row"><?php echo ($planet->getId()) ?></th>
                    <td><?php echo ($planet->getName()) ?></td>
                    <td><?php echo ($planet->getDescription()) ?></td>
                    <td><?php echo ($planet->getTerrain()) ?></td>
                    <td><img src="<?php echo ($planet->getPicture()) ?>" alt="une planète" width="100" height="100" class="rounded"></td>
                    <td><a href="index.php?controller=planet&action=detail&id=<?php echo($planet->getId())?>"><img src="public/img/detailplanet.jpg" alt="image de planète" width="100" height="100" class="rounded"></a></td>
                    <td>
                        <div class="d-flex justify-content-center">
                            <a href="index.php?controller=planet&action=update&id=<?php echo($planet->getId())?>">
                                <img src="public/img/yodaedit.png" alt="logo de modification" width="60" height="60">
                            </a>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex justify-content-center">
                        <a href="index.php?controller=planet&action=delete&id=<?php echo($planet->getId())?>">
                            <img src="public/img/dmauldelete.png" alt="logo de suppression" width="60" height="60">
                        </a>
                        </div>
                    </td>
                <?php endforeach; ?>
                </tr>
        </tbody>
    </table>
</div>

<?php
include ('View/parts/footer.php');