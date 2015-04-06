<?php namespace App;

class Status {
	private $dataStatus;
    private $colorCode;

    public function __constructor(){

    }

    public function setDataStatus($id) {
        $this->dataStatus = StatusModel::where('id', $id)->first();
    }

	public function getDataStatus() {
		return $this->dataStatus;
	}

    public static function getListStatus(){
        $stat = null;
        $i = 0;

        foreach(StatusModel::all() as $status){
            if($status['id'] != 1 && $status['id'] != 5 && $status['id'] != 6){
                $stat[$i] = $status;
            }
            $i++;
        }

        return $stat;
    }
}