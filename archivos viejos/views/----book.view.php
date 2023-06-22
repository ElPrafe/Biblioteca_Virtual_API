<?php
require_once './libs/smarty/libs/Smarty.class.php';

class BookView {
    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty(); // inicializo Smarty
    }
    
    function showBooksWithAuthor($books, $logged) {
        // asigno variables al tpl smarty        
        
        $this->smarty->assign('count', count($books)); 
        $this->smarty->assign('books', $books);
        $this->smarty->assign('logged', $logged);
        // mostrar el tpl
        $this->smarty->display('books.list.with.author.tpl');
    }

    function showBook($book, $author, $logged) {
        // asigno variables al tpl smarty                
        $this->smarty->assign('book', $book);
        $this->smarty->assign('logged', $logged);
        $this->smarty->assign('author', $author);
        // mostrar el tpl
        $this->smarty->display('book.details.tpl');
    }
    function showAddBook($authors) {
        $this->smarty->assign('logged', true);
        $this->smarty->assign('authors', $authors);
        $this->smarty->display('book.add.tpl');
    }
    function showEditBook($book, $authors,$author) {
        $this->smarty->assign('logged', true);
        $this->smarty->assign('book', $book);
        $this->smarty->assign('authors', $authors);
        $this->smarty->assign('author', $author);
        $this->smarty->display('book.edit.tpl');
    }
}