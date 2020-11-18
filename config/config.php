<?php
use app\engine\Request;


return [
    'root_dir' => __DIR__ . "/../",
    'templates_dir' => __DIR__ . "/../views/",
    'controllers_namespaces' => 'app\controllers\\',
    'components' => [
        'db' => [
            'class' => \app\engine\Db::class,
            'driver' => 'mysql',
            'host' => 'localhost',
            'login' => 'root',
            'password' => '',
            'database' => 'shops',
            'charset' => 'utf8'
        ],
        'request' => [
            'class' => Request::class
         ],
        //По хорошему сделать для репозиториев отедьное простое хранилище
        //без reflection
        'basketRepository' => [
            'class' => \app\model\repositories\BasketRepository::class
         ],
        'productRepository' => [
            'class' => \app\model\repositories\ProductRepository::class
         ],
        'userRepository' => [
            'class' => \app\model\repositories\UserRepository::class
         ]

    ]
];