<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusModel extends Model {

	protected  $table = "status";
	protected $appends = array('color_code');

	public function getNamaAttribute($value)
    {
        return ucfirst($value);
    }

    public function getColorCodeAttribute() {
    	$nama = $this->attributes['nama'];
        if($nama == "pending")
            return  "warning";
        else if($nama == "forwarded")
            return "primary";
        else if($nama == "on progress")
            return  "info";
        else if($nama == "finished")
            return  "success";
        else
            return  "danger";
    }
} 