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
			$model = NULL;

			if ($this->modelClassFileExist($modelClass))
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
	 * cheks if model class file exists
	 * @param  string $modelClass model class name
	 * @return bool            true if model file exist, false otherwise
	 */
	private function modelClassFileExist($modelClass) {

		$modelClassFile = ROOT . DS . APP_DIR . DS . 'Model' . DS . $modelClass . '.php';

		return file_exists($modelClassFile);
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

	/**
	 * Handle errors
	 * @param  string $code error type, eg 400, 500
	 * @return [type]       [description]
	 */
	public function error($code) {

		$model = NULL;
		if ($this->modelClassFileExist('Error'))
				$model = new $modelClass($this->app);

		$controller = new ErrorController($this->app, $model);
		$method = 'error' . $code;

		return call_user_func([$controller, $method]);
	}

}