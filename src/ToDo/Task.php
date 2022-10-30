<?php
declare(strict_types=1);
namespace App\ToDo;

class Task {
    private string $id;
    public function __construct(
        private string $title,
        private string $description,
        private string $status = 'active'
    ){
        $this->id = uniqid(more_entropy: true);
    }

    public function id():string{
        return $this->id;
    }

    public function title():string {
        
        return $this->title;
    }
    public function description():string {
        
        return $this->description;
    }
    public function status():string {
        
        return $this->status;
    }
    public function done():void {
        $this->status = 'done';
    }
    public function isActive():bool {
        return ($this->status=='active');
    }
}