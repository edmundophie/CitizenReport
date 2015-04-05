<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pengaduan{
    private $id;
    private $judul;
    private $kategori;
    private $lampiran;
    private $gambar;
    private $deskripsi;
    private $pelapor;
    private $status;
    private $komentarStatus;
    private $laporan;
    private $feedback;

    public function __construct($id){
        $this->id = $id;
        $this->judul = DB::table('pengaduan')->where('id', $id)->pluck('judul');
        $this->lampiran = DB::table('pengaduan')->where('id', $id)->pluck('lampiran');
        $this->gambar = DB::table('pengaduan')->where('id', $id)->pluck('gambar');
        $this->deskripsi = DB::table('pengaduan')->where('id', $id)->pluck('deskripsi');
        $this->komentarStatus = DB::table('pengaduan')->where('id', $id)->pluck('komentar_status');
        $this->laporan = DB::table('pengaduan')->where('id', $id)->pluck('laporan');
        $this->feedback  = DB::table('pengaduan')->where('id', $id)->pluck('feedback');
        $this->kategori = new Kategori($id);
        $this->status = new Status($id);
    }

    public function getJudul(){
        return $this->judul;
    }

    public function getLampiran(){
        return $this->lampiran;
    }

    public function getGambar(){
        return $this->gambar;
    }

    public function getDeskripsi(){
        return $this->deskripsi;
    }

    public function getKomentarStatus(){
        return $this->komentarStatus;
    }

    public function getLaporan(){
        return $this->laporan;
    }

    public function getFeedback(){
        return $this->feedback;
    }

    public function getKategori(){
        return $this->kategori;
    }

    public function getStatus(){
        return $this->status;
    }

}
