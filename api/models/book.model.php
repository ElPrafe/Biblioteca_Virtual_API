<?php

class BookModel {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_library;charset=utf8', 'root', '');
    }

    /**
     * Devuelve los autores.
     */
    public function getBooksByIdAutor($id) {

        $query = $this->db->prepare("SELECT * FROM libro where id_autor=?");
        $query->execute([$id]);

        $books = $query->fetchAll(PDO::FETCH_OBJ); 
        
        return $books;
    }
    public function getBooks($sort, $order) {
        $orderBy = ' order by '. $sort . ' ' . $order;       
        $query = $this->db->prepare("SELECT * FROM libro" . $orderBy);
        try {
            $query->execute();
            $books = $query->fetchAll(PDO::FETCH_OBJ);
            return $books;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function getBookById($id) {

        $query = $this->db->prepare("SELECT * FROM libro where id=?");
        $query->execute([$id]);

        $book = $query->fetch(PDO::FETCH_OBJ);      
        return $book;
    }

    public function getBookByTitle($title) {

        $query = $this->db->prepare("SELECT * FROM libro where titulo=?");
        $query->execute([$title]);

        $book = $query->fetch(PDO::FETCH_OBJ);      
        return $book;
    }

    public function addBook($title, $desc, $genre, $img, $author_id) {
        $query = $this->db->prepare("INSERT INTO libro (titulo, descripcion, genero,img_tapa, id_autor) VALUES (?, ?, ?, ?, ?)");        
        try{
            $query->execute([$title, $desc, $genre, $img, $author_id]);
            return $this->db->lastInsertId();
        } catch (PDOException $e) {
            return false;
        }

        
    }
    public function editBookById($book, $id) {        
        $query = $this->db->prepare("UPDATE libro SET id=?, titulo=?, descripcion=?, genero=?, img_tapa=?, id_autor=?  WHERE id=?");
        try{
            $query->execute([$book->id, $book->titulo, $book->descripcion, $book->genero, $book->img_tapa, $book->id_autor, $id]);   
            return true;
        } catch (PDOException $e) {
            return false;
        }     
    }

    public function deleteBookById($id) {
        $query = $this->db->prepare('DELETE FROM libro WHERE id = ?');
        $query->execute([$id]);
    }
}