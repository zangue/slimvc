<?php

/**
 * conifg/development.php
 * 
 * Configuration file while in development mode.
 *
 * @author Zangue <armand.zangue@gmail.com>
 */

// Example
return [
	'app' => [
		'url' => 'http://localhost',
		'version' => '1.0.0',
		
		'settings' => [
			'displayErrorDetails' => true,

			'renderer' => [
				'template_path' => VIEW_ROOT,
				'template_ext' => '.html'
			]
		]
	],

	'api' => [
		'backend' => [
			'base_url' => 'http://localhost/api/v1',
			'key' => ''
		],
		'spotify' => [
			'base_url' => '',
			'key' => ''
		]
	],

	'auth' => [
		'session' => 'user_id',
		'remember' => 'user_r'
	],

	'email' => [

	],

	// ...
];