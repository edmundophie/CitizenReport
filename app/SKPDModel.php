<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\KategoriModel;

class SKPDModel extends Model {
	protected $table = "ppl_dukcapil_ktp";
	protected $appends = array('masuk');
	
	public function getMasukAttribute($value) {
		return "MASUK";
	}
}
