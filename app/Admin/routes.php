<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Dcat\Admin\Admin;

Admin::routes();

Route::group([
    'prefix'     => config('admin.route.prefix'),
    'namespace'  => config('admin.route.namespace'),
    'middleware' => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');
    $router->resource("product",\App\Admin\Controllers\ProductController::class);
    $router->resource("order",\App\Admin\Controllers\OrderController::class);
    $router->resource("member_level",\App\Admin\Controllers\MemberLevelController::class);

});
