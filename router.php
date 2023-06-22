<?php
require_once './app/controllers/author.controller.php';
require_once './app/controllers/book.controller.php';
require_once './app/controllers/login.controller.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'author/all'; // acción por defecto
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}


$params = explode('/', $action);

// instancio el unico controller que existe por ahora
$authorController = new AuthorController();
$bookController = new BookController();
$loginController = new LoginController();


// tabla de ruteo
switch ($params[0]) {
    case 'author':
        switch ($params[1]) {
            case 'all':
                $authorController->showAuthors();  
                break;
            case 'id':
                $authorController->showAuthor($params[2], false);   
                break;
            case 'add':
                $authorController->addAuthorScreen(); 
                break;
            case 'addAttempt':
                $authorController->addAuthor(); 
                break;
            case 'edit':
                $authorController->editAuthorScreen($params[2]);  
                break;
            case 'editAttempt':
                $authorController->editAuthorById($params[2]);  
                break;
            case 'delete':                
                $authorController->deleteAuthor($params[2]); 
                break;
            default:
                echo('404 Page not found');
                break;
        }              
        break;  
    case 'book':
        switch ($params[1]) {
            case 'all':
                $bookController->showBooksWithAuthor(); 
                break;
            case 'id':
                $bookController->showBook($params[2]); 
                break;
            case 'add':
                $bookController->addBookScreen(); 
                break;
            case 'addAttempt':
                $bookController->addBook(); 
                break;
            case 'delete':        
                $bookController->deleteBook($params[2]); 
                break;
            case 'edit':                
                $bookController->editBookScreen($params[2]); 
                break;
            case 'editAttempt':                
                $bookController->editBookById($params[2]); 
                break;
            default:
            echo('404 Page not found');
                break;
        }     
        break; 
    case 'login':
        $loginController->login();
        break;
    case 'loginAttempt':        
        $loginController->loginAttempt();
        break;
    case 'logout':        
        $loginController->logout();
        break;
    default:
        echo('404 Page not found');
        break;
}
