<?php namespace App\Http\Controllers;

use App\ArrayPengaduan;
use App\Http\Requests;
use App\Http\Controllers\Controller;
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
			$id_kategori = DB::table('penanggungjawab')->where('id_skpd', Session::get('id_user'))->first()->id_kategori;
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
		return view('pages.statistik');
	}

	public function buatPengaduan() {
		$listKategori = Kategori::getListKategori();
		
		return view('pages.buat_pengaduan', compact('listKategori'));
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
