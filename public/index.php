<?php

/**
 * www/index.php
 *
 * @author Zangue <armand.zangue@gmail.com>
 */

// Bootstrap the application
require ROOT . DS . APP_DIR . DS .'bootstrap.php';

// Register routes
require ROOT . DS . APP_DIR . DS . 'routes.php';

// Run the app
$app->run();