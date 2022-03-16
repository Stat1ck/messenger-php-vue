<?php

namespace app\api\controllers;

use app\api\abstracts\ApiController;

class UserApiController extends ApiController {
	
	public function createUserAction() {
		//debug($_SERVER['REQUEST_METHOD']);
		echo 'Creating new User ...';
	}
}