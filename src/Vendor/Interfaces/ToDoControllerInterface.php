<?php
namespace Vendor\Interfaces;
interface ToDoControllerInterface
{
    public function create(array $post);
    public function complete($index);
    public function delete($index);
}
