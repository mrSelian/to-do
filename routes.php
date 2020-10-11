<?php

use App\Controllers\PageController;

return [
    '/' => [PageController::class, 'index'],
    '/create' => [PageController::class, 'create'],
    '/delete' => [PageController::class, 'delete'],
    '/complete' => [PageController::class, 'complete'],
    '/completed' => [PageController::class, 'completed'],
];
