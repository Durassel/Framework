<?php

use \App\Blog\BlogModule;
use function \DI\object;
use function \DI\get;

return [
    'blog.prefix'       => '/blog',
    BlogModule::class   => object()->constructorParameter('prefix', get('blog.prefix'))
];
