<?php
require_once './libs/smarty/libs/Smarty.class.php';

class AuthorView {
    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty(); // inicializo Smarty
    }

    function showAuthors($authors, $logged) {
        // asigno variables al tpl smarty                 
        $this->smarty->assign('count', count($authors)); 
        $this->smarty->assign('authors', $authors);
        $this->smarty->assign('logged', $logged);
        // mostrar el tpl
        $this->smarty->display('author.list.tpl');
    }
    function showAuthor($author,$books, $logged,$warning) {
        // asigno variables al tpl smarty      
        $this->smarty->assign('author', $author);
        $this->smarty->assign('books', $books);
        $this->smarty->assign('warning', $warning);
        $this->smarty->assign('logged', $logged);
        // mostrar el tpl
        $this->smarty->display('author.details.tpl');
    }
    function showAddAuthor() {
        $this->smarty->assign('logged', true);
        $this->smarty->display('author.add.tpl');
    }
    function showEditAuthor($author) {
        $this->smarty->assign('logged', true);
        $this->smarty->assign('author', $author);
        $this->smarty->display('author.edit.tpl');
    }
}