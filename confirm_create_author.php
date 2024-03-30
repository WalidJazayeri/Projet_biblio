<?php
$title = 'Confirmation de création de l\'auteur';
include './header.php';
var_dump($_POST);
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['author_name']) ){
    $author_name = $_POST['author_name'];
    $query = "  INSERT INTO author (`name`)
    VALUES (:nameprotected,);";
    $statement = $pdo->prepare($query);
    $statement->bindValue(':nameprotected', $author_name, \PDO::PARAM_STR);
    $statement->execute();
    echo "<p>Auteur Crée (redirection en cours...)</p>";
    header('refresh:3;url=list_authors.php');
}

include './footer.php';
?>