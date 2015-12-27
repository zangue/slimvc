<?php

/**
 * core/Controller/Controller.php
 *
 * @author Zangue <armand.zangue@gmail.com>
 */


class Controller {

	/**
	 * Slim application instance
	 * @var Slim
	 */
	protected $app;

	/**
	 * Current model class
	 * @var [type]
	 */
	protected $modelClass;

	/**
	 * Data for the view
	 * @var [type]
	 */
	private $viewData = null;


	public function __construct($app, $modelClass = NULL) {

		$this->app = $app;
		$this->modelClass = $modelClass;
	}


	/**
	 * Set data to be passed to the view
	 * @param array $data data
	 */
	protected function set($data = null) {

		//var_dump($data);

		if (isset($data))
			$this->viewData = $data;

	}


	public function renderer($dir, $data) {

		$view = new View($this->app, $this->viewData);

		$view->renderView($dir, $data);
	}
}