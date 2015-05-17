<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PengaduanModel extends Model{
    protected $table = "ppl_citizenreport_pengaduan";
    protected $appends = array('id_skpd', 'pelapor');

    public function getJudulAttribute($value)
    {
        return ucwords($value);
    }

    public function getCreatedAtAttribute($value)
    {
        return date('d M Y H:i', strtotime($this->attributes['created_at']));
    }

    public function getIdSkpdAttribute($value) {
    	$id_skpd = DB::table('ppl_citizenreport_penanggungjawab')->select('id_skpd')->where('id_kategori', $this->attributes['id_kategori'])->first()->id_skpd;
        return $id_skpd;
    }

    public function getPelaporAttribute($value) {
        $id_masyarakat = $this->attributes['id_masyarakat'];
        $nama_pelapor = DB::table('ppl_dukcapil_ktp')->select('nama')->where('id', $id_masyarakat)->first()->nama;
        return $nama_pelapor;
    }
}
