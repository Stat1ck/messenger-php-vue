<?php 

namespace core\router;

class Router {

	private $router_config = [];
	private $url;
	private $params = [];
	private $types = [];
	private $data = [
		'prot_path' => [],
	];
	private $error;

	public function __construct(array $config, array $types, string $request_url, object $error) {
		$this->router_config	= $config;
		$this->types			= $types;
		$this->request_url		= $request_url;
		$this->error			= $error;
	}
	
	public function start() : array {
		$this->parseUrl();

		$rPaths = $this->getConfigPaths();

		$rUrl = $this->collectUrl($this->params['path']);

		$changed_routes = $this->changeRouterPaths($this->router_config, $rPaths);

		$routerParams = $this->findMatchesInUrl($changed_routes, $rUrl);

		return $routerParams;
	}

	private function parseUrl() : void {
		$parse_url = parse_url($this->request_url);

		$this->params['path'] = $this->getPathParams($parse_url['path']);

		$this->params['query'] = $this->getQueryParams((!empty($parse_url['query'])) ? $parse_url['query'] : "");
	}

	private function findMatchesInUrl($routes = [], string $url) : array {
		$i = 0;
		foreach ($routes as $route => $params) {
			if (preg_match('#^'.$route.'$#', $url)) {
				return [
					'url'			=> $url, 
					'full_url'		=> $this->request_url, 
					'params'		=> $params, 
					'query'			=> $this->params['query'], 
					'url_params'	=> $this->getUrlParams($i),
					'isApi'			=> $this->isApi($this->params['path']),
				];
			}

			$i++;
		}

		return $this->error->throwError(404);
	}

	private function getUrlParams(int $pos = 0) : array {
		$path = $this->data['prot_path'][$pos];
		$urlParams = [];

		for ($i = 0; $i < count($path); $i++) {
			foreach ($this->types as $type => $val) {
				if ($path[$i] === ':'.$type) {
					$urlParams += [
						$type => $this->params['path'][$i]
					];
				}
			}
		}

		return $urlParams;
	}

	private function changeRouterPaths($routes = [], $keys = []) : array {
		$router_params = array_values($routes);
		$changePathRoutes = [];

		for ($i = 0; $i < count($router_params); $i++) {
			$changePathRoutes += [
				$keys[$i] => $router_params[$i]
			];
		}

		return $changePathRoutes;
	}

	private function getQueryParams($query = []) : array {
		parse_str($query, $result);

		return $result;
	}

	private function getPathParams($path = []) : array {
		$explodeArr = explode('/', $path);

		$result = array_diff($explodeArr, array(""));

		$result[0] = '/';

		return $result;
	}	
	
	private function getConfigPaths() : array {
		$paths = [];
		$rPaths = [];
		$s = 0;

		foreach(array_keys($this->router_config) as $path) {
			$arrPath = $this->getPathParams($path);
			$this->data['prot_path'] += [
				$s => $arrPath
			];
			array_push($paths, $this->checkParams($arrPath));

			$s++;
		}

		for ($i = 0; $i < count($paths); $i++) {
			array_push($rPaths, $this->collectUrl($paths[$i]));
		}

		return $rPaths;
	}

	private function collectUrl($partsUrl = []) : string {
		$rUrl = '/';

		for ($i = 1; $i < count($partsUrl); $i++) {
			$rUrl .= ($i === 1) ? $partsUrl[$i] : '/' . $partsUrl[$i];
		}

		return $rUrl;
	}

	private function checkParams($path = []) : array {
		foreach ($this->types as $type => $val) {
			for ($i = 0; $i < count($path); $i++) {
				if ($path[$i] === ':'.$type) {
					$path[$i] = $val;
				} 
			}
		}

		return $path;
	}

	private function isApi($path = []) : bool {
		if (array_key_exists(1, $path)) {
			if ($path[1] === 'api') {
				return true;
			}
		}

		return false;
	}
}