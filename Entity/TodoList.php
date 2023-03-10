<?php

namespace Entity {

    class TodoList
    {
        // * data atau properti yang di butuhkan dalam aplikasi
        private string $todo;

        public function __construct(string $todo = "")
        {
            $this->todo = $todo;
        }

        public function getTodo(): string
        {
            return $this->todo;
        }

        public function setTodo(string $todo): void
        {
            $this->todo = $todo;
        }
    }
}
