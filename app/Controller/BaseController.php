<?php

/**
 * app/Controller/BaseController.php
 *
 * @author Zangue <armand.zangue@gmail.com>
 */


class BaseController {

	public $name = 'Base';
	
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


	public function __construct($app, $modelClass) {

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


	public function renderView($dir, $view) {

		$templatePath = $this->app->config->get('app.settings.renderer.template_path');
		$templateExt = $this->app->config->get('app.settings.renderer.template_ext');

		$file = $templatePath . DS . $dir . DS . $view . $templateExt;
		
		ob_start();

		if (isset($this->viewData))
			extract($this->viewData);
		
		require $file;

		$content = ob_get_clean();

		// Store slim app to pass it to the view
		$app = $this->app;

		// Append data to view
		$this->app->view->appendData(compact('app', 'content'));

		$this->app->render('layout.html');

	}

}