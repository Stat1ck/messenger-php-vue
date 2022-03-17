<?php

namespace app\api\models\model;

abstract class AbstractModel {

	protected $db;
	protected $queryBuilder;
	protected $tableBuilder;

	public function __construct(object $db, object $queryBuilder, object $tableBuilder) {
		$this->db			= $db;
		$this->queryBuilder	= $queryBuilder;
		$this->tableBuilder	= $tableBuilder;
	}
}