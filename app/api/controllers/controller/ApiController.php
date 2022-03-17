<?php

namespace app\api\controllers\controller;

abstract class ApiController {
	protected $apiModel;
	protected $params = [];
	protected $response;
	protected $method = '';

	public function init(object $apiModel, $params = [], object $response, string $method) {
		$this->params	= $params;
		$this->method	= $method;
		$this->response = $response;
		$this->apiModel = $apiModel;
	}
}