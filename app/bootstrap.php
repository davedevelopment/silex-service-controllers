<?php

use Silex\Application;
use Demo\Repository\PostRepository;
use Demo\Controller\PostController;

$app = new Application;

/**
 * Custom controller resolver
 */
$app['resolver'] = $app->share($app->extend('resolver', function ($resolver, $app) {
    return new Demo\Controller\ServiceControllerResolver($resolver, $app);
}));

$app['debug'] = true;


$app['posts.repository'] = $app->share(function() {
    return new PostRepository;
});

$app['posts.controller'] = $app->share(function() use ($app) {
    return new PostController($app['posts.repository']);
});

$app->get('/posts.json', "posts.controller:indexJson");

// route that will fail
$app->get('/posts', "asasposts.controller:indexJson");

// route that uses existing function
$app->get('/dave', function() { return "dave"; });


return $app;
