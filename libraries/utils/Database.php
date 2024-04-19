<?php
namespace Utils;

use PDO;

require_once './libraries/connec.php';

class Database
{
    public static function getPdo(): PDO
    {
        $pdo = new PDO('mysql:host=localhost;dbname='.DSN.';charset=utf8', ''.USER.'', ''.PASS.'', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);

    return $pdo;
    }
}
?>