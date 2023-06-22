<?php

class AuthHelper {
    public function __construct() {}

    public function login($user) {
        // INICIO LA SESSION Y LOGUEO AL USUARIO
        session_start();        
        $_SESSION['USERNAME'] = $user->usuario;
        $_SESSION['LAST_ACTIVITY'] = time();
    }

    public function logout() {
        session_start();
        session_destroy();
    }

    public function checkLoggedIn() {   
        if (session_status() !=2) {
            session_start();
        }   
        if (!isset($_SESSION['USERNAME'])) {
            header('Location: ' . 'login');
            die();
        } 
    }

    public function isLoggedIn() {
        if(session_status()==1){
            session_start();
        }
        
        
        if (!isset($_SESSION['USERNAME'])) {                   
            return false;
        } 
        
        if ( isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {             
            session_destroy(); // destruye la sesión, y vuelve al login
            return false;
        } 
        $_SESSION['LAST_ACTIVITY'] = time();
        return true;
    }

    public function getLoggedUserName() {
        if (session_status() != PHP_SESSION_ACTIVE)
            session_start();
        return $_SESSION['USERNAME'];
    }
}
