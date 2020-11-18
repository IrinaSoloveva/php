<?php
session_start();

use app\engine\App;


include "../config/config.php";
include "../vendor/autoload.php";
$config = include __DIR__ . "/../config/config.php";


try {
    App::call()->run($config);
} catch (Exception $e) {
    var_dump($e);
}

