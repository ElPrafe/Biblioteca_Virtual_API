<?php
    require_once('./router.php');
    require_once('./api/controllers/author.api.controller.php');
    require_once('./api/controllers/book.api.controller.php');
    
    // CONSTANTES PARA RUTEO
    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

    $router = new Router();

    // rutas author
    $router->addRoute("/autor", "GET", "AuthorApiController", "getAuthors");
    $router->addRoute("/autor/:ID", "GET", "AuthorApiController", "getAuthor");
    $router->addRoute("/autor/:ID", "DELETE", "AuthorApiController", "deleteAuthor");
    $router->addRoute("/autor", "POST", "AuthorApiController", "addAuthor");
    $router->addRoute("/autor/:ID", "PUT", "AuthorApiController", "updateAuthor");
    // rutas books
    $router->addRoute("/libro", "GET", "BookApiController", "getBooks");
    $router->addRoute("/libro/:ID", "GET", "BookApiController", "getBook");
    $router->addRoute("/libro/:ID", "DELETE", "BookApiController", "deleteBook");
    $router->addRoute("/libro", "POST", "BookApiController", "addBook");
    $router->addRoute("/libro/:ID", "PUT", "BookApiController", "updateBook");

    //run
    $router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']); 



        // rutas author
        //$router->addRoute("/tareas", "GET", "AuthorApiController", "getTasks");
        //$router->addRoute("/tareas/:ID", "GET", "AuthorApiController", "getTask");
        //$router->addRoute("/tareas/:ID", "DELETE", "AuthorApiController", "deleteTask");
        //$router->addRoute("/tareas", "POST", "AuthorApiController", "addTask");
        //$router->addRoute("/tareas/:ID", "PUT", "AuthorApiController", "updateTask");