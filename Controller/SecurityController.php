<?php

class SecurityController {
    private $userManager;

    public function __construct()
    {
        $this->userManager = new UserManager();
    }

    public function register() {
        $errors = [];
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Username non vide
            if (empty($_POST['username'])) {
                $errors['username'] = "Veuillez saisir un nom d'utilisateur";
            }

            // Username n'existe pas déjà
            $user = $this->userManager->getByUsername($_POST['username']);
            if ($user) {
                $errors['username'] = "Impossible, cet utilisateur existe déjà";
            }

            // Nom non vide
            if (empty($_POST['nom'])) {
                $errors['nom'] = "Veuillez saisir votre nom";
            }

            // Prénom non vide
            if (empty($_POST['prenom'])) {
                $errors['prenom'] = "Veuillez saisir votre prénom";
            }

            // Mot de passe non vide
            if (empty($_POST['password'])) {
                $errors['password'] = "Veuillez saisir un mot de passe";
            }

            // Confirmation du mot de passe correspond au mot de passe
            if ($_POST['password'] !== $_POST['password2']) {
                $errors['password2'] = "Les mots de passe ne sont pas identique";
            }

            // Si pas d'erreur, on enregistre l'utilisateur sur la BDD
            if (count($errors) == 0) {
                $user = new User(null, $_POST['username'], $_POST['nom'], $_POST['prenom'], password_hash($_POST['password'], PASSWORD_DEFAULT));

                $this->userManager->add($user);

            // On renvoie l'utlisateur vers le Login
                header('Location: index.php?controller=security&action=login');
            }
        }

        require 'View/security/register.php';
    }
}