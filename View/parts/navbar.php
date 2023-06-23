<header>
    <nav class="navbar navbar-expand-lg mb-5 py-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="public/img/logosw.png" alt="" width="100" height="50"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav col-10">
                    <li class="nav-item">
                        <a class="nav-link active text-light" aria-current="page" href="index.php">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="index.php?controller=planet&action=list">Planètes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="index.php?controller=starship&action=list">Vaisseaux</a>
                    </li>

                    <!-- Si l'utilisateur est connecté l'onglet 'Déconnexion' apparait sinon c'est l'onglet 'Connexion'  -->
                    <li class="nav-item ms-5">
                        <?php if ($this->connexion_status() == false) {
                            echo '<a class=" btn btn-success nav-link fw-semibold text-light p-2" href="index.php?controller=security&action=login">Connexion</a>';
                        } else if ($this->connexion_status() == true) {
                            echo '<a class=" btn btn-danger nav-link fw-semibold text-light p-2" href="index.php?controller=security&action=logout">Déconnexion</a>';
                        }
                        ?>
                    </li>
                    
                </ul>
                
                <div class=" d-flex justify-content-center col-2">
                        <?php
                        if ($this->currentUser) {
                            echo ('<a class="nav-link text-center text-warning float-end"> Bienvenue ' . $this->currentUser->getUsername(). '</a>');
                        }
                        ?>
                </div>
            </div>
        </div>de
    </nav>
</header>