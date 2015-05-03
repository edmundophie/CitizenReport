<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\KategoriModel;

class SKPDModel extends Model {
	protected $table = "ppl_dukcapil_ktp";
	protected $appends = array('id_kategori', 'kategori');

	public function getIdKategoriAttribute($value) {
		$id_kategori = DB::table('ppl_citizenreport_penanggungjawab')->where('id_skpd', $this->attributes['id'])->first()->id_kategori;

		return $id_kategori;
	}

	public function getKategoriAttribute($value) {
		$id_kategori = DB::table('ppl_citizenreport_penanggungjawab')->where('id_skpd', $this->attributes['id'])->first()->id_kategori;
		$nama_kategori = KategoriModel::where('id', $id_kategori)->first()['nama'];
		return $nama_kategori;
	}
}
