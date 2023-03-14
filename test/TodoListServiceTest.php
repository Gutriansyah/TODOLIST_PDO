<?php

require_once __DIR__ . "/../Service/TodoListService.php";
require_once __DIR__ . "/../Entity/TodoList.php";
require_once __DIR__ . "/../Repository/TodoListRepository.php";
require_once __DIR__ . "/../Config/Database.php";

use Config\Database;
use Entity\TodoList;
use Repository\TodoListRepositoryImpl;
use Service\TodoListService;
use Service\TodoListServiceImpl;

function testShowTodoList(): void
{
    $connection = Database::getConnection();
    $repository = new TodoListRepositoryImpl($connection);
    $service = new TodoListServiceImpl($repository);
    $service->showTodoList();

    $connection = null;
}


function testAddTodoList(): Void
{
    $connection = Database::getConnection();
    $Repository = new TodoListRepositoryImpl($connection);
    $service = new TodoListServiceImpl($Repository);
    $service->addTodoList("Parameter kedua");
    $service->addTodoList("Parameter ketiga");
    $service->addTodoList("Parameter keempat");

    $connection = null;
}


function testRemoveTodoList(): Void
{
    $connection = Database::getConnection();
    $repository = new TodoListRepositoryImpl($connection);
    $service = new TodoListServiceImpl($repository);

    $service->removeTodoList(4);
    $service->removeTodoList(5);
    $service->removeTodoList(6);
    $service->removeTodoList(7);
    $service->removeTodoList(8);

    $connection = null;
}

// testAddTodoList(); 
// testRemoveTodoList();
testShowTodoList();
