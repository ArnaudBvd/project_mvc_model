<?php

class Planet {
    private $id;
    private $name;
    private $description;
    private $terrain;
    private $picture;

    public function __construct($id, $name, $description, $terrain, $picture)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->terrain = $terrain;
        $this->picture = $picture;
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

    public function getDescription(){
        return $this->description;
    }

    public function setDescription($description){
        $this->description = $description;
    }

    public function getTerrain(){
        return $this->terrain;
    }

    public function setTerrain($terrain){
        $this->terrain = $terrain;
    }

    public function getPicture(){
        return $this->picture;
    }

    public function setPicture($picture){
        $this->picture = $picture;
    }

}