<?php

class User {

    private $id;
    private $username;
    private $nom;
    private $prenom;
    private $password;

    public function __construct($id, $username, $nom, $prenom, $password)
    {
        $this->id = $id;
        $this->username = $username;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->password = $password;
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getUsername(){
        return $this->username;
    }

    public function setUsername($username){
        $this->username = $username;
    }

    public function getNom(){
        return $this->nom;
    }

    public function setNom($nom){
        $this->nom = $nom;
    }

    public function getPrenom(){
        return $this->prenom;
    }

    public function setPrenom($prenom){
        $this->prenom = $prenom;
    }

    public function getPassword(){
        return $this->password;
    }

    public function setPassword($password){
        $this->password = $password;
    }

}