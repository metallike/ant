# 2023-02-09 - Custom route loader

## Context

Symfony's [built-in route loaders](https://symfony.com/doc/current/routing/custom_route_loader.html#built-in-route-loaders) are not able to correctly handle controllers
stored in various directories and levels. Using the standard loader would
result in an overload of configuration effort and would not be practicable 
with regard to the extensibility of the code.

## Decision

A custom route loader is created that automatically loads all routes
created as **attributes** in controllers that extend from `Ant\Core\Framework\Controller`.
It does not matter in which directory level the controller is located.

## Consequences

It must be ensured that the routes for plugins are only loaded if the plugin is active.