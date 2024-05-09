<?php

// require_once './libraries/controllers/BookController.php';
// $controller = new \Controllers\BookController;
// $controller->index();
// -----------------------------------------------

if (!isset($_SERVER['PATH_INFO'])){
    include __DIR__.'/libraries/controllers/BookController.php';
    $controller = new \Controllers\BookController;
    $controller->index();
 // ramener la vue
 // erreur    include __DIR__.'/../templates/accueil.php';
// a faire dans le controlleur

}

else{
    echo "erreur 404";
}
?>