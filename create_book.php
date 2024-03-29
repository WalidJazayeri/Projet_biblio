<?php
$title = 'Création d\'un livre';
include 'header.php';

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

echo '  <form action="confirm_create_book.php" method="post">
            <div>
                <label for="">Nom du livre :</label>
                <input type="text" name="book_name">
            </div>
            <div>
                <label for="">Date de publication :</label>
                <input type="text" name="publication_date" placeholder="Format : YYYY/MM/DD">
            </div>
            <div>
                <label for="">Categorie :</label>
                <select name="category_id" id=""> ';
                for($i = 0; $i < count($categories); $i++){
                    echo '<option value="'.$categories[$i]['id'].'">'.$categories[$i]['name'].'</option>';
                }
echo '
                </select>
            </div>
            <div>
                <label for="author">Auteur :</label>
                <select name="author_id" id=""> ';
                for($i = 0; $i < count($authors); $i++){
                    echo '<option value="'.$authors[$i]['id'].'">'.$authors[$i]['name'].'</option>';
                }
echo'
                </select>
            </div>
            <div>
                <input type="submit" value="Rajouter le livre">
            </div>
        </form>';




include 'footer.php';
?>

