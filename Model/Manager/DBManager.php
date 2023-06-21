<?php

abstract class DBManager {

    protected $bdd;

    private $host = 'localhost';
    private $user = 'root';
    private $password = "";
    private $dbName = "demomvc";

    public function __construct(){
        try {
            $this->bdd = new PDO('mysql:host='.$this->host.';
            dbname='.$this->dbName.';charset=utf8',
                $this->user,
                $this->password);
        } catch (PDOException $e){
            throw $e;
            die();
        }
    }

}