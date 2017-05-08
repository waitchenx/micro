<?php

// 获取用户的配置信息.
$database_config = require __DIR__.'/../config/database.php';

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule();
// 这里用于实例化这个类.
$capsule->addConnection($database_config);

$capsule->setAsGlobal();

$capsule->bootEloquent();

// 引入路由功能
$dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $route){
    require __DIR__.'/../routes/route.php';
});

$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];
// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);
$routeInfo = $dispatcher->dispatch($httpMethod, $uri);

switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        // ... 404 Not Found
        header("HTTP/1.1 404 Not Found");
        header("Status: 404 Not Found");
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // ... 405 Method Not Allowed
        header("HTTP/1.1 405 Not Found");
        header("Status: 405 Not Found");
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        // ... call $handler with $vars
        // 这里需要读取并且传递到控制器中去.
        break;
    default:
        die('123412');
}