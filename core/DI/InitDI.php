<?php

namespace core\DI;

use core\DI\DI;
use core\database\DB;
use core\router\Router;

class InitDI {

	private $di;

	public function __construct() {
		$this->di = new DI();
	}

	public function init_configs() : void {
		$this->di->set('db_config', require_once D . '\config\DB\DB-config.php');
		$this->di->set('router_config', require_once D . '\config\Router\routes.php');
		$this->di->set('router_types', require_once D . '\config\Router\types.php');
	}

	public function init_services() : void {
		$this->di->set('db', new DB());
		$this->di->set('router', new Router());
	}

	public function getDI() {
		return (!empty($this->di)) ? $this->di : null;
	}

}