<?php

namespace Framework;

use Framework\Router\Route;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Expressive\Router\FastRouteRouter;
use Zend\Expressive\Router\Route as ZendRoute;

/**
 * Class Router
 * Register and match routes
 */
class Router
{

    /**
     * @var FastRouteRouter
     */
    private $router;

    public function __construct()
    {
        $this->router = new FastRouteRouter();
    }

    /**
     * @param  string           $path
     * @param  string|callable  $callable
     * @param  string           $name
     */
    public function get(string $path, $callable, string $name)
    {
        $this->router->addRoute(new ZendRoute($path, $callable, ['GET'], $name));
    }

    /**
     * @param  ServerRequestInterface $request
     * @return Route | null
     */
    public function match(ServerRequestInterface $request): ?Route
    {
        $result = $this->router->match($request);
        if ($result->isSuccess()) {
            return new Route(
                $result->getMatchedRouteName(),
                $result->getMatchedMiddleware(),
                $result->getMatchedParams()
            );
        }
        return null;
    }

    public function generateUri(string $name, array $params): ?string
    {
        return $this->router->generateUri($name, $params);
    }
}
