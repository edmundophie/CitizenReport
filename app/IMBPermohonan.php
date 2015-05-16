<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class IMBPermohonan extends Model {

	//
	protected $table = "ppl_imb_permohonans";
	
	public function getlistIMB($value){
		$list = DB::table($this)
					->join('ppl_imb_bangunans', $this->attributes['bangunan_nomor'], '=', 'ppl_imb_bangunans')
			        ->where('lokasi',$value)
			        ->get();
		return $list;
	}
}

?>