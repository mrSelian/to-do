<?php

use App\Interfaces\ToDoAppServiceInterface;
use App\Interfaces\ToDoRepositoryInterface;
use App\Repositories\ToDoRepository;
use App\Services\ToDoAppService;
use Vendor\Config;
use Vendor\Container;
use Vendor\Interfaces\ConfigInterface;
use Vendor\Interfaces\RouterInterface;
use Vendor\Router;



return [

    RouterInterface::class=> Router::class,
    ConfigInterface::class=> Config::class,
    ToDoAppServiceInterface::class => ToDoAppService::class,
    ToDoRepositoryInterface::class => function (Container $container){
    $config = $container->make(ConfigInterface::class);
    return new ToDoRepository ($config->get('posts.source'));
    }
];
