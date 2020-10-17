<?php

use App\Controllers\PageController;
use App\Controllers\ToDoController;

return [
    '/' => [PageController::class, 'index'],
    '/create' => [ToDoController::class, 'create'],
    '/delete' => [ToDoController::class, 'delete'],
    '/complete' => [ToDoController::class, 'complete']
];
