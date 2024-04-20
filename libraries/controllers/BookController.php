<?php
namespace Controllers;
require_once './libraries/models/Book.php';
require_once './libraries/utils/Renderer.php';

class BookController
{
    public function index(){
        //Récupération des données
        $bookModel = new \Models\Book();
        $books = $bookModel->findAll();

        //Affichage
        $pageTitle = "Liste des livres";
        \Utils\Renderer::render('listBook', compact('pageTitle', 'books'));
    }

    public function show(){
        $bookModel = new \Models\Book();
        $book_id = null;

        if(!empty($_GET['id']) && ctype_digit($_GET['id']))
        {
            $book_id = $_GET['id'];
        }

        if (!$book_id){
            die('Vous devez préciser un paramètre `id` dans l\'URL');
        }

        $book = $bookModel->find($book_id);

        $pageTitle = 'Livre';
        \Utils\Renderer::render('details_book', compact('pageTitle', 'book', 'book_id'));
    }
}
?>