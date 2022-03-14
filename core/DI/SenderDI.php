<?php

namespace core\DI;

abstract class SenderDI {

	protected $di;
	protected $db;
	protected $router;

	public function __construct($di) {
		$this->di		= $di;
		$this->db		= $this->di->get('db');
		$this->router	= $this->di->get('router');
	}
}