<?php
namespace Models;
require_once './libraries/models/Model.php';
class Author extends Model
{
    protected $table = "author";

    public function add($author_name){
        $query = "INSERT INTO author (`name`)
        VALUES (:nameprotected);";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(':nameprotected', $author_name, \PDO::PARAM_STR);
        $statement->execute();
    }

    public function edit(int $id, $author_name){
        $query = "UPDATE author
            SET name = :nameprotected
            WHERE author.id = :idprotected";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(':idprotected', $id, \PDO::PARAM_INT);
        $statement->bindValue(':nameprotected', $author_name, \PDO::PARAM_STR);
        $statement->execute();
    }
}
?>