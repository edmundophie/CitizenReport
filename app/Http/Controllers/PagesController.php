<?php namespace App\Http\Controllers;

use App\ArrayPengaduan;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Session;

use Illuminate\Http\Request;
use App\Kategori;
use App\Pengaduan;

class PagesController extends Controller {

	public function index() {
		return view("pages.index");
	}

	public function daftarPengaduan($sortBy) {
		// Session stub
		// Session::put('role', 'ADMIN');
		// Session::put('role', 'SKPD');
		Session::put('role', 'MASYARAKAT');
        Session::put('id_user', '2');
		$user_role = Session::get('role');
        $id_user = Session::get('id_user');

    	$listPengaduan = Pengaduan::getListPengaduan($sortBy, null);
        
        if($user_role=="ADMIN") {
        	$listKategori = Kategori::getListKategori();
			return view('pages.admin.daftar_pengaduan', compact('listPengaduan', 'listKategori'));
		}
		else if($user_role=="SKPD") {
			return view('pages.skpd.daftar_pengaduan', compact('listPengaduan'));
		}
		else {
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

	public function login() {
		return view('login');
	}
}
