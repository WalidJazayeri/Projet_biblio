<?php
namespace Controllers;

require_once './libraries/utils/Renderer.php';

class TodoController
{
    public function show(){
        $pageTitle = "Liste des tâches";
        \Utils\Renderer::render('todo', compact('pageTitle'));
    }
}