<?php
namespace App\Controllers;

use App\Interfaces\ToDoAppServiceInterface;

class ToDoController
{
    protected ToDoAppServiceInterface $toDoAppService;

    public function __construct(ToDoAppServiceInterface $toDoAppService)
    {
        $this->toDoAppService=$toDoAppService;
    }

    public function create()
    {
        $this->toDoAppService->create([
            'id' => uniqid(),
            'title' => $_POST['title'] ?? '',
            'text' => $_POST['text'] ?? '',
            'creation_date' => date("Y-n-j"),
            'deadline_date' => $_POST['deadline_date'] ?? '',
            'start_date'=> $_POST['start_date'] ?? '',
            'status' => 'В очереди',
            'end_date' => '',
            'completed' => false,
        ]);

        header('Location: /');
        exit;
    }

    public function complete()
    {
        $index = $_GET['index'] ?? null;

        $this->toDoAppService->complete($index);

        header('Location: /');
        exit;
    }

    public function delete()
    {
        $index = $_GET['index'] ?? null;

        $this->toDoAppService->delete($index);

        header('Location: /');
        exit;
    }


}