<?php

namespace core\DI;

use core\DI\DI;
use core\database\DB;
use core\router\Router;
use app\api\Api;
use core\errors\Error;
use app\controllers\controller\Controller;
use app\views\view\View;

class InitDI {

	private $di;

	public function __construct() {
		$this->di = new DI();
	}
	
	public function init_variables() : object {
		$this->di->set('request_url', $_SERVER['REQUEST_URI']);

		return $this;
	}

	public function init_configs() : object {
		$this->di->set('db_config', require_once D . '\config\db\db-config.php');
		$this->di->set('router_config', require_once D . '\config\router\routes.php');
		$this->di->set('router_types', require_once D . '\config\router\types.php');
		$this->di->set('error_config', require_once D . '\config\error\error-config.php');

		return $this;
	}

	public function init_services() : object {
		$this->di->set('error', new Error(
			$this->di->get('error_config')
		));
		$this->di->set('db', new DB(
			$this->di->get('db_config')
		));
		$this->di->set('router', new Router(
			$this->di->get('router_config'),
			$this->di->get('router_types'),
			$this->di->get('request_url'),
			$this->di->get('error')
		));
		$this->di->set('api', new Api());
		$this->di->set('controller', new Controller());
		$this->di->set('view', new View());

		return $this;
	}

	public function getDI() : object {
		return (!empty($this->di)) ? $this->di : (object)[];
	}

}