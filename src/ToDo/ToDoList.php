<?php
declare(strict_types=1);
namespace App\ToDo;

class ToDoList {
    public function __construct(
        private array $tasks = []        
    ){}

    public function addTask(Task $task):void {
        $this->tasks[]=$task;
    }

    public function tasks():array {
        return $this->tasks;
    }
    public function markAsDone(string $taskId){
        $count=count($this->tasks);
        for ($i=0;$i<$count;$i++){            
            if ($this->tasks[$i]->id() === $taskId) {
                $this->tasks[$i]->done();
                break;
            }
        }        
    }
    
    public function remove(string $taskId){
        $count=count($this->tasks);
        for ($i=0;$i<$count;$i++){            
            if ($this->tasks[$i]->id() === $taskId) {
                unset($this->tasks[$i]);                                
                break;
            }
        }
        $this->tasks = array_values($this->tasks);
    }

    
}