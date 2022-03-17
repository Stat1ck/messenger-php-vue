<?php

namespace core\DI;

use core\DI\DI;
use core\database\DB;
use core\router\Router;
use app\api\Api;
use core\errors\Error;
use app\controllers\controller\Controller;
use app\views\view\View;
use core\helpers\Response;
use app\models\model\Model;
use app\api\models\model\ApiModel;
use core\database\builders\TableBuilder;
use core\database\builders\QueryBuilder;

class InitDI {

	private $di;

	public function __construct() {
		$this->di = new DI();
	}
	
	public function init_variables() : object {
		$this->di->set('request_url', $_SERVER['REQUEST_URI']);
		$this->di->set('request_method', $_SERVER['REQUEST_METHOD']);

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

		$this->di->set('response', new Response());

		$this->di->set('db', new DB(
			$this->di->get('db_config')
		));

		$this->di->set('tableBuilder', new TableBuilder());

		$this->di->set('queryBuilder', new QueryBuilder());

		$this->di->set('router', new Router(
			$this->di->get('router_config'),
			$this->di->get('router_types'),
			$this->di->get('request_url'),
			$this->di->get('error')
		));

		$this->di->set('model', new Model(
			$this->di->get('db'),
			$this->di->get('queryBuilder'),
			$this->di->get('tableBuilder')
		));

		$this->di->set('apiModel', new ApiModel(
			$this->di->get('db'),
			$this->di->get('queryBuilder'),
			$this->di->get('tableBuilder')
		));

		$this->di->set('api', new Api());

		$this->di->set('view', new View());

		$this->di->set('controller', new Controller());

		return $this;
	}

	public function getDI() : object {
		return (!empty($this->di)) ? $this->di : (object)[];
	}

}