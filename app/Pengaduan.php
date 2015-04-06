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
        $this->kategori->setKategori($this->dataPengaduan['id_kategori']);

        $this->status = new Status;
        $this->status->setDataStatus($this->dataPengaduan['id_status']);
    }

    public function getDataAduan(){
        return $this->dataPengaduan;
    }

    public function getNamaKategori(){
        return $this->kategori->getDataKategori()['nama'];
    }

    public function getNamaStatus(){
        return $this->status->getDataStatus()['nama'];
    }

    public function getProgress(){
        return $this->status->getDataStatus()['progress'];
    }

    public function getDeskripsiSingkat(){
        return substr($this->dataPengaduan['deskripsi'], 0, 300);
    }

    public static function getListPengaduan($sortBy) {
        $array;
        $i = 0;

        if($sortBy=="default")
            $model = PengaduanModel::all();
        else if($sortBy=="tanggal")
            $model = PengaduanModel::orderBy('created_at', 'DESC')->get();
        else if($sortBy=="kategori")
            $model = PengaduanModel::orderBy('id_kategori', 'DESC')->get();
        else if($sortBy=="status") 
            $model = PengaduanModel::orderBy('id_status', 'DESC')->get();

        foreach($model as $pengaduan){
            $temp = new Pengaduan();
            $temp->setJudul($pengaduan['judul']);
            $temp->setSlug($pengaduan['slug']);
            $temp->setIdStatus($pengaduan['id_status']);
            $temp->setDeskripsi($pengaduan['deskripsi']);
            $temp->setGambar($pengaduan['gambar']);
            $temp->setIdKategori($pengaduan['id_kategori']);
            $temp->setIdMasyarakat($pengaduan['id_masyarakat']);
            $temp->setKategori($pengaduan['id_kategori']);
            $temp->setStatus($pengaduan['id_status']);
            $temp->setLampiran($pengaduan['lampiran']);
            $temp->setCreatedDate($pengaduan['created_at']);
            $array[$i] = $temp;
            $i++;
        }

        return $array;
    }

    public function setJudul($judul){
        $this->dataPengaduan['judul'] = $judul;
    }

    public function setKategori($idKategori){
        $this->kategori = new Kategori();
        $this->kategori->setKategori($idKategori);
    }

    public function setStatus($idStatus){
        $this->status = new Status;
        $this->status->setDataStatus($idStatus);
    }

    public function setIdKategori($idKategori){
        $this->dataPengaduan['id_kategori'] = $idKategori;
    }

    public function setLampiran($lampiran){
        $this->dataPengaduan['lampiran'] = $lampiran;
    }

    public function setGambar($gambar){
        $this->dataPengaduan['gambar'] = $gambar;
    }

    public function setDeskripsi($deskripsi){
        $this->dataPengaduan['deskripsi'] = $deskripsi;
    }

    public function setIdMasyarakat($idPelapor){
        $this->dataPengaduan['id_masyarakat'] = $idPelapor;
    }

    public function setIdStatus($idStatus){
        $this->dataPengaduan['id_status'] = $idStatus;
    }

    public function setSlug($slug){
        $this->dataPengaduan['slug'] = $slug;
    }

    public function setCreatedDate($date){
        $this->dataPengaduan['created_at'] = $date;
    }

    public function savePengaduan(){
        $pengaduan = new PengaduanModel();
        $pengaduan->judul = $this->dataPengaduan['judul'];
        $pengaduan->id_kategori = $this->dataPengaduan['id_kategori'];
        $pengaduan->lampiran = $this->dataPengaduan['lampiran'];
        $pengaduan->gambar = $this->dataPengaduan['gambar'];
        $pengaduan->deskripsi = $this->dataPengaduan['deskripsi'];
        $pengaduan->id_masyarakat = $this->dataPengaduan['id_masyarakat'];
        $pengaduan->id_status = $this->dataPengaduan['id_status'];
        $pengaduan->slug = $this->dataPengaduan['slug'];
        $pengaduan->save();
    }

    public static function updateStatus($slug, $idStatus, $komentarStatus){
        $pengaduan = PengaduanModel::where('slug', $slug)->first();
        $pengaduan->id_status = $idStatus;
        $pengaduan->komentar_status = $komentarStatus;
        $pengaduan->save();
    }

    public function getDate() {
        return date('d F Y', strtotime($this->dataPengaduan['created_at']));
    }
} 