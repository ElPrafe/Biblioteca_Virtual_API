<?php

class LoginModel {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_library;charset=utf8', 'root', '');
    }
    
    public function getByUsername($username){

        $query = $this->db->prepare('SELECT * FROM usuarios WHERE usuario = ?');
        $query->execute([$username]);
        $user = $query->fetch(PDO::FETCH_OBJ);
        return $user;
    }
    
}