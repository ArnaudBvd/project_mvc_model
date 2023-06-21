<?php

class Starship {
    private $id;
    private $name;
    private $picture;
    private $taille;
    private $fonction;

    public function __construct($id, $name, $picture, $taille, $fonction)
    {
        $this->id = $id;
        $this->name = $name;
        $this->picture = $picture;
        $this->taille = $taille;
        $this->fonction = $fonction;
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getName(){
        return $this->name;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function getPicture(){
        return $this->picture;
    }

    public function setPicture($picture){
        $this->picture = $picture;
    }

    public function getTaille(){
        return $this->taille;
    }

    public function setTaille($taille){
        $this->taille = $taille;
    }

    public function getFonction(){
        return $this->fonction;
    }

    public function setFonction($fonction){
        $this->fonction = $fonction;
    }
   
}