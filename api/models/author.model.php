<?php

class AuthorModel {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_library;charset=utf8', 'root', '');
    }

    /**
     * Devuelve los autores.
     */
    public function getAuthors($sort, $order, $inicio = null, $cantidad = null) {
        $orderBy = ' order by '. $sort . ' ' . $order;       
        $sql = "SELECT * FROM autor" . $orderBy;        
        //si pidieron una paginacion, lo agrega a la consulta, sino pide todos los autores
        $sql = $inicio != null && $cantidad !=null ? $sql . " LIMIT " . ($inicio) . ", " . ($cantidad) : $sql;        
        $query = $this->db->prepare($sql);        
        try {
            $query->execute();
            $books = $query->fetchAll(PDO::FETCH_OBJ);
            return $books;
        } catch (PDOException $e) {
            return $e->getMessage();
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

    public function addAuthor($name, $img, $date, $nationality) {
        $query = $this->db->prepare("INSERT INTO autor (nombre, nacionalidad, img_autor, fecha_nac) VALUES (?, ?, ?, ?)");
        try {
            $query->execute([$name, $nationality, $img, $date]);
            return $this->db->lastInsertId();
        } catch (PDOException $e) {            
            return $e->getMessage();
            // $errorMsg = $e->getMessage();
            // $pattern = "/('.*')/";
            // preg_match($pattern, $errorMsg, $matches);            
            // return 'La columna ' . $matches[1] .' tuvo un error. Error SQL numero '. $e->getCode();
        }
        
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