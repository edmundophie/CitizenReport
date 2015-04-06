<?php
/**
 * Created by PhpStorm.
 * User: Sakurai
 * Date: 4/6/2015
 * Time: 10:37 AM
 */

namespace App;


class Pengaduan {
    private $dataPengaduan;
    private $kategori;
    private $status;

    public function __constructor(){

    }

    public function setAduan($slug){
        $this->dataPengaduan = PengaduanModel::where('slug', $slug)->first();
        $this->kategori = new Kategori();
        $this->kategori->setKategoti($this->dataPengaduan['id']);
    }

    public function getDataAduan(){
        return $this->dataPengaduan;
    }

    public function getNamaKategori(){
        return $this->getNamaKategori()['nama'];
    }

    public function getNamaStatus(){
        return $this->namaStatus;
    }

    public function getProgress(){
        return $this->progress;
    }
} 