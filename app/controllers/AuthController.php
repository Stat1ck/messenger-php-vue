<?php

namespace app\controllers;

use app\controllers\controller\AbstractController;

class AuthController extends AbstractController {

	public function registerAction() : void {
		$views = ['header', 'register'];
		$vars  = [
			'title'		=> $this->params['params']['title'],
			'styles'	=> ['header', 'register'],
			'scripts'	=> ['registerApp'],
		];

		$this->view->render($views, $vars);
	}
}