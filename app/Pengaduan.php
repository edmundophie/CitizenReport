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
        $this->dataPengaduan =  PengaduanModel::where('slug', $slug)->first();
        
        $this->status = new Status;
        $this->status->setDataStatus($dataPengaduan['id_status']);       
    }

    public function getDataAduan(){
        return $this->dataPengaduan;
    }

    public function getNamaKategori(){
        return $this->namaKategori;
    }

    public function getNamaStatus(){
        return $this->status->getDataStatus()['nama'];
    }

    public function getProgress(){
        return $this->status->getDatStatus()['progress'];
    }
} 