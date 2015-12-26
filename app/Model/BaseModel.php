<?php

/**
 * app/Model/BaseController.php
 *
 * @author Zangue <armand.zangue@gmail.com>
 */

class BaseModel {

	public $name = 'Base';

	/**
	 * Slim application instance
	 * @var Slim
	 */
	protected $app;

	public function __construct($app) {

		$this->app = $app;
	}

}