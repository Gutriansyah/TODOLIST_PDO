<?php

namespace Service {

    use Entity\TodoList;
    use Repository\TodoListRepository;

    interface TodoListService
    {
        function showTodoList(): void;

        function addTodoList(string $todo): void;

        function removeTodoList(int $number): void;
    }


    class TodoListServiceImpl implements TodoListService
    {

        // * property bertipe data repository
        private TodoListRepository $todoListRepository;

        // * constructur berparameter TodoListRepository
        public function __construct(TodoListRepository $todoListRepository)
        {
            $this->todoListRepository = $todoListRepository;
        }

        function showTodoList(): void
        {

            echo " TOOO LIST " . PHP_EOL;
            // * mengambil data dari repository 
            // * data pada class TodolistRepository
            $todoList = $this->todoListRepository->findAll();
            foreach ($todoList as $number => $value) {
                echo $number . " " . $value->getTodo() . PHP_EOL;
            }
        }

        function addTodoList(string $todo): void
        {
            // * memanggil entity
            $todolist = new TodoList($todo);
            // * menjalankan function save untuk menyimpan data
            $this->todoListRepository->save($todolist);
            echo "sukes menambahkan todolist" . PHP_EOL;
        }

        function removeTodoList(int $number): void
        {
            if ($this->todoListRepository->remove($number)) {
                echo "Sukes menghapus todolist";
            } else {
                echo "Gagal menghapus Todolist";
            }
        }
    }
}
