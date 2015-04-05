<?php
/**
 * Created by PhpStorm.
 * User: Sakurai
 * Date: 4/6/2015
 * Time: 5:04 AM
 */

namespace App;

use Illuminate\Support\Facades\DB;

class Status {
    private $id;
    private $nama;
    private $deskripsi;

    public function __construct($id){
        $this->id = $id;
        $this->nama = DB::table('status')->where('id', $id)->pluck('nama');
        $this->deskripsi = DB::table('status')->where('id', $id)->pluck('deskripsi');
    }

    public function getNama(){
        return $this->nama;
    }

    public function getDeskripsi(){
        return $this->deskripsi;
    }
} 