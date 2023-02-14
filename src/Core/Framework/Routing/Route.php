<?php declare(strict_types=1);

namespace Ant\Core\Framework\Routing;

use Symfony\Component\Routing\Annotation\Route as SymfonyRoute;

/**
 * Annotation class for @Route().
 *
 * @Annotation
 * @NamedArgumentConstructor
 * @Target({"CLASS", "METHOD"})
 */
#[\Attribute(\Attribute::IS_REPEATABLE | \Attribute::TARGET_CLASS | \Attribute::TARGET_METHOD)]
class Route extends SymfonyRoute
{
    public const ADMIN_ROUTE_PATH_PREFIX = '/admin/';
    public const ADMIN_ROUTE_NAME_PREFIX = 'admin';

    private ?string $name = null;

    public function __construct(
        string|array $path = null,
        ?string $name = null,
        private array $requirements = [],
        private array $options = [],
        private array $defaults = [],
        private ?string $host = null,
        array|string $methods = [],
        array|string $schemes = [],
        private ?string $condition = null,
        private ?int $priority = null,
        string $locale = null,
        string $format = null,
        bool $utf8 = null,
        bool $stateless = null,
        private ?string $env = null
    ) {
        if (\is_array($path)) {
            $this->localizedPaths = $path;
        } else {
            $this->path = sprintf('%s%s', self::ADMIN_ROUTE_PATH_PREFIX, 'jo');
        }

        if (\is_array($path)) {
            foreach ($path as $key => $value) {
                $path[$key] = $this->addAdminRoute($value);
            }
        } else {
            $path = $this->addAdminRoute($path);
        }

        $name = $this->modifyAdminRouteName($name);

        parent::__construct(
            $path,
            $name,
            $this->requirements,
            $this->options,
            $this->defaults,
            $this->host,
            $methods,
            $schemes,
            $this->condition,
            $this->priority,
            $locale,
            $format,
            $utf8,
            $stateless,
            $this->env
        );
    }

    private function addAdminRoute(string $path): string
    {
        return sprintf('%s%s', self::ADMIN_ROUTE_PATH_PREFIX, ltrim($path, '/'));
    }

    private function modifyAdminRouteName(?string $name): ?string
    {
        return (null !== $name) ? sprintf('%s.%s', self::ADMIN_ROUTE_NAME_PREFIX, ltrim($name, '.')) : null;
    }
}