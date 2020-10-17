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

    public function index()
    {
        return $this->view->render('index', [
            'title' => 'My To-Do List',
            'posts' => $this->toDoRepository->getAll()
        ]);
    }

}
