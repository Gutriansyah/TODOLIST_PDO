<?php

require_once __DIR__ . "/Entity/TodoList.php";
require_once __DIR__ . "/helper/InputHelper.php";
require_once __DIR__ . "/Repository/TodoListRepository.php";
require_once __DIR__ . "/Service/TodoListService.php";
require_once __DIR__ . "/view/TodoListView.php";
require_once __DIR__ . "/Config/Database.php";

use Config\Database;
use Entity\TodoList;
use Repository\TodoListRepositoryImpl;
use Service\TodoListServiceImpl;
use View\TodoListView;

echo "  " . PHP_EOL;
echo "___APLIKASI TODO LIST___ " . PHP_EOL;
echo "------------------------ " . PHP_EOL;

$connection = Database::getConnection();
$Repository = new TodoListRepositoryImpl($connection);
$Service = new TodoListServiceImpl($Repository);
$View = new TodoListView($Service);

$View->showTodoList();

$connection = null;
