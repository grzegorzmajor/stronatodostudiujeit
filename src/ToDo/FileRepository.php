<?php
declare(strict_types=1);

namespace App\ToDo;


class FileRepository {
    private string $filePath;

    public function __construct() {
        $this->filePath = APP_DIR . '/../data/todo.storage';
    }

    public function save(ToDoList $list): void {       
        file_put_contents($this->filePath, serialize($list));
    }
    public function get():ToDoList {
        $list = file_get_contents($this->filePath);
        $list = unserialize($list);
        if (!$list) {
            $list = new ToDoList();
        }
        return $list;    
    }
}