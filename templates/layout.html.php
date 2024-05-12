<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="./../style.css">
    <title>Ma superbe Bibliothèque - <?= $pageTitle ?></title>
</head>

<body>
    <h1><?= $pageTitle ?></h1>
    <a href="index.php">Liste des livres</a>
    <a href="list_authors.php">Liste des auteurs</a>
    <a href="todo.php">Todo List</a>
    <?= $pageContent ?>
</body>

</html>