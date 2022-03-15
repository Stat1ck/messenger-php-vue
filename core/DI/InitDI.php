<?php

namespace core\DI;

use core\DI\DI;
use core\database\DB;
use core\router\Router;
use app\api\Api;
use core\errors\Error;

class InitDI {

	private $di;

	public function __construct() {
		$this->di = new DI();
	}
	
	public function init_variables() : void {
		$this->di->set('request_url', $_SERVER['REQUEST_URI']);
	}

	public function init_configs() : void {
		$this->di->set('db_config', require_once D . '\config\db\db-config.php');
		$this->di->set('router_config', require_once D . '\config\router\routes.php');
		$this->di->set('router_types', require_once D . '\config\router\types.php');
		$this->di->set('error_config', require_once D . '\config\error\error-config.php');
	}

	public function init_services() : void {
		$this->di->set('db', new DB());
		$this->di->set('router', new Router());
		$this->di->set('api', new Api());
		$this->di->set('error', new Error());
	}

	public function getDI() {
		return (!empty($this->di)) ? $this->di : [];
	}

}