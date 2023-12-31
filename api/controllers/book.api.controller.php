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

    public function  getBooks($params = null) { 
        $data = $this->getData();       
        $sort = isset($_GET['sort']) ? $_GET['sort'] : 'id';//si no enviaron un sort, lo setea en "id"
        $order = isset($_GET['order']) ? $_GET['order'] : 'asc';//si no enviaron un order, lo setea en "asc"
        $inicio = null;
        $cantidad = null;
        //verifica si solicitaron los autores de forma paginada
        if (isset($data->pagina) && is_numeric($data->pagina) && isset($data->elempagina) && is_numeric($data->elempagina)){
            $inicio = strval((($data->pagina-1) * $data->elempagina));
            $cantidad = $data->elempagina;
        }
        $books = $this->model->getBooks($sort, $order, $inicio, $cantidad);  
        
        if (is_array($books)){
            if(count($books)>0)
                $this->jsonView->response($books, 200);
            else
                $this->jsonView->response('No existen elementos para la paginacion solicitada', 400);
        }else{
            $this->jsonView->response('No se pudieron obtener los libros. Error: ' . $books,500);
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

    public function addBook($params = null) {
        if (!$this->auth->validarToken()){
            $response=$this->jsonView->response('Necesita loggearse', 401);
            die();
        }
        $data = $this->getData();
        //Verifico que todos los datos esten cargados, sino se les asigna NULL.
        $titulo = isset($data->titulo) ? $data->titulo : null;
        $descripcion = isset($data->descripcion) ? $data->descripcion : null;
        $genero = isset($data->genero) ? $data->genero : null;
        $img_tapa = isset($data->img_tapa) ? $data->img_tapa : null;
        $id_autor = isset($data->id_autor) ? $data->id_autor : null;
        $id = $this->model->addBook($titulo, $descripcion, $genero, $img_tapa, $id_autor);
        //verifica que $id sea un id. De no ser asi, no pide el libro.
        $book = is_numeric($id) ? $this->model->getBookById($id) : null;
        if ($book)
            $this->jsonView->response($book, 201);
        else
            $this->jsonView->response("El libro no fue creado. Error: " . $id, 500);
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
            //Verifica que todos los datos esten cargados, sino se les asigna el valor que ya tenia.
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
