<?php

namespace core\DI;

abstract class SenderDI {

	protected $di;
	protected $error;
	protected $db;
	protected $router;
	protected $api;
	protected $view;
	protected $controller;

	public function __construct(object $di) {
		$this->di			= $di;

		$this->error		= $this->di->get('error');

		$this->db			= $this->di->get('db');

		$this->router		= $this->di->get('router');

		$this->api			= $this->di->get('api');

		$this->controller	= $this->di->get('controller');

		$this->view			= $this->di->get('view');
	}
}