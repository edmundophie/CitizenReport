<?php namespace App\Http\Controllers;

use App\ArrayPengaduan;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\JumlahAduan;
use App\StatistikAduan;
use Illuminate\Support\Facades\DB;
use Session;

use Illuminate\Http\Request;
use App\Kategori;
use App\Pengaduan;
use App\SKPDModel;
use App\KategoriModel;

class PagesController extends Controller {

	public function index() {
        $user_role = Session::get('role');
        if($user_role=="ADMIN") {
        	return $this->daftarPengaduan("default");
		} else	if($user_role=="SKPD") {
			return $this->daftarPengaduan("default");
		} else {
			return view("pages.index");
		}
	}

	public function daftarPengaduan($sortBy) {
		$id_user = Session::get('id_user');
        $user_role = Session::get('role');

        
        if($user_role=="ADMIN") {
			$listPengaduan = Pengaduan::getListPengaduan($sortBy, null);
        	$listKategori = Kategori::getListKategori();
			return view('pages.admin.daftar_pengaduan', compact('listPengaduan', 'listKategori'));
		}
		else if($user_role=="SKPD") {
			$id_kategori = DB::table('ppl_citizenreport_penanggungjawab')->where('id_skpd', Session::get('id_user'))->first()->id_kategori;
			$listPengaduan = Pengaduan::getListPengaduan('default', $id_kategori);
			return view('pages.skpd.daftar_pengaduan', compact('listPengaduan'));
		}
		else {
			$listPengaduan = Pengaduan::getListPengaduan($sortBy, null);
			return view('pages.daftar_pengaduan', compact('listPengaduan'));
		}
	}

	public function daftarPengaduanByKategori($id_kategori) {
    	$listPengaduan = Pengaduan::getListPengaduan('default', $id_kategori);
        
    	$listKategori = Kategori::getListKategori();
		return view('pages.admin.daftar_pengaduan', compact('listPengaduan', 'listKategori'));
		
	}

	public function statistik() {
        $kategori = new StatistikAduan();
        $kategori = Pengaduan::getStatistikJumlah();

        $jumAduan = new StatistikAduan();
        $jumAduan = Pengaduan::getJumlahAduanForNMonths(5);

        $jumAduanClosed = new StatistikAduan();
        $jumAduanClosed = Pengaduan::getJumlahAduanClosedForNMonths(5);

        $listKategori = Kategori::getListKategori();

		return view('pages.statistik', compact('kategori', 'jumAduan', 'jumAduanClosed', 'listKategori'));
	}

    public function statistikByKategori($id_kategori){
        $kategori = new StatistikAduan();
        $kategori = Pengaduan::getStatistikJumlah();

        $jumAduan = new StatistikAduan();
        $jumAduan = Pengaduan::getJumlahAduanForNMonthsByCategory(5, $id_kategori);

        $jumAduanClosed = new StatistikAduan();
        $jumAduanClosed = Pengaduan::getJumlahAduanClosedForNMonthsByCategory(5, $id_kategori);

        $listKategori = Kategori::getListKategori();

        return view('pages.statistik', compact('kategori', 'jumAduan', 'jumAduanClosed', 'listKategori'));

        //return $id_kategori."";
    }

	public function buatPengaduan() {
		$listKategori = Kategori::getListKategori();
		
		return view('pages.buat_pengaduan', compact('listKategori'));
	}

	public function pengaduanku($sortBy) {
		$listPengaduan = Pengaduan::getListPengaduanByUser($sortBy, Session::get('id_user'));
		return view('pages.pengaduanku', compact('listPengaduan'));
	}

	public function statusPengaduan() {
		return view('pages.status_pengaduan');
	}

	public function manajemenSKPD() {
		$listSKPD = SKPDModel::all();
		$listKategori = KategoriModel::all();
		return view('pages.admin.manajemen_skpd', compact('listSKPD', 'listKategori'));
	}

	public function manajemenKategori() {
		$listKategori = KategoriModel::all();
		return view('pages.admin.manajemen_kategori', compact('listKategori'));
	}
	
	public function editSKPD($id_skpd) {
		$skpd = SKPDModel::where('id_user', $id_skpd)->first();
		$listKategori = KategoriModel::all();
		return view('pages.admin.edit_skpd', compact('skpd', 'listKategori'));	
	}

	public function login() {
		return view('login');
	}
}
