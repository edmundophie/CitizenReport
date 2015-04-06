<?php
/**
 * Created by PhpStorm.
 * User: Sakurai
 * Date: 4/6/2015
 * Time: 2:35 PM
 */

namespace App;


class ArrayPengaduan {
    private $array;

    public function __constuctor(){

    }

    public function getListAduan(){
        $i = 0;

        foreach(PengaduanModel::all() as $pengaduan){
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
            $this->array[$i] = $temp;
            $i++;
        }

        return $this->array;
    }

} 