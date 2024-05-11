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
            die("Ho ?! Tu n'as pas précisé l'id de l'article !");
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

        \Utils\Http::redirect("index.php?controller=author&task=index");
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
}