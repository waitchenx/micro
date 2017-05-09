<?php

require 'vendor/autoload.php';

$setting = require "config/setting.php";

session_start();

$app = new Slim\App($setting);

$container = $app->getContainer();

$container['logger'] = function($container) {
    $logger = new \Monolog\Logger('my_logger');
    $file_handler = new \Monolog\Handler\StreamHandler("../logs/app.log");
    $logger->pushHandler($file_handler);
    return $logger;
};

$container['db'] = function ($container){
    $capsule = new \Illuminate\Database\Capsule\Manager;
    $capsule->addConnection($container['settings']['db']);

    $capsule->setAsGlobal();
    $capsule->bootEloquent();

    return $capsule;
};

$routes = require 'routes/web.php';
require 'app/route.php';

foreach($routes as $url=>$route){
    foreach($route as $key=>$value){
        switch (strtolower($key)){
            case 'get':
                Route::get();
                break;
            case 'post':
                Route::post();
                break;
            case 'put':
                Route::put();
                break;
            case 'delete':
                Route::delete();
                break;
            case 'head':
                Route::head();
                break;
            case 'patch':
                Route::patch();
                break;
            case 'map':
                Route::map();
                break;
            case 'options':
                Route::
                break;
        }
    }
}
exit;

$app->run();