<?php
namespace Controllers;
require_once './libraries/models/Book.php';
require_once './libraries/models/Author.php';
require_once './libraries/models/Categorie.php';
require_once './libraries/utils/Renderer.php';
require_once './libraries/utils/Http.php';
require_once './libraries/utils/Session.php';

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
        /**
         * Verification pour savoir si le livre existe bien
         */
        if (!$book_id){
            die('Vous devez préciser un paramètre `id` dans l\'URL');
        }

        $book = $bookModel->findWithJointure($book_id);

        if(!$book)
        {
            die("Aucun livre n'éxiste avec l'id préciser dans l'URL");
        }

        /**
         * Affichage
         */
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
         * 3. Vérification que le livre existe bel et bien
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

    public function showModfifyForm(){
        $bookModel = new \Models\Book();
        $authorModel = new \Models\Author();
        $categoryModel = new \Models\Categorie();

        if (empty($_GET['id']) || !ctype_digit($_GET['id'])) {
            die("Ho ?! Tu n'as pas précisé l'id de l'article !");
        }

        $id = $_GET['id'];

        /**
         * 3. Vérification que l'article existe bel et bien et recupération du livre
         */

        $book = $bookModel->find($id);
        if (!$book) {
            die("Le livre $id n'existe pas, vous ne pouvez donc pas le supprimer !");
        }

        /**
         * Recupération des données
        */
        $authors = $authorModel->findAll();
        $categories = $categoryModel->findAll();
        $selected = '';
        $current_author_id = $book['author_id'];
        /**
         * Démarage d'une session et récupération de l'id
         */
        \Utils\Session::init_php_session();
        $_SESSION['book_id'] = $id;

        /**
        * Affichage
        */
        $pageTitle = 'Modification du livre';
        \Utils\Renderer::render('modifiy_book_form', compact('pageTitle', 'book', 'authors', 'categories', 'id', 'current_author_id', 'selected'));
    }

    public function edit(){
        $bookModel = new \Models\Book();

        /**
         * Ouverture et fermeture d'une session pour récupéré l'id du livre
         */
        \Utils\Session::init_php_session();
        $id = $_SESSION['book_id'];
        \Utils\Session::clean_php_session();


        /**
         * 3. Vérification que l'article existe bel et bien et recupération du livre
         */

        $book = $bookModel->find($id);
        if (!$book) {
            die("Le livre $id n'existe pas, vous ne pouvez donc pas le supprimer !");
        }

        /**
         * Récupérer les données saisi en POST
         */
        $book_name = $_POST['name'];
        $publication_date = $_POST['publication_date'];
        $category_id = $_POST['category_id'];
        $author_id = $_POST['author_id'];

         /**
          * Utiliser le model pour éditer les données
          */
          $bookModel->edit($id, $book_name, $publication_date, $category_id, $author_id);

          /**
           * Redirection a l'acceuil
           */
        \Utils\Http::redirect("index.php");

    }
}
?>