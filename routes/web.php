<?php

return [
    '/ping[/]' => [
        'map' => [
            'handler' => function(\Slim\Http\Request  $request, \Slim\Http\Response  $response, $args=[]) {
                $response->getBody()->write("pong");
                return $response;
            },
            'name' => 'api_ping',
            'methods' => ['GET', 'POST'],
            'auth' => false
        ],
    ],
    '/node[/[{node_num}[/]]]' => [
        'get'    => [
            'handler' => 'App\Controllers\NodeController:query',
            'name'    => 'api_get_node',
            'auth'    => true,
            'op_class' => '节点',
            'op_name' => '查询',
        ],
        'post'   => [
            'handler' => 'App\Controllers\NodeController:add',
            'name'    => 'api_add_node',
            'auth'    => true,
            'op_class' => '节点',
            'op_name' => '增加',
        ],
        'delete' => [
            'handler' => 'App\Controllers\NodeController:delete',
            'name'    => 'api_delete_node',
            'auth'    => true,
            'op_class' => '节点',
            'op_name' => '删除',
        ],
        'put'    => [
            'handler' => 'App\Controllers\NodeController:modify',
            'name'    => 'api_modify_node',
            'auth'    => true,
            'op_class' => '节点',
            'op_name' => '修改',
        ],
    ],
];