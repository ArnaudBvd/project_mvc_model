<?php

class StarshipController {

    private $sm;

    public function __construct() {
        $this->sm = new StarshipManager();
    }

    public function displayAll() {
        $starships = $this->sm->getAll();
        
    require 'View/starships/list.php';
    }

    public function displayOne($id) {
        $starship = $this->sm->getOne($id);

        if (is_null($starship)) {
            header('Location: index.php?controller=default&action=not-found');
        }

        require 'View/starships/detail.php';
    }

    public function ajout() {
        $errors = [];
        if ($_SERVER["REQUEST_METHOD"] == 'POST') {
            // Vérifier le formulaire
            if(empty($_POST['name'])){
                $errors['name'] = 'Veuillez saisir le nom de la planète';
            }

            if(strlen($_POST['name']) > 250){
                $errors['name'] = 'Le nom est trop long (250 caractères)';
            }
            
            if (strlen($_POST['picture']) > 250) {
                $errors['picture'] = 'Veuillez entrer un lien plus court';
            }

            // S'il est valide, on enregistre les données puis on redirige l'utilisateur
            if (count($errors) == 0) {
                $starship = new Starship(null, $_POST['name'], $_POST['picture'], $_POST['taille'], $_POST['fonction']);
                $this->sm->add($starship);
                header('Location: index.php?controller=starship&action=list');
            }
        }
        require 'View/starships/form-add.php';
    }
}