<?php

namespace App\Controllers;

use Vendor\Interfaces\ToDoRepositoryInterface;
use Vendor\Interfaces\ViewInterface;


class PageController
{
    protected ViewInterface $view;
    protected ToDoRepositoryInterface $toDoRepository;

    public function __construct(ViewInterface $view, ToDoRepositoryInterface $toDoRepository)
    {
        $this->view = $view;
        $this->toDoRepository=$toDoRepository;

    }

    public function completed()
    {
            return $this->view->render('completed', [
                'title' => 'My To-Do List (завершённые задачи)',
                'posts' => $this->toDoRepository->getAll()
            ]);
    }

    public function index()
    {
        return $this->view->render('index', [
            'title' => 'My To-Do List',
            'posts' => $this->toDoRepository->getAll()
        ]);
    }
    
    public function create()
    {
        $this->toDoRepository->create([
            'id' => uniqid(),
            'title' => $_POST['title'] ?? '',
            'text' => $_POST['text'] ?? '',
            'completed' => false,
        ]);

        header('Location: /');
        exit;
    }
    
    public function complete()
    {
        $index = $_GET['index'] ?? null;
        
        $this->toDoRepository->complete($index);
        
        header('Location: /');
        exit;
    }
    
    public function delete()
    {
        $index = $_GET['index'] ?? null;

        $this->toDoRepository->delete($index);

        header('Location: /');
        exit;
    }
}
