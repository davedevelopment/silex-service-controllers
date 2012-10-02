<?php

use Silex\Application;
use Demo\Repository\PostRepository;

$app = new Application;

$app['posts.repository'] = $app->share(function() {
    return new PostRepository;
});

$app->get('/posts.json', function() use ($app) {
    return $app->json($app['posts.repository']->findAll());
});

return $app;
