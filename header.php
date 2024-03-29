<?php
echo '<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>'.$title.'</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
  </head>

<body>
<h1 class="h1">'.$title.'</h1>
<hr>
<a href="index.php">Accueil</a>
<a href="list.php">Liste des livres</a>
<div>
    <a href="todo.php">Todo List</a>
</div>';

require_once 'connec.php';
$pdo = new \PDO(DSN, USER, PASS);

?>