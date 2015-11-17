<?php
require_once __DIR__.'/../vendor/autoload.php';
$app['debug'] = true;

$app = new Silex\Application();

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../src/Resources/views',
));

$app->get('/', function() use ($app) {
    return $app['twig']->render('index.twig', []);
});

$app->run();