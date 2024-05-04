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

    public function find(int $id){
        $query = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE id = :id");

        // On exécute la requête en précisant le paramètre :article_id
        $query->execute(['id' => $id]);

        // On fouille le résultat pour en extraire les données réelles de l'article
        $item = $query->fetch();
        return $item;
    }
}
?>