<?php declare(strict_types=1);

namespace Ant\Core\Framework;


use Ant\Core\Framework\Plugin\Context\InstallContext;
use Ant\Core\Framework\Plugin\Context\UninstallContext;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

abstract class Plugin extends Bundle
{
    private bool $active;

    final public function isActive(): bool
    {
        return $this->active;
    }

    public function install(InstallContext $context): void
    {

    }

    public function postInstall(InstallContext $context): void
    {

    }

    public function update(): void
    {

    }

    public function postUpdate(): void
    {

    }

    public function activate(): void
    {

    }

    public function deactivate(): void
    {

    }

    public function uninstall(UninstallContext $context): void
    {

    }

    public function configureRoutes(RoutingConfigurator $routingConfigurator): void
    {
        if (!$this->isActive()) {
            return;
        }

        parent::configureRoutes($routingConfigurator);
    }
}