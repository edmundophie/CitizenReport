<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Verifier extends Model {

	//protected $table = "ppl_imb_permohonans";
	
	public static function getlistIMB($alamat){
		$list = DB::table("ppl_imb_permohonans")
					->join('ppl_imb_bangunans', 'ppl_imb_permohonans.bangunan_nomor', '=', 'ppl_imb_bangunans.nomor')
			        ->where('lokasi','LIKE', '%'.$alamat.'%')
			        ->where('statushak','=','Diterima')
			        ->get();
		return $list;
	}
	public static function getlistParkir($alamat){
		$list = DB::table("ppl_aparter_parkir")
					->join('ppl_aparter_kecamatan', 'ppl_aparter_parkir.id_kecamatan', '=', 'ppl_aparter_kecamatan.id_kecamatan')
			        ->join('ppl_aparter_jenis_kendaraan','ppl_aparter_parkir.id_jenis_kendaraan', '=', 'ppl_aparter_jenis_kendaraan.id_jenis_kendaraan')
			        ->where('alamat','LIKE', '%'.$alamat.'%')
			        ->get();
		return $list;
	}
}

?>