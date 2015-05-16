<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use DB;

class Verifier extends Model {

	//
	protected $table = "ppl_imb_permohonans";
	
	public function getlistIMB($alamat){
		$list = DB::table("ppl_imb_permohonans")
					->join('ppl_imb_bangunans', 'ppl_imb_permohonans.bangunan_nomor', '=', 'ppl_imb_bangunans.nomor')
			        ->where('lokasi','LIKE', '%'.$alamat.'%')
			        ->get();
		return $list;
	}
}

?>