<?php
if (!isset($_SERVER['PATH_INFO']))
{
    include __DIR__.'/../libraries/controllers/BookController.php';
    $controller = new \Controllers\BookController;
    $controller->index();
}

elseif ($_SERVER['PATH_INFO']=="/index")
{
    echo "erreur 404";
}
else
{
    "Erreur test";
}
?>