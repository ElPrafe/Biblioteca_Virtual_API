<?php

class BookModel {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_library;charset=utf8', 'root', '');
    }

    /**
     * Devuelve los autores.
     */
    public function getBooksByID($id) {
        // 1. abro conexión a la DB
        // ya esta abierta por el constructor de la clase

        // 2. ejecuto la sentencia (2 subpasos)
        $query = $this->db->prepare("SELECT * FROM libro where id_autor=?");
        $query->execute([$id]);
        // 3. obtengo los resultados
        $books = $query->fetchAll(PDO::FETCH_OBJ); // devuelve un arreglo de objetos
        
        return $books;//VER COMO DEVOLVER SUS LIBROS
    }
    public function getBooks() {
        // 1. abro conexión a la DB
        // ya esta abierta por el constructor de la clase

        // 2. ejecuto la sentencia (2 subpasos)
        $query = $this->db->prepare("SELECT * FROM libro");
        $query->execute();
        // 3. obtengo los resultados
        $books = $query->fetchAll(PDO::FETCH_OBJ); // devuelve un arreglo de objetos
        
        return $books;//VER COMO DEVOLVER SUS LIBROS
    }

    public function getBookById($id) {
        // 1. abro conexión a la DB
        // ya esta abierta por el constructor de la clase
        // 2. ejecuto la sentencia (2 subpasos)
        $query = $this->db->prepare("SELECT * FROM libro where id=?");
        $query->execute([$id]);
        // 3. obtengo los resultados
        $book = $query->fetch(PDO::FETCH_OBJ); // devuelve un arreglo de objetos        
        return $book;
    }

    public function getBookByTitle($title) {
        // 1. abro conexión a la DB
        // ya esta abierta por el constructor de la clase
        // 2. ejecuto la sentencia (2 subpasos)
        $query = $this->db->prepare("SELECT * FROM libro where titulo=?");
        $query->execute([$title]);
        // 3. obtengo los resultados
        $book = $query->fetch(PDO::FETCH_OBJ); // devuelve un arreglo de objetos        
        return $book;
    }

    public function addBook($title, $desc, $genre, $img, $author_id) {
        $query = $this->db->prepare("INSERT INTO libro (titulo, descripcion, genero,img_tapa, id_autor) VALUES (?, ?, ?, ?, ?)");
        $query->execute([$title, $desc, $genre, $img, $author_id]);

        return $this->db->lastInsertId();
    }
    public function editBookById($id, $title, $genre, $desc, $img, $authorid) {        
        $query = $this->db->prepare("UPDATE libro SET titulo=?, descripcion=?, genero=?, img_tapa=?, id_autor=?  WHERE id=?");
        $query->execute([$title, $desc, $genre, $img, $authorid, $id]);        
    }

    public function deleteBookById($id) {
        $query = $this->db->prepare('DELETE FROM libro WHERE id = ?');
        $query->execute([$id]);
    }
}