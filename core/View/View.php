<?php

/**
 * core/View/View.php
 *
 * @author Zangue <armand.zangue@gmail.com>
 */


class View {

	/**
	 * Slim application instance
	 * @var Slim
	 */
	protected $app;

	/**
	 * Layout file name
	 * @var string
	 */
	protected $layout;

	/**
	 * Data for the view
	 * @var [type]
	 */
	private $viewData = null;


	public function __construct($app, $viewData) {

		$this->app = $app;
		$this->viewData = $viewData;
		$this->layout = 'layout.html';
	}


	/**
	 * Render view for specific action
	 * @param  string $dir  directory name that contains the view files
	 * @param  string $view view file
	 * @return void
	 */
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

		$this->app->render($this->layout);

	}
}