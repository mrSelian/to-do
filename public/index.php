<?php

require_once __DIR__ . '/../autoload.php';

use Vendor\Kernel;

session_start();

$kernel = (new Kernel())
    ->withBindings(require_once __DIR__ . '/../bindings.php')
    ->withConfig(require_once __DIR__ . '/../config.php')
    ->withRoutes(require_once __DIR__ . '/../routes.php');

try {
    echo $kernel->run();
} catch (\Throwable $exception) {
    echo $exception->getMessage();
}
