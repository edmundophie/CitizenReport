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

    public static function addFeedback($slug, $feedback, $comment){
        $pengaduan = PengaduanModel::where('slug', $slug)->first();

        if($feedback == 'accepted'){
            $pengaduan->id_status = StatusModel::where('nama', 'closed')->first()['id'];
        }else{
            $pengaduan->komentar_feedback = $comment;
        }
        $pengaduan->feedback = $feedback;

        $pengaduan->save();
    }

    public function getDate() {
        return date('d F Y', strtotime($this->dataPengaduan['created_at']));
    }
} 