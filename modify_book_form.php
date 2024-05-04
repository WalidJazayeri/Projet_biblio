<?php

$title = 'Modifier un livre';
include './header.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id']) )
{
    $_GET['book_name'] = urldecode($_GET['book_name']);

    $idBook = $_GET['id'];
    $book_name = $_GET['book_name'];
    $publication_date = $_GET['publication_date'];
    $category = $_GET['category'];
    $author = $_GET['author'];

    //Recuperez le categorie ID
    $query = "  SELECT category.id, category.name
                FROM category";
    $statement = $pdo->query($query);
    $categories = $statement->fetchAll();
    //

    //Recuperer l'id de l'auteur
    $query = "  SELECT author.id, author.name
                FROM author";
    $statement = $pdo->query($query);
    $authors = $statement->fetchAll();
    //

    echo '<form action="confirm_modify_book.php" method="post">
            <div>
                <label for="">Nom du livre</label>
                <input type="text" name="book_name" value="'.$book_name.'">
            </div>
            <div>
                <label for="">Date de publication</label>
                <input type="text" name="publication_date" value="'.$publication_date.'">
            </div>
            <div>
                <label for"">Catégorie</label>
                <select name="category_id" id=""> ';
                for($i = 0; $i < count($categories); $i++){
                    echo '<option value="'.$categories[$i]['id'].'">'.$categories[$i]['name'].'</option>';
                }
    echo '
                </select>
            </div>
            <div>
                <label for="">Auteur</label>
                <select name="author_id" id=""> ';
                for($i = 0; $i < count($authors); $i++){
                    echo '<option value="'.$authors[$i]['id'].'">'.$authors[$i]['name'].'</option>';
                }
    echo '
                </select>
            </div>
            <div>
                <input type="submit">
            </div>
        </form>';
        $_SESSION['book_id']= $idBook;
}


include 'footer.php';
?>