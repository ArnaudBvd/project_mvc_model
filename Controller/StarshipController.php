<?php

class StarshipController
{

    private $sm;

    public function __construct()
    {
        $this->sm = new StarshipManager();
    }

    public function displayAll()
    {
        $starships = $this->sm->getAll();

        require 'View/starships/list.php';
    }

    public function displayOne($id)
    {
        $starship = $this->sm->getOne($id);

        if (is_null($starship)) {
            header('Location: index.php?controller=default&action=not-found&scope=starship');
        }

        require 'View/starships/detail.php';
    }

    public function ajout()
    {
        $errors = [];
        if ($_SERVER["REQUEST_METHOD"] == 'POST') {
            $errors = $this->checkForm();
            // S'il est valide, on enregistre les données puis on redirige l'utilisateur
            if (count($errors) == 0) {
                $starship = new Starship(null, $_POST['name'], $_POST['picture'], $_POST['taille'], $_POST['fonction']);
                $this->sm->add($starship);
                header('Location: index.php?controller=starship&action=list');
            }
        }
        require 'View/starships/form-add.php';
    }

    private function checkForm()
    {
        $errors = [];
        if ($_SERVER["REQUEST_METHOD"] == 'POST') {
            // Vérifier le formulaire
            if (empty($_POST['name'])) {
                $errors['name'] = 'Veuillez saisir le nom du vaisseau';
            }

            if (strlen($_POST['name']) > 250) {
                $errors['name'] = 'Le nom est trop long (250 caractères)';
            }

            if (!is_numeric($_POST["taille"])) {
                $errors["taille"] = 'Veuillez saisir un nombre';
            }

            if (strlen($_POST['picture']) > 250) {
                $errors['picture'] = 'Veuillez entrer un lien plus court';
            }
            return $errors;
        }
    }

    public function update($id){
        $errors = [];
        $starship = $this->sm->getOne($id);

        if(is_null($starship)){
            header('Location: index.php?controller=default&action=not-found&scope=starship');
        } else {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $errors = $this->checkForm();

                $starship->setName($_POST['name']);
                $starship->setPicture($_POST['picture']);
                $starship->setTaille($_POST['taille']);
                $starship->setFonction($_POST['fonction']);

                if(count($errors) == 0) {
                    // Mettre à jour la BDD
                    $this->sm->update($starship);
                    // Rediriger l'utilisateur
                    header("Location: index.php?controller=starship&action=list");
                }
            }
            require 'View/starships/form-edit.php';
        }
    }
}
