<?php
namespace Controllers;
require_once './libraries/models/Book.php';
require_once './libraries/utils/Renderer.php';
require_once './libraries/utils/Http.php';

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

    public function delete(){
        $bookModel = new \Models\Book();

        if (empty($_GET['id']) || !ctype_digit($_GET['id'])) {
            die("Ho ?! Tu n'as pas précisé l'id de l'article !");
        }

        $id = $_GET['id'];

        /**
         * 3. Vérification que l'article existe bel et bien
         */

         $book = $bookModel->find($id);
         if (!$book) {
             die("Le livre $id n'existe pas, vous ne pouvez donc pas le supprimer !");
         }

         /**
         * 4. Réelle suppression de l'article
         */
        $bookModel->delete($id);

        \Utils\Http::redirect("index.php");
    }
}
?>