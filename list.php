<?php
$title = 'Liste des livres';
include 'header.php';

echo '<button><a href="create_book.php">Ajouter un livre</a></button>';

$query = "SELECT * FROM book";
$statement = $pdo->query($query);
$books = $statement->fetchAll(PDO::FETCH_ASSOC);
echo '<ul>';
    foreach($books as $book) {
        echo    '<li>
                    <a href="details_book.php?id='.$book['id'].'">'.$book['name'].'</a>
                </li>';
    }
echo '</ul>';


include 'footer.php';
?>