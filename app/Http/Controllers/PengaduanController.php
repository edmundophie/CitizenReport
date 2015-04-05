<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\pengaduan;

class PengaduanController extends Controller {

	public function show($pengaduan) {
		// Session stub
		Session::put('role', 'MASYARAKAT');
		$user_role = Session::get('role');
		
		if($user_role=="SKPD") {
			return view('skpd.pengaduan', compact('pengaduan'));
		} else if ($user_role=="ADMIN") {
			return view('admin.pengaduan', compact('pengaduan'));
		}
		else { // if logged in as MASYARAKAT
			return view('pages.pengaduan', compact('pengaduan'));
		}
	}

}
