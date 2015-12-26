<?php

/**
 * core/Router.php
 *
 * @author Zangue <armand.zangue@gmail.com>
 */

class Router {

	/**
	 * $app Slim Application instance
	 * @var Slim
	 */
	private $app;


	public function __construct($app) {
		$this->app = $app;
	}


	/**
	 * Generic routes handler
	 * @param  String $method Http method, e.g. GET, POST
	 * @param  String $url    method url
	 * @param  String $action action to perform
	 * @return [type]         [description]
	 */
	private function _call($method, $url, $action) {

		//return $this->app->$method($url, function () use ($action) {
		return $this->app->map($url, function () use ($action) {
			
			$action = explode('@', $action);

			$modelClass = $action[0] . 'Model';
			$modelClassFile = ROOT . DS . APP_DIR . DS . 'model' . DS . $modelClass . '.php';
			$model = NULL;

			if (file_exists($modelClassFile))
				$model = new $modelClass($this->app);

			$controllerClass = $action[0] . 'Controller';
			$method = $action[1];

			$controller = new $controllerClass($this->app, $model);

			// call controller
			call_user_func_array([$controller, $method], func_get_args());

			// Render view
			call_user_func_array([$controller, 'renderView'], [$action[0], $method]);
		})->via($method);
	}


	/**
	 * Routes http GET request
	 * @param  String $url    GET url
	 * @param  String $action action to perform
	 * @return [type]         [description]
	 */
	public function get($url, $action) {
		
		//return $this->_call('get', $url, $action);
		return $this->_call('GET', $url, $action);	
	
	}


	/**
	 * Route http POST request
	 * @param  String $url    POST url
	 * @param  String $action action to perform
	 * @return [type]         [description]
	 */
	public function post($url, $action) {
		
		//return $this->_call('post', $url, $action);
		return $this->_call('POST', $url, $action);
	
	}

}