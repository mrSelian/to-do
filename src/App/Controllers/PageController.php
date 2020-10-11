<?php

namespace App\Controllers;

use App\Repositories\ToDoRepository;

use Vendor\View;

class PageController
{
    protected View $view;
    protected ToDoRepository $toDoRepository;

    public function __construct(View $view, ToDoRepository $toDoRepository)
    {
        $this->view = $view;
        $this->toDoRepository=$toDoRepository;

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
        ]);

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
