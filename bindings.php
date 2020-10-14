<?php

use App\Controllers\ToDoController;
use Vendor\Config;
use Vendor\Interfaces\ConfigInterface;
use Vendor\Interfaces\RouterInterface;
use Vendor\Interfaces\ToDoControllerInterface;
use Vendor\Router;


return [

    RouterInterface::class=> Router::class,
    ConfigInterface::class=> Config::class,
    ToDoControllerInterface::class=> ToDoController::class
];
