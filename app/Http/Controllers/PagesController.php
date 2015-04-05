<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PagesController extends Controller {

	public function index() {
		return view("pages.index");
	}

	public function daftarPengaduan() {
		return view('pages.daftar_pengaduan');
	}

	public function statistik() {
		return view('pages.statistik');
	}

	public function buatPengaduan() {
		return view('pages.buat_pengaduan');
	}

	public function statusPengaduan(){
        return view('pages.status_pengaduan');
    }

	public function detailPengaduan($id) {
		if($id==1)
			return view('pages.detail_pengaduan');
		else
			return view('pages.detail_pengaduan2');
	}
}
