<?php

$router->group(['prefix' => 'api'], function () use ($router) {

    $router->group(['prefix' => 'auth'], function () use ($router) {{
        $router->post('login', ['uses' => 'Api\AuthController@login']);
        $router->post('logout', ['uses' => 'Api\AuthController@logout']);
        $router->get('check', ['uses' => 'Api\AuthController@check']);
        //$router->post('refresh', ['uses' => 'Api\AuthController@refresh']);
        //$router->post('me', ['uses' => 'Api\AuthController@me']);
    }});

    
});
