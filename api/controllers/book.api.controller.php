<?php
require_once("./api/models/book.model.php");
require_once("./api/views/json.view.php");

class BookApiController {

    private $model;
    private $jsonView;
    private $data;

    public function __construct() {
        $this->model = new BookModel();
        $this->jsonView = new JSONView();
        $this->data = file_get_contents("php://input");
    }

    private function getData() {
        return json_decode($this->data);
    }
    

    public function  getBooks($params = null) {
        $sort = isset($_GET['sort']) ? $_GET['sort'] : 'id';
        $order = isset($_GET['order']) ? $_GET['order'] : 'asc';
        $books = $this->model->getBooks($sort, $order);     
        if ($books){
            $this->jsonView->response($books, 200);
        }else{
            $this->jsonView->response('No se pudieron obtener los libros',404);
        }
    }

    public function getBook($params = null) {
        $id = $params[':ID'];        
        $books = $this->model->getBookById($id);        
        if ($books)
            $this->jsonView->response($books, 200);
        else
            $this->jsonView->response("El libro con el id={$id} no existe", 404);
    } 

    public function deleteBook($params = null) {
        $id = $params[':ID'];
        $books = $this->model->getBookById($id);
        if ($books) {
            $this->model->deleteBookById($id);
            $this->jsonView->response("El libro fue borrado con exito.", 200);
        } else
            $this->jsonView->response("El libro con el id={$id} no existe", 404);
    }

    public function addBook($params = null) {
        $data = $this->getData();
        $id = $this->model->addBook($data->titulo, isset($data->descripcion) ? $data->descripcion : null, $data->genero, isset($data->img_tapa) ? $data->img_tapa : null, $data->id_autor);
        $book = $this->model->getBookById($id);
        if ($book)
            $this->jsonView->response($book, 200);
        else
            $this->jsonView->response("El libro no fue creado", 500);
    }

    public function updateBook($params = null) {
        $id = $params[':ID'];
        $data = $this->getData();        
        $book = $this->model->getBookById($id);
        if ($book) {
            $book->id = isset($data->id) ? $data->id : $book->id;
            $book->titulo = isset($data->titulo) ? $data->titulo : $book->titulo;
            $book->genero = isset($data->genero) ? $data->genero : $book->genero;
            $book->descripcion = isset($data->descripcion) ? $data->descripcion : $book->descripcion;
            $book->img_tapa = isset($data->img_tapa) ? $data->img_tapa : $book->img_tapa;
            $book->id_autor = isset($data->id_autor) ? $data->id_autor : $book->id_autor;
            
            if ($this->model->editBookById($book, $id)){
                $this->jsonView->response("El libro fue modificado con exito.", 200);
            }else{
                $this->jsonView->response("No pudo modificarse el libro. Verifique id_autor", 404);
            }
        } else
            $this->jsonView->response("El libro con el id={$id} no existe", 404);
    }
}
