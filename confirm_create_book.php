<?php
$title = 'Confirmation de création du livre';
include 'header.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['book_name']) )
{
    $book_name = $_POST['book_name'];
    $publication_date = $_POST['publication_date'];
    $category_id = $_POST['category_id'];
    $author_id = $_POST['author_id'];

    $query = "  INSERT INTO book (`name`, publication_date, category_id, author_id, library_id)
    VALUES (:nameprotected,
            :publicationdateprotected,
            :categoryprotected,
            :authorprotected,
            1);";
    $statement = $pdo->prepare($query);
    $statement->bindValue(':nameprotected', $book_name, \PDO::PARAM_STR);
    $statement->bindValue(':publicationdateprotected', $publication_date, \PDO::PARAM_STR);
    $statement->bindValue(':categoryprotected', $category_id, \PDO::PARAM_INT);
    $statement->bindValue(':authorprotected', $author_id, \PDO::PARAM_INT);
    $statement->execute();
    echo "<p>Livre crée (redirection en cours...)</p>";
    header('refresh:3;url=list_books.php');
}


include 'footer.php';
?>