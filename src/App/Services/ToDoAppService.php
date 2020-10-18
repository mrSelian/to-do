<?php

namespace App\Services;

use App\Interfaces\ToDoAppServiceInterface;
use App\Interfaces\ToDoRepositoryInterface;
use App\ToDo;

class ToDoAppService implements ToDoAppServiceInterface

{
    protected ToDoRepositoryInterface $toDoRepository;

    public function __construct(ToDoRepositoryInterface $toDoRepository)
    {
        $this->toDoRepository = $toDoRepository;
    }

    public function create(array $post)
    {
        $posts = $this->toDoRepository->getAll();
        array_unshift($posts, $post);
        $this->toDoRepository->saveAll($posts);
    }

    public function complete($index)
    {
        $posts = $this->toDoRepository->getAll();
        foreach ($posts as $prop => &$post) {
            if ($post['id'] == $index) {
                $todo = new ToDo($post);
                $todo->completable();
                $post['status'] = 'Ожидает Подтверждения';
                $post['end_date'] = date("Y-n-j");
            }
            $this->toDoRepository->saveAll($posts);
        }
    }

    public function verify($index)
    {
        $posts = $this->toDoRepository->getAll();
        foreach ($posts as $prop => &$post) {
            if ($post['id'] == $index) {
                $todo = new ToDo($post);
                $todo->verifiable();
                $post['status'] = 'Завершено';
                $post['completed'] = true;
            }
            $this->toDoRepository->saveAll($posts);
        }
    }

    public function delete($index)
    {
        $posts = $this->toDoRepository->getAll();
        foreach ($posts as $prop => &$post) {
            if ($post['id'] == $index) {
                $todo = new ToDo($post);
                $todo->deletable();
            }
        }
        array_splice($posts, $index, 1);
        $this->toDoRepository->saveAll($posts);

    }

}