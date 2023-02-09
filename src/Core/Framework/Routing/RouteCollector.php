<?php declare(strict_types=1);

namespace Ant\Core\Framework\Routing;

use Ant\Core\Framework\Controller;

class RouteCollector
{
    /**
     * @var Controller[]
     */
    private array $controllers;

    public function addController(Controller $controller): void
    {
        $this->controllers[] = $controller;
    }

    public function getControllers(): array
    {
        return $this->controllers;
    }
}