<?php

/**
 * app/routes.php
 *
 * @author Zangue <armand.zangue@gmail.com>
 */


$router = new Router($app);

// Error handling
$app->notFound(function () use ($router) {
	$router->error('404');
});

$app->error(function () use ($router) {
	$router->error('500');
});

$router->get('/', 'Hello@index');

$router->get('/hello\/', 'Hello@hello');
$router->get('/hello/:name/', 'Hello@hello')->name('name');