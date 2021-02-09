<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    // return $router->app->version();
    return redirect()->route('security.report.index');
});

// API v1
// SPLIT 3 GROUP FOR DEVELOPING
/*$router->group(['prefix' => 'api/v1', 'namespace' => 'v1'], function () use ($router) {
    // Security
    $router->group(['prefix' => 'security', 'namespace' => 'Security'], function () use ($router) {
        // Code start from here
    });
    // Owner
    $router->group(['prefix' => 'owner', 'namespace' => 'Owner'], function () use ($router) {
        // Code start from here
    });
    // Client
    $router->group(['prefix' => 'owner', 'namespace' => 'Client'], function () use ($router) {
        // Code start from here
    });
});*/

// API v1 Security
$router->group(['prefix' => 'api/v1'], function () use ($router) {
    $router->group(['prefix' => 'security', 'namespace' => 'Security'], function () use ($router) {
        $router->group(['prefix' => 'report'], function () use ($router) {
            $router->get('/', ['uses' => 'ReportController@index', 'as' => 'security.report.index']);
            $router->post('/store', ['uses' => 'ReportController@store', 'as' => 'security.report.store']);
        });
        $router->group(['prefix' => 'broadcast'], function () use ($router) {
            $router->get('/', ['uses' => 'BroadcastController@index', 'as' => 'security.broadcast.index']);
        });
    });
});

// API v1 Owner
$router->group(['prefix' => 'api/v1', 'namespace' => 'v1'], function () use ($router) {
    $router->group(['prefix' => 'owner', 'namespace' => 'Owner'], function () use ($router) {
        // Code start from here
    });
});

// API v1 Client
$router->group(['prefix' => 'api/v1', 'namespace' => 'v1'], function () use ($router) {
    $router->group(['prefix' => 'owner', 'namespace' => 'Client'], function () use ($router) {
        // Code start from here
    });
});