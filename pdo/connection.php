<?php
class connection{
    protected $pdo;

    function connect(){
        $this->pdo = new PDO("mysql:host=localhost; dbname=management_system", "root", "");
        return $this->pdo;
    }
}
