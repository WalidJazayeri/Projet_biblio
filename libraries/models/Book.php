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

    public function find(int $id)
    {
        $pdo = \Utils\Database::getPdo();
        $query = "  SELECT b.name AS book_name, b.publication_date, c.name AS category, a.name AS author
                    FROM book AS b
                    JOIN category AS c ON c.id = b.category_id
                    JOIN author AS a ON a.id = b.author_id
                    WHERE b.id = :idprotege";
        $statement = $pdo->prepare($query);
        $statement->bindValue(':idprotege', $id, \PDO::PARAM_INT);
        $statement->execute();
        $book = $statement->fetch();
        return $book;
    }

    public function delete(int $id): void
    {
        $pdo = \Utils\Database::getPdo();
        $query = "  DELETE FROM book
                    WHERE book.id = :idprotege";
        $statement = $pdo->prepare($query);
        $statement->bindValue(':idprotege', $id, \PDO::PARAM_INT);
        $statement->execute();
    }
}
?>