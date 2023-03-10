<?php

require_once __DIR__ . "/Entity/TodoList.php";
require_once __DIR__ . "/helper/InputHelper.php";
require_once __DIR__ . "/Repository/TodoListRepository.php";
require_once __DIR__ . "/Service/TodoListService.php";
require_once __DIR__ . "/view/TodoListView.php";

use Entity\TodoList;
use Repository\TodoListRepositoryImpl;
use Service\TodoListServiceImpl;
use View\TodoListView;

echo "Aplikasi Todo List " . PHP_EOL;

$Repository = new TodoListRepositoryImpl();
$Service = new TodoListServiceImpl($Repository);
$View = new TodoListView($Service);

$View->showTodoList();
