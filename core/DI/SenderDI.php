<?php

namespace core\DI;

abstract class SenderDI {

	protected $di;
	protected $error;
	protected $db;
	protected $router;
	protected $routerParams;
	protected $api;

	public function __construct(object $di) {
		$this->di			= $di;

		$this->error		= $this->di->get('error');

		$this->db			= $this->di->get('db');

		$this->router		= $this->di->get('router');
		$this->routerParams = $this->router->start();

		$this->api			= $this->di->get('api');
	}
}