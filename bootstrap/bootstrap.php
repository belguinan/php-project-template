<?php

require dirname(__FILE__) . '/../vendor/autoload.php';

use Illuminate\Config\Repository;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;
use Illuminate\Pagination\AbstractPaginator;
use Illuminate\Database\Capsule\Manager as Capsule;

$app = app();

$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'database_name',
    'username'  => 'database_username',
    'password'  => 'database_password',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
], 'default');

$capsule->setEventDispatcher(new Dispatcher($app));
$capsule->setAsGlobal();
$capsule->bootEloquent();

session_start();

AbstractPaginator::currentPageResolver(function($pageName) {
    return isset($_GET['page']) ? (int) $_GET['page'] : 1;
});