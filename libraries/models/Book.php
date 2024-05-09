<?php
namespace Models;
require_once __DIR__.'/../models/Model.php';
class Book extends Model
{
    protected $table = 'book';
    public function findWithJointure(int $id)
    {
        $query = "  SELECT b.name AS book_name, b.publication_date, c.name AS category, a.name AS author
                    FROM book AS b
                    JOIN category AS c ON c.id = b.category_id
                    JOIN author AS a ON a.id = b.author_id
                    WHERE b.id = :idprotege";
        $statement = $this->pdo->prepare($query);
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

    public function edit(int $id, $book_name, $publication_date, $category_id, $author_id){
        $query = "  UPDATE book
            SET name = :nameprotected ,
                publication_date = :publicationdateprotected,
                category_id = :categoryprotected,
                author_id = :authorprotected
            WHERE book.id = :idprotected";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(':idprotected', $id, \PDO::PARAM_INT);
        $statement->bindValue(':nameprotected', $book_name, \PDO::PARAM_STR);
        $statement->bindValue(':publicationdateprotected', $publication_date, \PDO::PARAM_STR);
        $statement->bindValue(':categoryprotected', $category_id, \PDO::PARAM_INT);
        $statement->bindValue(':authorprotected', $author_id, \PDO::PARAM_INT);
        $statement->execute();
    }
}
?>