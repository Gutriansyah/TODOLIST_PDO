<?php

namespace Repository {

    use Entity\TodoList;

    interface TodoListRepository
    {
        function save(TodoList $todoList): void;

        function remove(int $number): bool;

        function findAll(): array;
    }


    // * class untuk menyimpan/mengelola data
    class TodoListRepositoryImpl implements TodoListRepository
    {

        public array $todolist = array();

        // * menyimpan todolist
        function save(TodoList $todolist): void
        {
            $number = sizeof($this->todolist) + 1;
            $this->todolist[$number] = $todolist;
        }

        function remove(int $number): bool
        {

            if ($number > sizeof($this->todolist)) {
                return false;
            }

            for ($i = $number; $i < sizeof($this->todolist); $i++) {
                $this->todolist[$i] = $this->todolist[$i + 1];
            }

            unset($this->todolist[sizeof($this->todolist)]);
            return true;
        }

        // * menampilkan semua data
        function findAll(): array
        {
            // * mengambil semua nilai poperty todolis
            return $this->todolist;
        }
    }
}
