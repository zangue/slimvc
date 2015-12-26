<?php

/**
 * index.php
 *
 * @author Zangue <armand.zangue@gmail.com>
 */

define('VERSION', '1.0.0-dev');

define('DS', DIRECTORY_SEPARATOR);

define('ROOT', dirname(__FILE__));
define('CORE_DIR', 'core');
define('APP_DIR', 'app');
define('PUBLIC_DIR', 'public');
define('WWW_ROOT', ROOT . DS . PUBLIC_DIR);
define('VIEW_ROOT', ROOT . DS . APP_DIR . DS . 'View');

// Require the application public index
require WWW_ROOT . DS .  'index.php';