<?php

namespace App\Controllers;

use Interop\Container\ContainerInterface;

/**
 * @package App\Controllers
 */
class Controller
{
    protected $c;

    public function __construct(ContainerInterface $container)
    {
        $this->c = $container;
    }
}
