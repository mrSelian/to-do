<?php

namespace Vendor;

use App\Repositories\ToDoRepository;
use Vendor\Interfaces\ToDoRepositoryInterface;
use Vendor\Interfaces\ViewInterface;

class Kernel
{
    protected $bindings = [];
    protected $config = [];
    protected $routes = [];

    public function withBindings(array $bindings)
    {
        $this->bindings = $bindings;
        return $this;
    }

    public function withConfig(array $config)
    {
        $this->config = $config;
        return $this;
    }

    public function withRoutes(array $routes)
    {
        $this->routes = $routes;
        return $this;
    }

    public function run()
    {
        $container = (new Container())->bindAll($this->bindings);
        $config = (new Config())->setAll($this->config);
        $router = (new Router())->registerAll($this->routes);

        $container
            ->bind(Config::class, $config)
            ->bind(Router::class, $router)
            ->bind(ViewInterface::class, fn() => new View($config->get('templates.path')))
            ->bind(ToDoRepositoryInterface::class, fn()=> new ToDoRepository($config->get('posts.source')));

        $handler = $router->match();
        if (is_array($handler)) {
            $controller = $container->make($handler[0]);
            $action = $handler[1];
            $handler = fn() => $controller->$action();
        }
        return $handler();
    }
}
