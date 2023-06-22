<?php

class AuthorModel {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_library;charset=utf8', 'root', '');
    }

    /**
     * Devuelve los autores.
     */
    public function getAuthors() {
        $query = $this->db->prepare("SELECT * FROM autor");
        $query->execute();
        $authors = $query->fetchAll(PDO::FETCH_OBJ); 
        return $authors;//VER COMO DEVOLVER SUS LIBROS
    }

    public function getAuthorById($id) {
        $query = $this->db->prepare("SELECT * FROM autor where id = ?");
        $query->execute([$id]);        
        $author = $query->fetch(PDO::FETCH_OBJ);   
        return $author;
    }

    public function getAuthorByName($name) {
        $query = $this->db->prepare("SELECT * FROM autor where nombre = ?");
        $query->execute([$name]);        
        $author = $query->fetch(PDO::FETCH_OBJ);   
        return $author;
    }

    /**
     * Inserta un autor en la base de datos.
     */
    public function addAuthor($name, $img, $date, $nationality) {
        $query = $this->db->prepare("INSERT INTO autor (nombre, nacionalidad, img_autor, fecha_nac) VALUES (?, ?, ?, ?)");
        $query->execute([$name, $nationality, $img, $date]);
        return $this->db->lastInsertId();
    }

    public function deleteAuthorById($id) {        
        $query = $this->db->prepare('DELETE FROM autor WHERE id = ?');
        
        $query->execute([$id]);
    }

    public function editAuthorById($id, $name, $img, $date, $nationality) {        
        $query = $this->db->prepare("UPDATE autor SET nombre=?, nacionalidad=?, img_autor=?, fecha_nac=?  WHERE id=?");
        $query->execute([$name, $nationality, $img, $date,$id]);
    }
}