<?php
namespace Vendor\Interfaces;
interface ConfigInterface
{
    public function setAll(array $items);
    public function get($name, $default = null);
}
