<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Kategori;

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
		$listKategori = Kategori::getListKategori();
		
		return view('pages.buat_pengaduan', compact('listKategori'));
	}

	public function statusPengaduan() {
		return view('pages.status_pengaduan');
	}
}
