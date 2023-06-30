<?php
require_once("./api/models/author.model.php");
//require_once("./api/views/author.view.php");
require_once("./api/views/json.view.php");
require_once("./helpers/auth.helper.php");

class AuthorApiController {

    private $model;
    private $jsonView;
    private $view;
    private $data;
    private $auth;

    public function __construct() {
        $this->model = new AuthorModel();
        $this->auth = new AuthHelper();
        //$this->view = new AuthorView();
        $this->jsonView = new JSONView();
        $this->data = file_get_contents("php://input");
    }

    private function getData() {
        return json_decode($this->data);
    }

    public function  getAuthors($params = null) {      
        
        $sort = isset($_GET['sort']) ? $_GET['sort'] : 'id';
        $order = isset($_GET['order']) ? $_GET['order'] : 'asc';
        $authors = $this->model->getAuthors($sort, $order);
        if ($authors){
            $response=$this->jsonView->response($authors, 200);
        }else{
            $response=$this->jsonView->response('No se pudieron obtener los autores', 404);
        }
        
        //$this->view->showAuthors($authors);
    }

    public function getAuthor($params = null) {
        
        $id = $params[':ID'];    
        $author = $this->model->getAuthorById($id);        
        if ($author)
            $this->jsonView->response($author, 200);
        else
            $this->jsonView->response("El autor con el id={$id} no existe", 404);
    } 

    public function deleteAuthor($params = null) {
        if (!$this->auth->validarToken()){
            $response=$this->jsonView->response('Necesita loggearse', 401);
            die();
        }
        $id = $params[':ID'];
        $author = $this->model->getAuthorById($id);
        if ($author) {
            if ($this->model->deleteAuthorById($id)) 
                $this->jsonView->response("El autor fue borrado con exito.", 200);
            else 
                $this->jsonView->response("El autor id={$id} tiene libros asignados. No fue eliminado", 409);
        } else
            $this->jsonView->response("El autor con el id={$id} no existe", 404);
    }

    public function addAuthor($params = null) {
        if (!$this->auth->validarToken()){
            $response=$this->jsonView->response('Necesita loggearse', 401);
            die();
        }
        $data = $this->getData();
        $id = $this->model->addAuthor($data->nombre, isset($data->img_autor) ? $data->img_autor : null, $data->fecha_nac,$data->nacionalidad);        
        $author = $this->model->getAuthorById($id);

        if ($author)
            $this->jsonView->response($author, 200);
        else
            $this->jsonView->response("El autor no fue creado", 500);
    }

    public function updateAuthor($params = null) {
        if (!$this->auth->validarToken()){
            $response=$this->jsonView->response('Necesita loggearse', 401);
            die();
        }
        $id = $params[':ID'];
        $data = $this->getData();
        $author = $this->model->getAuthorById($id);
        if ($author) {
            $author->id = isset($data->id) ? $data->id : $author->id;
            $author->name = isset($data->nombre) ? $data->nombre : $author->nombre;
            $author->img = isset($data->img_autor) ? $data->img_autor : $author->img_autor;
            $author->nationality = isset($data->nacionalidad) ? $data->nacionalidad : $author->nacionalidad;
            $author->date = isset($data->fecha_nac) ? $data->fecha_nac : $author->fecha_nac;
            if ($this->model->editAuthorById($id,$author)) {
                $this->jsonView->response("El autor fue modificado con exito.", 200);
            }else{
                $this->jsonView->response("No pudo modificarse el autor", 404);
            }
        } else
            $this->jsonView->response("El autor con el id={$id} no existe", 404);
    }
}