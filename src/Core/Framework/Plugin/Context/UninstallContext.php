<?php declare(strict_types=1);

namespace Ant\Core\Framework\Plugin\Context;

use Ant\Core\Framework\Plugin;

class UninstallContext extends InstallContext
{
    private bool $keepData;

    public function __construct(Plugin $plugin, string $pluginVersion, bool $keepData)
    {
        parent::__construct($plugin, $pluginVersion);
        $this->keepData = $keepData;
    }

    public function keepData(): bool
    {
        return $this->keepData;
    }
}