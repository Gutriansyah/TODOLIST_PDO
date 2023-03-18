<?php

namespace View {

    use Helper\InputHelper;
    use Service\TodoListService;

    class TodoListView
    {

        private TodoListService $todoListService;

        public function __construct(TodoListService $todoListService)
        {
            $this->todoListService = $todoListService;
        }

        function showTodoList(): void
        {
            while (true) {
                $this->todoListService->showTodoList();
                echo "Menu :" . PHP_EOL;
                echo " 1. Tambah Todo " . PHP_EOL;
                echo " 2. Hapus Todo " . PHP_EOL;
                echo " x. Keluar " . PHP_EOL;

                $pilihan =  InputHelper::input("pilihan");

                if ($pilihan == "1") {
                    $this->addTodoList();
                } elseif ($pilihan == "2") {
                    $this->removeTodoList();
                } else if ($pilihan == "x") {
                    break;
                } else {
                    echo "Pilihan Tidak Dimengerti" . PHP_EOL;
                }
            }
            echo "sampai jumpa lagi" . PHP_EOL;
        }

        function addTodoList(): void
        {
            echo "menambah todo" . PHP_EOL;

            $input = InputHelper::input("todo (x untuk batal) ");

            if ($input == "x") {
                echo "batal menambahkan list" . PHP_EOL;
            } else {
                $this->todoListService->addTodoList($input);
            }
        }

        function removeTodoList(): void
        {
            echo " menghapus todo";     
            $input = InputHelper::input("nomor (x untuk batalkan)");

            if ($input == "x") {
                echo "  batal menghapus todo";
            } else {
                $this->todoListService->removeTodoList($input);
            }
        }
    }
}
