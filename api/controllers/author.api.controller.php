<?php
require_once("../models/author.model.php");
require_once("../views/json.view.php");

class AuthorApiController {

    private $model;
    private $view;
    private $data;

    public function __construct() {
        $this->model = new AuthorModel();
        $this->view = new JSONView();
        $this->data = file_get_contents("php://input");
    }

    private function getData() {
        return json_decode($this->data);
    }

    public function  getAuthors($params = null) {
        $authors = $this->model->getAuthors();
        $this->view->response($authors, 200);
    }

    public function getTask($params = null) {
        $id = $params[':ID'];
        
        $tarea = $this->model->get($id);        
        if ($tarea)
            $this->view->response($tarea, 200);
        else
            $this->view->response("La tarea con el id={$id} no existe", 404);
    } 

    public function deleteTask($params = null) {
        $id = $params[':ID'];
        $tarea = $this->model->get($id);
        if ($tarea) {
            $this->model->delete($id);
            $this->view->response("La tarea fue borrada con exito.", 200);
        } else
            $this->view->response("La tarea con el id={$id} no existe", 404);
    }

    public function addTask($params = null) {
        $data = $this->getData();

        $id = $this->model->save($data->titulo, $data->descripcion, $data->prioridad);
        
        $tarea = $this->model->get($id);
        if ($tarea)
            $this->view->response($tarea, 200);
        else
            $this->view->response("La tarea no fue creada", 500);

    }

    public function updateTask($params = null) {
        $id = $params[':ID'];
        $data = $this->getData();
        
        $tarea = $this->model->get($id);
        if ($tarea) {
            $this->model->update($id, $data->prioridad);
            $this->view->response("La tarea fue modificada con exito.", 200);
        } else
            $this->view->response("La tarea con el id={$id} no existe", 404);
    }
}
