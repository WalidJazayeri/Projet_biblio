<?php
$title = 'Supression du livre';
include 'header.php';


if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id']) )
{
    $idBook = $_GET['id'];
    $query = "  DELETE FROM book
                WHERE book.id = :idprotege";
    $statement = $pdo->prepare($query);
    $statement->bindValue(':idprotege', $idBook, \PDO::PARAM_INT);
    $statement->execute();
}
include 'footer.php';
?>