<?php

namespace app\api\controllers;

use app\api\controllers\controller\ApiController;

class UserController extends ApiController {
	
	public function createAction() {
		//debug($this->apiModel);
		echo json_encode(['mess' => 'yes']);
	}
}