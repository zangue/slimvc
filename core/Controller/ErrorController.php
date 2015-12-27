<?php

/**
 * core/Controller/ErrorController.php
 *
 * @author Zangue <armand.zangue@gmail.com>
 */


class ErrorController extends Controller {


	/**
	 * Controller name
	 * @var string
	 */
	public $name = 'Error';


	public function error404() {

		$this->renderer($this->name, '404');

	}

	public function error500() {

		$this->renderer($this->name, '500');

	}

}