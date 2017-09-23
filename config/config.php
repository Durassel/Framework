<?php

use \Framework\Renderer\RendererInterface;
use \Framework\Renderer\TwigRendererFactory;
use \Framework\Router\RouterTwigExtension;
use \Framework\Router;

return [
	'views.path' 				=> dirname(__DIR__) . '/views',
	'twig.extensions'			=> [
		\DI\get(RouterTwigExtension::class)
	],
	Router::class 				=> \DI\object(),
	RendererInterface::class 	=> \DI\factory(TwigRendererFactory::class)
];