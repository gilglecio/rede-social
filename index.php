<?php

require 'vendor/autoload.php';

$route = \PlugRoute\RouteFactory::create();

$route->get('/teste', function() {
    echo 'basic route';
});

$route->on();