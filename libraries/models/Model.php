<?php
namespace Models;
require_once './libraries/utils/Database.php';
abstract class Model
{
    protected $pdo;
    protected $table;

    public function __construct()
    {
        $this->pdo = \Utils\Database::getPdo();
    }

    public function findAll()
    {
        $query = "SELECT * FROM {$this->table}";
        $statement = $this->pdo->query($query);
        $items = $statement->fetchAll();
        return $items;
    }
}
?>