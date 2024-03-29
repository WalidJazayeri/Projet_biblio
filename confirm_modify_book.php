<?php
session_start();
$title = 'Confirmation de modification du livre';
include 'header.php';
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['book_name']) )
{
    $book_id = $_SESSION['book_id'];
    $book_name = $_POST['book_name'];
    $publication_date = $_POST['publication_date'];
    $category_id = $_POST['category_id'];
    $author_id = $_POST['author_id'];

    $query = "  UPDATE book
                SET name = :nameprotected ,
                    publication_date = :publicationdateprotected,
                    category_id = :categoryprotected,
                    author_id = :authorprotected
                WHERE book.id = :idprotected";
    $statement = $pdo->prepare($query);
    $statement->bindValue(':idprotected', $_SESSION['book_id'], \PDO::PARAM_INT);
    $statement->bindValue(':nameprotected', $book_name, \PDO::PARAM_STR);
    $statement->bindValue(':publicationdateprotected', $publication_date, \PDO::PARAM_STR);
    $statement->bindValue(':categoryprotected', $category_id, \PDO::PARAM_INT);
    $statement->bindValue(':authorprotected', $author_id, \PDO::PARAM_INT);
    $statement->execute();
    echo "<p>Livre modifié (redirection en cours...)</p>";
    header('refresh:3;url=list.php');
}


include 'footer.php';
?>