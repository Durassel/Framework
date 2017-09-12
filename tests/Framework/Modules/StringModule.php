<?php

namespace Tests\Framework\Modules;

class StringModule
{
	public function __construct(\Framework\Router $router)
	{
		$router->get('/demo', function () {
			return 'DEMO';
		}, 'demo');
	}
}