<?php

use App\Repositories\ToDoRepository;
use Vendor\Config;
use Vendor\Interfaces\ConfigInterface;
use Vendor\Interfaces\RouterInterface;
use Vendor\Interfaces\ToDoRepositoryInterface;
use Vendor\Router;


return [

    RouterInterface::class=> Router::class,
    ConfigInterface::class=> Config::class,
    ToDoRepositoryInterface::class=> ToDoRepository::class

];
