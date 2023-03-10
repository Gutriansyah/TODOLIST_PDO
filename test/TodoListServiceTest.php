<?php

require_once __DIR__ . "/../Service/TodoListService.php";
require_once __DIR__ . "/../Entity/TodoList.php";
require_once __DIR__ . "/../Repository/TodoListRepository.php";

use Entity\TodoList;
use Repository\TodoListRepositoryImpl;
use Service\TodoListService;
use Service\TodoListServiceImpl;

function testShowTodoList(): void
{

    // * membuat object dari class repository
    $todoListRepository = new TodoListRepositoryImpl;

    // * mengakses property dari class repository
    $todoListRepository->todolist[1] = new TodoList("Belajar PHP");
    $todoListRepository->todolist[2] = new TodoList("belajar PHP OOP");
    $todoListRepository->todolist[3] = new TodoList("belajar PHP database");

    // * membuat object dari class service impl -> yang memiliki parameter bertipe data repository
    $todoListService = new TodoListServiceImpl($todoListRepository);

    // * menjalankan function show todo list dari class service
    $todoListService->showTodoList();
}

// * test memanggil function dan running code program
// testShowTodoList();



function testAddTodoList(): Void
{
    $todoListRepository = new TodoListRepositoryImpl;

    $todoListService = new TodoListServiceImpl($todoListRepository);

    $todoListService->addTodoList("test 1");
    $todoListService->addTodoList("test 1");
    $todoListService->addTodoList("test 1");
    $todoListService->addTodoList("test 1");

    $todoListService->showTodoList();
}


function testRemoveTodoList(): Void
{
    $todoListRepository = new TodoListRepositoryImpl;

    $todoListService = new TodoListServiceImpl($todoListRepository);

    $todoListService->addTodoList("test 1");
    $todoListService->addTodoList("test 2");
    $todoListService->addTodoList("test 3");
    $todoListService->addTodoList("test 4");

    $todoListService->showTodoList();

    $todoListService->removeTodoList(3);

    $todoListService->showTodoList();
    $todoListService->removeTodoList(5);
}

testRemoveTodoList();


// function testAddTodoList(): void
// {

//     // * membuat object dari class repository
//     $todoListRepository = new TodoListRepositoryImpl;

//     // * membuat object dari class service impl -> yang memiliki parameter bertipe data repository
//     $todoListService = new TodoListServiceImpl($todoListRepository);

//     $todoListService->addTodoList("belajar php");
//     $todoListService->addTodoList("psing belajar php");
//     $todoListService->addTodoList("list terakhir");

//     // * menjalankan function show todo list dari class service
//     $todoListService->showTodoList();
// }

// // * test memanggil function dan running code program
// testAddTodoList();
