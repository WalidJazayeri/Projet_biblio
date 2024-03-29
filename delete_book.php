<?php
$title = 'Supression du livre';
include 'header.php';


if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id']) )
{
    $idBook = $_GET['id'];
    $query = "  DELETE FROM book AS b
                WHERE b.id = :idprotege";
    $statement = $pdo->prepare($query);
    $statement->bindValue(':idprotege', $idBook, \PDO::PARAM_INT);
    $statement->execute();
    $book = $statement->fetch(PDO::FETCH_ASSOC);
}
include 'footer.php';
?>