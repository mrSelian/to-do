<?php
namespace App\Interfaces;

interface ToDoAppServiceInterface
{
    public function create(array $post);
    public function complete($index);
    public function delete($index);
}
