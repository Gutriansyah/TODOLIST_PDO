<?php

require_once __DIR__ . "/../Service/TodoListService.php";
require_once __DIR__ . "/../Entity/TodoList.php";
require_once __DIR__ . "/../Repository/TodoListRepository.php";
require_once __DIR__ . "/../view/TodoListView.php";
require_once __DIR__ . "/../helper/InputHelper.php";

use Repository\TodoListRepositoryImpl;
use Service\TodoListServiceImpl;
use View\TodoListView;

function testViewShowTodolist()
{
    $repos = new TodoListRepositoryImpl();
    $service = new TodoListServiceImpl($repos);
    $view = new TodoListView($service);

    $service->addTodoList("Siji");
    $service->addTodoList("Loro");
    $service->addTodoList("Telu");

    $view->showTodoList();
}


function testViewAddTodolist()
{
    $repos = new TodoListRepositoryImpl();
    $service = new TodoListServiceImpl($repos);
    $view = new TodoListView($service);

    $service->addTodoList("Siji");
    $service->addTodoList("Loro");
    $service->addTodoList("Telu");

    $view->addTodoList();

    $view->showTodoList();
}

function testViewRmoveTodolist()
{
    $repos = new TodoListRepositoryImpl();
    $service = new TodoListServiceImpl($repos);
    $view = new TodoListView($service);

    $service->addTodoList("Siji");
    $service->addTodoList("Loro");
    $service->addTodoList("Telu");

    $view->addTodoList();

    $view->showTodoList();
}

testViewAddTodolist();
