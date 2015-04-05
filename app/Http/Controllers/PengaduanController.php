<?php namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use App\Pengaduan;

use Illuminate\Http\Request;

class PengaduanController extends Controller {

	public function show($pengaduan) {
		// Session stub
		Session::put('role', 'MASYARAKAT');
		$user_role = Session::get('role');

        $aduan = new Pengaduan($pengaduan);

        if($user_role=="SKPD") {
			return view('skpd.pengaduan', compact('aduan'));
		} else if ($user_role=="ADMIN") {
			return view('admin.pengaduan', compact('aduan'));
		}
		else { // if logged in as MASYARAKAT
			return view('pages.pengaduan', compact('aduan'));
		}
	}

}
