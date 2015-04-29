<?php
/**
 * Created by PhpStorm.
 * User: Sakurai
 * Date: 4/6/2015
 * Time: 10:37 AM
 */

namespace App;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends model{
    private $dataPengaduan;
    private $kategori;
    private $status;

    protected $table = 'ppl_citizenreport_pengaduan';

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

    public static function getListPengaduan($sortBy, $id_kategori) {
        $array;
        $i = 0;

        if($id_kategori!=null) {
            if($sortBy=="default")
                $model = PengaduanModel::where('id_kategori', $id_kategori)->get();
            else if($sortBy=="tanggal")
                $model = PengaduanModel::where('id_kategori', $id_kategori)->orderBy('created_at', 'DESC')->get();
            else if($sortBy=="kategori")
                $model = PengaduanModel::where('id_kategori', $id_kategori)->orderBy('id_kategori', 'DESC')->get();
            else if($sortBy=="status") 
                $model = PengaduanModel::where('id_kategori', $id_kategori)->orderBy('id_status', 'ASC')->get();
        } else {
            if($sortBy=="default")
                $model = PengaduanModel::all();
            else if($sortBy=="tanggal")
                $model = PengaduanModel::orderBy('created_at', 'DESC')->get();
            else if($sortBy=="kategori")
                $model = PengaduanModel::orderBy('id_kategori', 'DESC')->get();
            else if($sortBy=="status") 
                $model = PengaduanModel::orderBy('id_status', 'ASC')->get();
        }

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

    public static function getListPengaduanByUser($sortBy, $id_masyarakat) {
        if($sortBy=="default")
            $model = PengaduanModel::where('id_masyarakat', $id_masyarakat)->get();
        else if($sortBy=="tanggal")
            $model = PengaduanModel::where('id_masyarakat', $id_masyarakat)->orderBy('created_at', 'DESC')->get();
        else if($sortBy=="status") 
            $model = PengaduanModel::where('id_masyarakat', $id_masyarakat)->orderBy('id_status', 'ASC')->get();
   
        $array;
        $i = 0;
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

    public static function addLaporan($slug, $laporan_filename){
        $pengaduan = PengaduanModel::where('slug', $slug)->first();
        $pengaduan->laporan = $laporan_filename;
        $pengaduan->save();
    }

    public function getStatus() {
        return $this->status;
    }

    public static function getStatistikJumlah(){
        $daftarKategori = new StatistikAduan();

        $i = 0;
        $kategori = KategoriModel::all();
        foreach($kategori as $temp){
            $daftarKategori->kategori[$i] = $temp['nama'];
            $daftarKategori->jumlah[$i] = PengaduanModel::where('id_kategori', $temp['id'])->count();
            $i++;
        }

        return $daftarKategori;
    }

    public static function getJumlahAduanForNMonths($jumBulanTerakhir){
        $jumAduan = new StatistikAduan();
        $month = date('m');
        $year = date('Y');

        $j = 0;
        for($i = $jumBulanTerakhir; $i >= 0; $i--){
            $m = $month - $i;
            $y = $year;

            if($m <= 0){
                $m = 12 + $m;
                $y = $y - 1;
            }

            $bulanFormatted = Pengaduan::getMonthName($m);
            $tahunFormatted = $y;

            $dateStr = $bulanFormatted." ".$tahunFormatted;

            $jumAduan->date[$j] = $dateStr;

            $jumAduan->jumlah[$j] = Pengaduan::getJumlahAduan($dateStr);

            $j++;
        }

        return $jumAduan;
    }

    public static function getJumlahAduanClosedForNMonths($jumBulanTerakhir){
        $jumAduan = new StatistikAduan();
        $month = date('m');
        $year = date('Y');

        $j = 0;
        for($i = $jumBulanTerakhir; $i >= 0; $i--){
            $m = $month - $i;
            $y = $year;

            if($m <= 0){
                $m = 12 + $m;
                $y = $y - 1;
            }

            $bulanFormatted = Pengaduan::getMonthName($m);
            $tahunFormatted = $y;

            $dateStr = $bulanFormatted." ".$tahunFormatted;

            $jumAduan->date[$j] = $dateStr;

            $jumAduan->jumlah[$j] = Pengaduan::getJumlahAduanClosed($dateStr);

            $j++;
        }

        return $jumAduan;
    }

    private static function getJumlahAduanClosed($date){
        $idStatus = StatusModel::where('nama', 'closed')->first()['id'];
        $aduan = PengaduanModel::all();
        $jumlah = 0;

        foreach ($aduan as $temp) {
            $createdAt = $temp['created_at']."";

            if (strpos($createdAt, $date) !== false && $temp['id_status'] == $idStatus){
                $jumlah++;
            }
        }

        return $jumlah;
    }

    private static function getJumlahAduan($date){
        $aduan = PengaduanModel::all();
        $jumlah = 0;

        foreach ($aduan as $temp) {
            $createdAt = $temp['created_at']."";

            if (strpos($createdAt, $date) !== false){
                $jumlah++;
            }
        }

        return $jumlah;
    }

    public static function getJumlahAduanForNMonthsByCategory($jumBulanTerakhir, $id_kategori){
        $jumAduan = new StatistikAduan();
        $month = date('m');
        $year = date('Y');

        $j = 0;
        for($i = $jumBulanTerakhir; $i >= 0; $i--){
            $m = $month - $i;
            $y = $year;

            if($m <= 0){
                $m = 12 + $m;
                $y = $y - 1;
            }

            $bulanFormatted = Pengaduan::getMonthName($m);
            $tahunFormatted = $y;

            $dateStr = $bulanFormatted." ".$tahunFormatted;

            $jumAduan->date[$j] = $dateStr;

            $jumAduan->jumlah[$j] = Pengaduan::getJumlahAduanByCategory($dateStr, $id_kategori);

            $j++;
        }

        return $jumAduan;
    }

    public static function getJumlahAduanClosedForNMonthsByCategory($jumBulanTerakhir, $id_kategori){
        $jumAduan = new StatistikAduan();
        $month = date('m');
        $year = date('Y');

        $j = 0;
        for($i = $jumBulanTerakhir; $i >= 0; $i--){
            $m = $month - $i;
            $y = $year;

            if($m <= 0){
                $m = 12 + $m;
                $y = $y - 1;
            }

            $bulanFormatted = Pengaduan::getMonthName($m);
            $tahunFormatted = $y;

            $dateStr = $bulanFormatted." ".$tahunFormatted;

            $jumAduan->date[$j] = $dateStr;

            $jumAduan->jumlah[$j] = Pengaduan::getJumlahAduanClosedByCategory($dateStr, $id_kategori);

            $j++;
        }

        return $jumAduan;
    }

    private static function getJumlahAduanClosedByCategory($date, $id_kategori){
        $idStatus = StatusModel::where('nama', 'closed')->first()['id'];
        $aduan = PengaduanModel::all();
        $jumlah = 0;

        foreach ($aduan as $temp) {
            $createdAt = $temp['created_at']."";

            if (strpos($createdAt, $date) !== false && $temp['id_status'] == $idStatus && $temp['id_kategori'] == $id_kategori){
                $jumlah++;
            }
        }

        return $jumlah;
    }

    private static function getJumlahAduanByCategory($date, $id_kategori){
        $aduan = PengaduanModel::all();
        $jumlah = 0;

        foreach ($aduan as $temp) {
            $createdAt = $temp['created_at']."";

            if (strpos($createdAt, $date) !== false && $temp['id_kategori'] == $id_kategori){
                $jumlah++;
            }
        }

        return $jumlah;
    }

    private static function getMonthName($inp){
        return date("M", strtotime(date("d-$inp-y")));
    }

} 