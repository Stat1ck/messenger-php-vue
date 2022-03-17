<?php

namespace app\controllers;

use app\controllers\controller\AbstractController;

class IndexController extends AbstractController {
	
	public function indexAction() : void {
		$views = ['header', 'main'];
		$vars  = [
			'title'		=> $this->params['params']['title'],
			'styles'	=> ['header', 'main'],
			'scripts'	=> ['TextTyping'],
		];

		$this->view->render($views, $vars);
	}
}