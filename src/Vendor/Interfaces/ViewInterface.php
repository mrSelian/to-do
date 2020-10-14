<?php
namespace Vendor\Interfaces;
interface ViewInterface
{
    public function render($template, array $data = []);
}
