<?php

use Vendor\Config;
use Vendor\Interfaces\ConfigInterface;
use Vendor\Interfaces\RouterInterface;
use Vendor\Router;


return [

    RouterInterface::class=> Router::class,
    ConfigInterface::class=> Config::class,
];
