<?php

namespace app\api\models\model;

use app\api\models\model\AbstractModel;

class ApiModel extends AbstractModel {

	public function upModel($model = '') : object {
		$newModel = 'app\api\models\\' . ucfirst($model) . 'ApiModel';

		if (class_exists($newModel)) {
			return new $newModel($this->db, $this->queryBuilder, $this->tableBuilder);
		}

		return (object)[];
	}
}