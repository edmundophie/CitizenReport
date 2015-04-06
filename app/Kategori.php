<?php
/**
 * Created by PhpStorm.
 * User: Sakurai
 * Date: 4/6/2015
 * Time: 11:19 AM
 */

namespace App;


class Kategori {
    private $dataKategori;

    public function __construct(){

    }

    public function setKategoti($idKategori){
        $this->dataKategori = KategoriModel::where('id', $idKategori)->first();
    }

    public function getDataKategori(){
        return $this->dataKategori;
    }

    public static function getListKategori() {
    	return KategoriModel::all();
    }
} 