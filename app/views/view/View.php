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
			$path = D . '/app/views/' . $view . 'View.html';
			if (file_exists($path)) {
				require $path;
			}
		}
		$content = ob_get_contents();
		ob_clean();

		$scripts = $this->upScripts($scripts);
		$styles  = $this->upStyles($styles);

		$path = D . '/app/views/templates/' . $this->template . 'View.php';
		if (file_exists($path)) {
			require $path;
		}
	}

	private function upScripts($scriptsList = []) : string {
		$scripts = '';

		foreach ($scriptsList as $script) {
			$scripts .= "<script src='/app/assets/js/" . $script . ".js'></script>\n";
		}

		return $scripts;
	}

	private function upStyles($styleList = []) : string {
		$styles = '';

		foreach ($styleList as $style) {
			$styles .= "<link rel='stylesheet' type='text/css' href='/app/assets/css/" . $style . ".css' />\n";
		}

		return $styles;
	}
}