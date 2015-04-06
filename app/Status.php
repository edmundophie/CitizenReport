<?php namespace App;

class Status {
	private $dataStatus;

    public function __constructor(){

    }

    public function setDataStatus($id) {
        $this->dataStatus = StatusModel::where('id', $id)->first();
    }

	public function getDataStatus() {
		return $this->dataStatus;
	}


}