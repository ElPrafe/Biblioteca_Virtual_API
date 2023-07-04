<?php
require_once("./api/models/author.model.php");
require_once("./api/views/json.view.php");
require_once("./helpers/auth.helper.php");

class AuthorApiController {

    private $model;
    private $jsonView;
    private $data;
    private $auth;

    public function __construct() {
        $this->model = new AuthorModel();
        $this->auth = new AuthHelper();
        $this->jsonView = new JSONView();
        $this->data = file_get_contents("php://input");
    }

    private function getData() {
        return json_decode($this->data);
    }


    public function  getAuthors($params = null) {
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
        $authors = $this->model->getAuthors($sort, $order, $inicio, $cantidad);

        if (is_array($authors)){
            if(count($authors)>0)
                $response=$this->jsonView->response($authors, 200);
            else
                $response=$this->jsonView->response('No existen elementos para la paginacion solicitada', 400);
        }else{
            $response=$this->jsonView->response('No se pudieron obtener los autores. Error: ' . $authors, 500);
        }
        
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
            $this->jsonView->response('Necesita loggearse', 401);
            die();
        }
        $data = $this->getData();
        //Verifico que todos los datos esten cargados, sino se les asigna NULL. Tambien se verifica que fecha_nac sea de tipo date.
        $nombre = isset($data->nombre) ? $data->nombre : null;        
        $img_autor = isset($data->img_autor) ? $data->img_autor : null;        
        $fecha_nac = isset($data->fecha_nac) && strtotime($data->fecha_nac) ? $data->fecha_nac : null;        
        $nacionalidad = isset($data->nacionalidad) ? $data->nacionalidad : null;        
        $id = $this->model->addAuthor($nombre, $img_autor, $fecha_nac,$nacionalidad);   
        //verifica que $id sea un id. De no ser asi, no pide el autor.
        $author =is_numeric($id)? $this->model->getAuthorById($id) : null;

        if ($author)
            $this->jsonView->response($author, 201);
        else
            $this->jsonView->response("El autor no fue creado :". $id, 500);
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
            //Verifica que todos los datos esten cargados, sino se les asigna el valor que ya tenia.
            $author->id = isset($data->id) ? $data->id : $author->id;
            $author->nombre = isset($data->nombre) ? $data->nombre : $author->nombre;
            $author->img_autor = isset($data->img_autor) ? $data->img_autor : $author->img_autor;
            $author->nacionalidad = isset($data->nacionalidad) ? $data->nacionalidad : $author->nacionalidad;
            $author->fecha_nac = isset($data->fecha_nac) ? $data->fecha_nac : $author->fecha_nac;
            if ($this->model->editAuthorById($id,$author)) {
                $this->jsonView->response($author, 201);
            }else{
                $this->jsonView->response("No pudo modificarse el autor", 404);
            }
        } else
            $this->jsonView->response("El autor con el id={$id} no existe", 404);
    }
}