<?php declare(strict_types=1);

namespace Ant\Core\Framework;

use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpKernel\Bundle\Bundle as SymfonyBundle;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

abstract class Bundle extends SymfonyBundle
{
    public function configureRoutes(RoutingConfigurator $routingConfigurator): void
    {
        $fileSystem = new Filesystem();
        $configDir = $this->getPath() . '/Resources/config';

        if ($fileSystem->exists($configDir)) {
            // todo: import routes
        }
    }
}