<?php

class PlanetController extends SecurityController
{

    private $pm;

    public static $allowedTerrain = [
        "Forêt",
        "Glace",
        "Sable",
        "Lave",
        "Oecuménopole"
    ];

    public function __construct()
    {
        parent::__construct();
        $this->pm = new PlanetManager();
    }

    public function displayAll()
    {
        $planets = $this->pm->getAll();

        require 'View/planets/list.php';
    }

    public function displayOne($id)
    {
        $planet = $this->pm->getOne($id);

        if (is_null($planet)) {
            header('Location: index.php?controller=default&action=not-found&scope=planet');
        }

        require 'View/planets/detail.php';
    }

    public function ajout()
    {
        parent::isLoggedIn();

        $errors = [];
        if ($_SERVER["REQUEST_METHOD"] == 'POST') {
            $errors = $this->checkForm();
            // S'il est valide, on enregistre les données puis on redirige l'utilisateur
            if (count($errors) == 0) {
                $planet = new Planet(null, $_POST['name'], $_POST['description'], $_POST['terrain'], $_POST['picture']);
                $this->pm->add($planet);
                header('Location: index.php?controller=planet&action=list');
            }
        }
        require 'View/planets/form-add.php';
    }

    private function checkForm()
    {
        $errors = [];
        if ($_SERVER["REQUEST_METHOD"] == 'POST') {
            // Vérifier le formulaire
            if (empty($_POST['name'])) {
                $errors['name'] = 'Veuillez saisir le nom de la planète';
            }

            if (strlen($_POST['name']) > 250) {
                $errors['name'] = 'Le nom est trop long (250 caractères)';
            }

            if (!in_array($_POST['terrain'], self::$allowedTerrain)) {
                $errors['terrain'] = "Ce type de terrain n'existe pas";
            }

            if (strlen($_POST['picture']) > 250) {
                $errors['picture'] = 'Veuillez entrer un lien plus court';
            }

            return $errors;
        }
    }
    public function update($id)
    {
        parent::isLoggedIn();

        $errors = [];
        $planet = $this->pm->getOne($id);

        if (is_null($planet)) {
            header('Location: index.php?controller=default&action=not-found&scope=planet');
        } else {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $errors = $this->checkForm();

                $planet->setName($_POST['name']);
                $planet->setDescription($_POST['description']);
                $planet->setTerrain($_POST['terrain']);
                $planet->setPicture($_POST['picture']);

                if (count($errors) == 0) {
                    // Mettre à jour la BDD
                    $this->pm->update($planet);
                    // Rediriger l'utilisateur
                    header("Location: index.php?controller=planet&action=list");
                }
            }
            require 'View/planets/form-edit.php';
        }
    }

    public function delete($id)
    {
        parent::isLoggedIn();

        $planet = $this->pm->getOne($id);

        if (is_null($planet)) {
            header('Location: index.php?controller=default&action=not-found&scope=planet');
        } else {
            $this->pm->delete($planet->getId());
            header("Location: index.php?controller=planet&action=list");
        }
    }
}
