<?php

class HelloController extends AppController {

	/**
	 * Controller name
	 * @var string
	 */
	public $name = 'Hello';


	public function index() {

		//var_dump($this->modelClass->name);

		$msg  = 'HELLO, WORLD!';

		//var_dump($this->app->urlFor('hello'));

		$this->set(compact('msg'));
	}


	public function hello($name = '') {

		$this->set(compact('name'));

	}

}