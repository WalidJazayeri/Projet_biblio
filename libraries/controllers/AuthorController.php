<?php
namespace Controllers;
require_once './libraries/controllers/Controller.php';
require_once './libraries/models/Author.php';
require_once './libraries/utils/Renderer.php';
require_once './libraries/utils/Http.php';
require_once './libraries/utils/Session.php';

class AuthorController extends Controller
{
    protected $modelName = \Models\Author::class;

    public function index(){
        $authors = $this->model->findAll();

        //Affichage
        $pageTitle = "Liste des auteurs";
        \Utils\Renderer::render('list_authors', compact('pageTitle', 'authors'));
    }

    public function delete(){

        if (empty($_GET['id']) || !ctype_digit($_GET['id'])) {
            die("Tu n'as pas précisé l'id de l'auteur !");
        }

        $id = $_GET['id'];

        /**
         * 3. Vérification que l'auteur existe bel et bien
         */
        $author = $this->model->find($id);

        if (!$author) {
            die("Aucun auteur n'a l'ID $id !");
        }

        $this->model->delete($id);

        \Utils\Http::redirect("list_authors.php");
    }

    public function add_author_form(){
        $pageTitle = "Ajouter un auteur";
        \Utils\Renderer::render('add_author_form', compact('pageTitle'));
    }

    public function add_author(){
        if (empty($_POST['name'])) {
            die("Le nom est obligatoire");
        }

        $author_name = $_POST['name'];

        $this->model->add($author_name);

        \Utils\Http::redirect("list_authors.php");
    }

    public function edit_author_form(){
        if (empty($_GET['id']) || !ctype_digit($_GET['id'])) {
            die("Tu n'as pas précisé l'id de l'auteur !");
        }

        $id = $_GET['id'];

        /**
         * Démarage d'une session et récupération de l'id
         */
        \Utils\Session::init_php_session();
        $_SESSION['author_id'] = $id;

        $author = $this->model->find($id);

        if (!$author) {
            die("Aucun auteur n'a l'ID $id !");
        }

        $pageTitle = "Modifier l'auteur";
        \Utils\Renderer::render('edit_author_form', compact('pageTitle', 'author'));
    }

    public function edit_author(){
        if (empty($_POST['name'])) {
            die("Le nom est obligatoire");
        }

        $author_name = $_POST['name'];

        /**
         * Démarage d'une session et récupération de l'id
         */
        \Utils\Session::init_php_session();
        $id = $_SESSION['author_id'];
        \Utils\Session::clean_php_session();

        $this->model->edit($id, $author_name);

        \Utils\Http::redirect("list_authors.php");
    }
}