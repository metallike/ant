<?php declare(strict_types=1);

namespace Ant\Core\Framework\Routing;

use Symfony\Component\Config\Loader\Loader;
use Symfony\Component\Routing\RouteCollection;

class AttributeRouteLoader extends Loader
{
    private bool $isLoaded = false;
    private RouteCollector $collector;

    public function __construct(RouteCollector $collector)
    {
        $this->collector = $collector;

        parent::__construct();
    }

    public function load(mixed $resource, string $type = null): RouteCollection
    {
        if (true === $this->isLoaded) {
            throw new \RuntimeException('mäh!');
        }

        $routes = new RouteCollection();

        foreach ($this->collector->getControllers() as $controller) {
            #dd($controller::class);

            $routes->addCollection(
                $this->import($controller::class, 'attribute')
            );
        }

        return $routes;
    }

    /**
     * @param mixed       $resource
     * @param string|null $type
     *
     * @return bool
     */
    public function supports(mixed $resource, string $type = null): bool
    {
        return 'ant_attributes' === $type;
    }
}