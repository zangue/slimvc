<?php

/**
 * core/Model/Model.php
 *
 * @author Zangue <armand.zangue@gmail.com>
 */


class Model {

	/**
	 * Slim application instance
	 * @var Slim
	 */
	protected $app;


	public function __construct($app) {

		$this->app = $app;
	}
}