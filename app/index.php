<?php
require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();
$app['debug'] = true;
$redis = new Predis\Client('tcp://redis:6379');

$app->get('/', function() use($redis) {
    $redis->incr('views');
    return "This page has been seen {$redis->get('views')} times";
});

$app->run();
