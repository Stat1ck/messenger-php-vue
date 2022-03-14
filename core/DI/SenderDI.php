<?php

namespace core\DI;

abstract class SenderDI {

	protected $di;
	protected $db;
	protected $router;

	public function __construct($di) {
		$this->di			= $di;

		$this->db			= $this->di->get('db');
		$this->db_cfg		= $this->di->get('db_config');

		$this->router		= $this->di->get('router');
		$this->router_cfg	= $this->di->get('router_config');
		$this->router_types	= $this->di->get('router_types');

		$this->request_url  = $this->di->get('request_url');

	}
}