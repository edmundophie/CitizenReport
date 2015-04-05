<?php
/**
 * Created by PhpStorm.
 * User: Sakurai
 * Date: 4/6/2015
 * Time: 4:55 AM
 */

namespace App;

use Illuminate\Support\Facades\DB;

class Kategori {
    private $id;
    private $nama;
    private $deskripsi;

    public function __construct($id){
        $this->id = $id;
        $this->nama = DB::table('kategori')->where('id', $id)->pluck('nama');
        $this->deskripsi = DB::table('kategori')->where('id', $id)->pluck('deskripsi');
    }

    public function getNama(){
        return $this->nama;
    }

    public function getDeskripsi(){
        return $this->deskripsi;
    }
} 