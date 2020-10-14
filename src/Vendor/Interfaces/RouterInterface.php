<?php
namespace Vendor\Interfaces;
interface RouterInterface
{
    public function register($url, $callback);
    public function registerAll(array $routes);
    public function match();
}
