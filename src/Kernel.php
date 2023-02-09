<?php

namespace Ant;

use Ant\Core\Framework\Controller;
use Ant\Core\Framework\Routing\DependencyInjection\Compiler\RouteCollectorPass;
use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\DependencyInjection\Compiler\PassConfig;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;

class Kernel extends BaseKernel
{
    use MicroKernelTrait;

    protected function build(ContainerBuilder $container): void
    {
        $container->registerForAutoconfiguration(Controller::class)
            ->addTag('ant.controller');
        $container->registerForAutoconfiguration(LoaderInterface::class)
            ->addTag('routing.loader');


        $container->addCompilerPass(new RouteCollectorPass(), PassConfig::TYPE_BEFORE_OPTIMIZATION, 1);
    }
}
