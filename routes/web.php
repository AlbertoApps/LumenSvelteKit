<?php
require __DIR__.'/api.php';
/*
$router->get('/', function () use ($router) {
    //return $router->app->version();
    return file_get_contents(public_path('build/index.html'));
});*/

$router->get('/{any:.*}', function ($any) {
    if (preg_match('/^api/', $any)) {
        abort(404);
    }
    return file_get_contents(public_path('build/index.html'));
});

