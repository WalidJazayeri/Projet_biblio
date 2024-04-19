<?php
namespace Models;
require_once './libraries/utils/Database.php';
class Book
{
    public function findAll()
    {
        $pdo = \Utils\Database::getPdo();
        $query = "SELECT * FROM book";
        $statement = $pdo->query($query);
        $books = $statement->fetchAll();
        return $books;
    }
}
?>