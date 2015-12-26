<?php

/**
 * app/routes.php
 *
 * @author Zangue <armand.zangue@gmail.com>
 */


$router = new Router($app);

$router->get('/', 'Hello@index');

$router->get('/hello\/', 'Hello@hello');
$router->get('/hello/:name/', 'Hello@hello')->name('name');