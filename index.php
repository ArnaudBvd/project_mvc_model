<?php

    require 'Model/Manager/DBManager.php';
    require 'Model/Class/Planet.php';
    require 'Model/Class/Starship.php';
    require  'Model/Manager/PlanetManager.php';
    require  'Model/Manager/StarshipManager.php';
    require 'Controller/DefaultController.php';
    require 'Controller/PlanetController.php';
    require 'Controller/StarshipController.php';

    // LES DIFFERENTES ROUTES DU ROUTER


    // Quand l'utilisateur se connecte, il atterri sur l'index (la racine du site) et comme il n'y a pas de
    // controller et d'action, il est redirigé vers l'index mais avec des paramètres (Get) qui cette fois fait appel au controller
    // Default qui lui, affiche la Home page (page d'accueil)
    if (!isset($_GET['controller']) && !isset($_GET['action'])){
        header('Location:index.php?controller=default&action=home');
    }

    // Le paramètren GET de notre URL est égal à 'default'
    // On créé un nouvel objet DefaultController
    if ($_GET['controller'] == 'default') {
        $controller = new DefaultController();
        // Si le paramètre 'action' est égale à 'home'
        // On renvoie vers la méthode 'home' de notre controller DefaultController
        if ($_GET['action'] == 'home') {
            $controller->home();
        }
        if ($_GET['action'] == 'not-found') {
            $controller->notFound();
        }
    }


    if ($_GET['controller'] == 'planet') {
        $controller = new PlanetController();

        if ($_GET['action'] == 'list') {
            $controller->displayAll();
        }

        if($_GET['action'] == 'detail' && array_key_exists('id', $_GET)){            
            $controller->displayOne($_GET['id']);
        }

        if ($_GET['action'] == 'ajout') {           
            $controller->ajout();
        }

        if ($_GET['action'] == 'update' && array_key_exists('id', $_GET)) {
            $controller->update($_GET['id']);
        }
    }


    if ($_GET['controller'] == 'starship') {
        $controller = new StarshipController();

        if ($_GET['action'] == 'list') {
            $controller->displayAll();
        }

        if ($_GET['action'] == 'detail' && array_key_exists('id', $_GET)) {            
            $controller = $controller->displayOne($_GET['id']);
        }
       
        if ($_GET['action'] == 'ajout') {           
            $controller->ajout();
        }
    }