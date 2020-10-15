<?php

namespace App\Repositories;

use Vendor\Interfaces\ToDoRepositoryInterface;

class ToDoRepository implements ToDoRepositoryInterface
{
    protected $postSource;

    public function __construct($postSource)
    {
        $this->postSource = $postSource;
    }

    public function getAll()
    {
        return json_decode(file_get_contents($this->postSource), true);
    }

    public function getById($id)
    {
        $posts = $this->getAll();
        foreach ($posts as $post) {
            if ($post['id'] == $id) return $post;
        }
        return null;
    }


    public function saveAll(array $posts)
    {
        file_put_contents($this->postSource, json_encode($posts, JSON_UNESCAPED_UNICODE));
    }
}
