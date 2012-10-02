<?php

use Silex\Application;
use Demo\Repository\PostRepository;
use Demo\Controller\ControllerResolver;
use Demo\Controller\PostController;

$app = new Application;

/**
 * Custom controller resolver
 */
$app['resolver'] = $app->share(function () use ($app) {
    return new ControllerResolver($app, $app['logger']);
});

$app['posts.repository'] = $app->share(function() {
    return new PostRepository;
});

$app['posts.controller'] = $app->share(function() use ($app) {
    return new PostController($app['posts.repository'], $app);
});

$app->get('/posts.json', "posts.controller:indexJson");

return $app;
