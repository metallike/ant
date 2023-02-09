<?php declare(strict_types=1);

namespace Ant\Core\Framework\Routing\DependencyInjection\Compiler;

use Ant\Core\Framework\Routing\RouteCollector;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class RouteCollectorPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container): void
    {
        if (!$container->has(RouteCollector::class)) {
            return;
        }

        $definition = $container->findDefinition(RouteCollector::class);

        $routingDefinitions = $container->findTaggedServiceIds('ant.controller');

        foreach ($routingDefinitions as $id => $tags) {
            $definition->addMethodCall('addController', [new Reference($id)]);
        }
    }
}