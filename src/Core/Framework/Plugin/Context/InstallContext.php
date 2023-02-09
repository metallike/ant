<?php declare(strict_types=1);

namespace Ant\Core\Framework\Plugin\Context;

use Ant\Core\Framework\Plugin;

class InstallContext
{
    private Plugin $plugin;
    private string $pluginVersion;

    public function __construct(Plugin $plugin, string $pluginVersion)
    {
        $this->plugin = $plugin;
        $this->pluginVersion = $pluginVersion;
    }

    public function getPlugin(): Plugin
    {
        return $this->plugin;
    }

    public function getCurrentPluginVersion(): string
    {
        return $this->pluginVersion;
    }
}