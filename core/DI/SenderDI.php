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
	protected $response;
	protected $method;
	protected $model;
	protected $apiModel;
	protected $queryBuilder;
	protected $tableBuilder;

	public function __construct(object $di) {
		$this->di			= $di;

		$this->error		= $this->di->get('error');

		$this->db			= $this->di->get('db');

		$this->router		= $this->di->get('router');

		$this->api			= $this->di->get('api');

		$this->controller	= $this->di->get('controller');

		$this->view			= $this->di->get('view');

		$this->response		= $this->di->get('response');

		$this->method		= $this->di->get('request_method');

		$this->model		= $this->di->get('model');

		$this->apiModel		= $this->di->get('apiModel');

		$this->queryBuilder	= $this->di->get('queryBuilder');

		$this->tableBuilder	= $this->di->get('tableBuilder');
	}
}