<?php

class HelloController extends BaseController {

	/**
	 * Controller name
	 * @var string
	 */
	public $name = 'Hello';


	public function index() {

		//var_dump($this->modelClass->name);

		$msg  = 'HELLO, WORLD!';

		$this->set(compact('msg'));
	}


	public function hello($name = '') {

		$this->set(compact('name'));

	}

}