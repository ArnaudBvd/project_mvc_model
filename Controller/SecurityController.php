<?php

// Class en charge de la sécurité de notre application
class SecurityController
{
    // Manager qui permettra de requêter nos nos données utilisateurs
    private $userManager;
    // Partagé avec les classes enfant, c'est l'utilisateur connecté
    protected $currentUser;

    public function __construct()
    {
        // On récupère notre user manager
        $this->userManager = new UserManager();
        $this->currentUser = null;
        // S'il est dans la session, on le met dans notre attribut 'currentuser'
        if (array_key_exists('user', $_SESSION)) {
            // Il est stocké dans la session sous forme de texte
            // On le transforme en objet
            $this->currentUser = unserialize($_SESSION['user']);
        }
    }

    // Fonction qui permet de vérifier si un utilisateur est connecté 
    // Utilisée notamment pour les onglets 'connexion' et 'déconnexion' de la navbar
    public static function connexion_status()
    {
        if (array_key_exists("user", $_SESSION)) {
            return true;
        } else {
            return false;
        }
    }

    // Fonction qui vérifie que l'on a un attribut 'currentuser'
    // Si ce n'est pas le cas, alors il n'y a pas d'utilisateur connecté
    // Donc on redirige vers la page de login
    protected function isLoggedIn()
    {
        if (!$this->currentUser) {
            header('Location: index.php?controller=security&action=login');
            die();
        }
    }

    // Affiche le formulaire d'enregistrement
    // Vérifie les saisies du formulaire
    // Enregistre l'utilisateur (Attention : bien penser à hacher le password)
    // Redirige l'utilisateur vers le login
    public function register()
    {
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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

    // Fonction qui affiche le formulaire de login
    // Lors de la soumission elle le vérifie
    // Connecte l'utilisateur si les identifiants sont bons
    // Stocke en session l'utilisateur après l'avoir transformé en chaîne de caractère
    // Met à jour notre attribut currentUser avec l'utilisateur connecté
    public function login()
    {
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (empty($_POST['username'])) {
                $errors['username'] = "Veuillez saisir un nom d'utilisateur";
            }

            if (empty($_POST['password'])) {
                $errors['password'] = "Veuillez saisir un mot de passe";
            }

            if (count($errors) == 0) {
                $user = $this->userManager->getByUsername($_POST['username']);

                if (is_null($user) || !password_verify($_POST['password'], $user->getPassword())) {
                    $errors['password'] = "Identifiant ou mot de passe incorrect";
                } else {
                    $this->currentUser = $user;
                    $_SESSION['user'] = serialize($user);
                    header('Location: index.php?controller=default&action=home');
                }
            }
        }

        require 'View/security/login.php';
    }

    // Méthode de logout
    // Elle supprime la session, vide l'attribut de l'utilisateur courant
    // Redirige vers le login
    public function logout()
    {
        session_destroy();
        $this->currentUser = null;
        header('Location: index.php?controller=security&action=login');
    }
}
