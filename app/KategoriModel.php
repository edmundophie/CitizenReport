<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class KategoriModel extends Model {

	protected $table = 'ppl_citizenreport_kategori';
	protected $appends = array('count');

	public function getCountAttribute() {
    	return PengaduanModel::where('id_kategori', $this->attributes['id'])->count();
    }


} 