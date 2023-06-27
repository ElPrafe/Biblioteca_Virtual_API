<?php
require_once("./api/models/author.model.php");
//require_once("./api/views/author.view.php");
require_once("./api/views/json.view.php");

class AuthorApiController {

    private $model;
    private $jsonView;
    private $view;
    private $data;

    public function __construct() {
        $this->model = new AuthorModel();
        //$this->view = new AuthorView();
        $this->jsonView = new JSONView();
        $this->data = file_get_contents("php://input");
    }

    private function getData() {
        return json_decode($this->data);
    }

    public function  getAuthors($params = null) {
        $authors = $this->model->getAuthors();
        $response=$this->jsonView->response($authors, 200);
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
        $data = $this->getData();
        $id = $this->model->addAuthor($data->nombre, isset($data->img_autor) ? $data->img_autor : null, $data->fecha_nac,$data->nacionalidad);        
        $author = $this->model->getAuthorById($id);

        if ($author)
            $this->jsonView->response($author, 200);
        else
            $this->jsonView->response("El autor no fue creado", 500);
    }

    public function updateAuthor($params = null) {
        $id = $params[':ID'];
        $data = $this->getData();
        $author = $this->model->getAuthorById($id);
        if ($author) {
            $author->id = isset($data->id) ? $data->id : $author->id;
            $author->name = isset($data->nombre) ? $data->nombre : $author->nombre;
            $author->img = isset($data->img_autor) ? $data->img_autor : $author->img_autor;
            $author->nationality = isset($data->nacionalidad) ? $data->nacionalidad : $author->nacionalidad;
            $author->date = isset($data->fecha_nac) ? $data->fecha_nac : $author->fecha_nac;
            $this->model->editAuthorById($id,$author);
            $this->jsonView->response("El autor fue modificado con exito.", 200);

        } else
            $this->jsonView->response("El autor con el id={$id} no existe", 404);
    }
}