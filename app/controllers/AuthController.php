<?php

namespace app\controllers;

use app\abstracts\Controller;

class AuthController extends Controller {

	public function AuthRegisterAction() {
		$views = ['header', 'authRegister'];
		$vars  = [
			'title'		=> $this->params['params']['title'],
			'styles'	=> [],
			'scripts'	=> [],
		];

		$this->view->render($views, $vars);
	}
}