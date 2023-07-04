<?php
require_once("./api/models/book.model.php");
require_once("./api/views/json.view.php");
require_once("./helpers/auth.helper.php");
require_once("./api/models/author.model.php");

class BookApiController {

    private $model;
    private $jsonView;
    private $data;
    private $auth;
    private $modelAuthor;

    public function __construct() {
        $this->model = new BookModel();
        $this->jsonView = new JSONView();
        $this->auth = new AuthHelper();
        $this->modelAuthor = new AuthorModel();
        $this->data = file_get_contents("php://input");
    }

    private function getData() {
        return json_decode($this->data);
    }
    
    public function queryParamsCheck($sort,$order){
        if ($sort != 'id' && $sort !='genero' && $sort != 'titulo' && $sort !='id_autor' && $sort !='descripcion' && $sort !='img_tapa'){
            $this->jsonView->response('El parametro asignado a "sort" es invalido',400);
            die();
        }
        if($order !='asc'&&$order!='desc'){
            $this->jsonView->response('El parametro asignado a "order" es invalido',400);
            die();
        }
    }

    public function  getBooks($params = null) {        
        $sort = isset($_GET['sort']) ? $_GET['sort'] : 'id';
        $order = isset($_GET['order']) ? $_GET['order'] : 'asc';
        $this->queryParamsCheck($sort, $order);
        $books = $this->model->getBooks($sort, $order);     
        if ($books){
            $this->jsonView->response($books, 200);
        }else{
            $this->jsonView->response('No se pudieron obtener los libros',500);
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
        if (!$this->auth->validarToken()){
            $response=$this->jsonView->response('Necesita loggearse', 401);
            die();
        }
        $id = $params[':ID'];
        $books = $this->model->getBookById($id);
        if ($books) {
            $this->model->deleteBookById($id);
            $this->jsonView->response("El libro fue borrado con exito.", 200);
        } else
            $this->jsonView->response("El libro con el id={$id} no existe", 404);
    }

    public function checkJsonBook($book){
        if(!isset($book->titulo) || !isset($book->genero) || !isset ($book->id_autor)){
            $this->jsonView->response('El objeto debe poseer titulo, genero e id_autor', 400);
            die();
        }
        if (strlen($book->titulo)>50){
            $this->jsonView->response('El titulo no puede tener mas de 50 caracteres', 400);
            die();
        }
        $author = $this->modelAuthor->getAuthorById($book->id_autor);
        if (!$author){
            $this->jsonView->response('El id_autor no existe en la base de datos', 404);
            die();
        }

    }

    public function addBook($params = null) {
        if (!$this->auth->validarToken()){
            $response=$this->jsonView->response('Necesita loggearse', 401);
            die();
        }
        $data = $this->getData();
        $this->checkJsonBook($data);
        $id = $this->model->addBook($data->titulo, isset($data->descripcion) ? $data->descripcion : null, $data->genero, isset($data->img_tapa) ? $data->img_tapa : null, $data->id_autor);
        $book = $this->model->getBookById($id);
        if ($book)
            $this->jsonView->response($book, 201);
        else
            $this->jsonView->response("El libro no fue creado", 500);
    }

    public function updateBook($params = null) {
        if (!$this->auth->validarToken()){
            $response=$this->jsonView->response('Necesita loggearse', 401);
            die();
        }
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
            $author = $this->modelAuthor->getAuthorById($book->id_autor);
            if (!$author){
                $this->jsonView->response('El id_autor no existe en la base de datos', 404);
                die();
            }
            if ($this->model->editBookById($book, $id)){
                $this->jsonView->response("El libro fue modificado con exito.", 201);
            }else{
                $this->jsonView->response("No pudo modificarse el libro", 500);
            }
        } else
            $this->jsonView->response("El libro con el id={$id} no existe", 404);
    }
}
