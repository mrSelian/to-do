<?php
namespace App\Interfaces;
interface ToDoRepositoryInterface
{
    public function getAll();
    public function getById($id);
    public function saveAll(array $posts);
}
