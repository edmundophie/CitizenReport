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
    private $namaKategori;
    private $namaStatus;
    private $progress;

    public function __constructor(){

    }

    public function setAduan($slug){
        $this->dataPengaduan =  PengaduanModel::where('slug', $slug)->first();
        $this->namaKategori = KategoriModel::where('id', $this->dataPengaduan['id'])->first()->nama;
        $this->namaStatus = Status::where('id', $this->dataPengaduan['id'])->first()->nama;
        $this->progress = Status::where('id', $this->dataPengaduan['id'])->first()->progress;
    }

    public function getDataAduan(){
        return $this->dataPengaduan;
    }

    public function getNamaKategori(){
        return $this->namaKategori;
    }

    public function getNamaStatus(){
        return $this->namaStatus;
    }

    public function getProgress(){
        return $this->progress;
    }
} 