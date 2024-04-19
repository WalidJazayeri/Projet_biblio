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

    }
}
?>