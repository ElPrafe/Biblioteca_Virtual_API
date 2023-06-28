<?php

class AuthorModel {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_library;charset=utf8', 'root', '');
    }

    /**
     * Devuelve los autores.
     */
    public function getAuthors($sort, $order) {
        $orderBy = ' order by '. $sort . ' ' . $order;       
        $query = $this->db->prepare("SELECT * FROM autor" . $orderBy);
        try {
            $query->execute();
            $authors = $query->fetchAll(PDO::FETCH_OBJ); 
            return $authors;
        } catch (PDOException $e) {
            return false;
        }
        
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
        try{
            return $query->execute([$id]);
        } catch (PDOException $e) {
            return false;
        }
    }

    public function editAuthorById($id,$author) {      
        $query = $this->db->prepare("UPDATE autor SET id=?, nombre=?, nacionalidad=?, img_autor=?, fecha_nac=?  WHERE id=?");
        try{
            $query->execute([$author->id,$author->name, $author->nationality, $author->img, $author->date, $id]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}