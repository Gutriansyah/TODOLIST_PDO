<?php

namespace Repository {

    use Entity\TodoList;
    use PDO;

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

        private PDO $connection;

        public function __construct(PDO $connection)
        {
            $this->connection = $connection;
        }

        // * menyimpan todolist
        function save(TodoList $todolist): void
        {
            $sql = "INSERT INTO todolist(TODO) VALUES(?) ";
            $statment = $this->connection->prepare($sql);
            $statment->execute([$todolist->getTodo()]);
        }


        function remove(int $number): bool
        {


            $sql = "SELECT id FROM todolist WHERE id = ?";
            $statment = $this->connection->prepare($sql);
            $statment->execute([$number]);

            if ($statment->fetch()) {
                $sql = "DELETE FROM todolist WHERE id = ?";
                $statment = $this->connection->prepare($sql);
                $statment->execute([$number]);
                // echo "data berhasil di hapus";
                return true;
            } else {
                // echo "nomot tidak valid atau tida k di temukan";
                return false;
            }
        }


        // * menampilkan semua data
        function findAll(): array
        {
            $sql = "SELECT id, TODO FROM todolist";
            $statment = $this->connection->prepare($sql);
            $statment->execute();

            $result = [];
            foreach ($statment as $row) {
                $todolist = new TodoList();
                $todolist->setId($row["id"]);
                $todolist->setTodo($row["TODO"]);
                $result[] = $todolist;
            }
            return $result;
        }
    }
}
