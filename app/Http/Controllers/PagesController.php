<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

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
<<<<<<< HEAD
		return view('pages.buat_pengaduan');
	}

	public function statusPengaduan() {
		return view('pages.status_pengaduan');
	}
	
=======
        return view('pages.buat_pengaduan');
    }

>>>>>>> fdab9e8b4a6e79bc64eb9541a4857b521ddefdd2
	public function detailPengaduan($id) {
		if($id==1)
			return view('pages.detail_pengaduan');
		else
			return view('pages.detail_pengaduan2');
	}

    public function detailPengaduanSkpd() {
        return view('pages.detail_pengaduan_skpd');
    }

    public function db(){
        DB::insert('insert into skpd (nama, alamat, telepon) values ("chobits", "Bandung", "081828828228")');

        return 'nanana';
    }
}
