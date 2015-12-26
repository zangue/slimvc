<?php
/**
 * app/Controller/ErrorsController.php
 *
 * @author Zangue <armand.zangue@gmail.com>
 */

class ErrorsController extends BaseController {

	/**
	 * Controller name
	 * @var string
	 */
	public $name = 'Errors';


	public function error404() {

		$this->renderView($this->name, '404');

	}

	public function error500() {

		$this->renderView($this->name, '500');

	}


}