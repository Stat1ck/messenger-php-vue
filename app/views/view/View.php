<?php

namespace app\views\view;

class View {

	private $template = 'default';

	public function __construct($template = 'default') {
		$this->template = $template;
	}

	public function render($views = [], $vars = []) : void {
		extract($vars);

		ob_start();
		foreach ($views as $view) {
			$path = D . '/app/views/' . $view . 'View.php';
			if (file_exists($path)) {
				require $path;
			}
		}
		$content = ob_get_contents();
		ob_clean();

		$path = D . '/app/views/' . $this->template . '/' . ucfirst($this->template) . 'View.php';
		if (file_exists($path)) {
			require $path;
		}
	}
}