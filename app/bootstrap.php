<?php

/**
 * app/bootstrap.php
 *
 * @author Zangue <armand.zangue@gmail.com>
 */

use Slim\Slim;
use Noodlehaus\Config;

//session_cache_limiter(false);
//session_start();

ini_set('display_errors', 'On');

// Require all PHP dependencies using the composer autoloader
require ROOT . DS . 'vendor/autoload.php';

require ROOT . DS . CORE_DIR . DS . 'Router.php';
require ROOT . DS . CORE_DIR . DS . 'Model' . DS . 'Model.php';
require ROOT . DS . CORE_DIR . DS . 'Controller' . DS . 'Controller.php';
require ROOT . DS . CORE_DIR . DS . 'Controller' . DS . 'ErrorController.php';
require ROOT . DS . CORE_DIR . DS . 'View' . DS . 'View.php';

//require APP_DIR . DS . 'Controller/BaseController.php';
require APP_DIR . DS . 'Controller/ErrorController.php';
require APP_DIR . DS . 'Controller/HelloController.php';

//require APP_DIR . DS . 'Model/BaseModel.php';
require APP_DIR . DS . 'Model/ErrorModel.php';
require APP_DIR . DS . 'Model/HelloModel.php';

// Instantiate a new Slim Application
$app = new Slim([
	'mode' => 'development',
	'templates.path' => VIEW_ROOT
]);

// Some more things can be done here. Eg, add a custom middleware
// $app->add(new MyMiddleware());

// Load configuration
$app->configureMode($app->config('mode'), function () use ($app) {
	$app->config = Config::load(APP_DIR . DS . "Config/{$app->mode}.php");
});

