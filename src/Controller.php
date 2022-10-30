<?php
// ---
// klasa controler obsluguje adresacje strony
// ---
declare(strict_types=1);
namespace App;

use App\ToDo\FileRepository;
use App\ToDo\Task;
use App\ToDo\ToDoList;

class Controller {
    private View $view;
    private FileRepository $repository;

    public function __construct (
        private Request $request,        
    ) {
        $this->view = new View($this->request->action());
        $this->repository = new FileRepository();
    }
    
    public function process():void {
        $action = $this->request->action();       

        if (!method_exists($this,$action)) { //jeżeli moteda o nazwie zapisanej w $action nie istnieje to
            $this->index(); //wywołujemy konkretną motodę zapisaną tu.             
        }
        $this->$action(); //wywołuje metode o nazwie  w parametrze action - czyli do wartosci z param $action dokleja () i wywołuje jako metode
                          //można w ten sposob w zmiennej przekazywac nazwy metod.
    }

    // metody obsługujące konkretne akcje. 
    private function index():void{
        $this->view->render('indx');
    }
    private function list():void{
        $list = $this->repository->get();
        $this->view->render('list',['todoList' => $list]);
    }
    private function add():void{
        if ($this->request->isPost()) {            
            $data = $this->request->postData();
            if (!empty($data['title']) && !empty($data['description'])){
                $todoList = $this->repository->get();
                $task = new Task($data['title'],$data['description']);
                $todoList->addTask($task);
                $this->repository->save($todoList);
                header('Location: /?action=list');
                exit;
            }
        }
        $this->view->render('add');
    }
    private function change():void{
        if ($this->request->isPost()) {
            $data = $this->request->postData();
            if (!empty($data['id'])){
                $todoList = $this->repository->get();
                $todoList->markAsDone($data['id']);
                $this->repository->save($todoList);
            }
        }
        header('Location: /?action=list');
        exit;
    }
    private function remove():void{
        if ($this->request->isPost()) {
            $data = $this->request->postData();
            if (!empty($data['id'])){
                $todoList = $this->repository->get();
                $todoList->remove($data['id']);
                $this->repository->save($todoList);
            }
        }
        header('Location: /?action=list');
        exit;
    }
}