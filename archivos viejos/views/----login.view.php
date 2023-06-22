<?php
require_once './libs/smarty/libs/Smarty.class.php';

class LoginView {
    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty(); // inicializo Smarty
    }    

    function showLogin($logged) {
        // mostrar el tpl
        $this->smarty->assign('logged', $logged);
        $this->smarty->display('login.tpl');
    }
    
}