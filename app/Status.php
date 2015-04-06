<?php namespace App;

class Status {
	private $dataStatus;

	public function getDataStatus() {
		return $dataStatus;
	}

	public function setDataStatus($id) {
		$dataStatus = StatusModel::where('id', $id)->first();
	}
}