<?php

namespace app\controllers\controller;

abstract class AbstractController {
	protected $view;
	protected $params = [];
	protected $method = '';
	protected $response;
	protected $model;

	public function init(object $view, object $model, object $response, $params = [], string $method) {
		$this->view		= $view;
		$this->params	= $params;
		$this->method	= $method;
		$this->response = $response;
		$this->model	= $model;
	}
}