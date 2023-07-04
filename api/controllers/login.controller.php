<?php
require_once './api/models/login.model.php';
require_once './api/views/json.view.php';
require_once './helpers/auth.helper.php';

class LoginController
{

    private $loginModel;
    private $view;
    private $data;

    public function __construct()
    {
        $this->data = file_get_contents("php://input");
        $this->view = new JSONView();
        try {
            $this->loginModel = new LoginModel();
        } catch (Exception $e) {
            $this->view->response("Hubo un error en el servidor al intentar conectar con la base de datos", 500);
            die();
        }
    }
    private function getData()
    {
        return json_decode($this->data);
    }

    public function login($params = null)
    {        
        $datos = $this->getData();        
        $usuario = $datos->usuario;
        $pass = $datos->password;
        if (empty($usuario) || empty($pass)) {
            $this->view->response("Debe indicar el nombre de usuario y la contraseña.", 400);
            return;
        }
        $usuario = $this->loginModel->getUsuario($usuario);
        if ($this->checkUser($usuario, $pass)) {
            $aut = new AuthHelper();            
            $token = $aut->getToken($usuario);
            $this->view->response($token, 200);            
        } else {
            $this->view->response("Usuario o contraseña incorrecta.", 400);
        }
    }

    private function checkUser($usuario, $pass){
        if($usuario && password_verify($pass,($usuario->contraseña))){  
            return true;
        }else{
            return false;
        }
    }
    
}