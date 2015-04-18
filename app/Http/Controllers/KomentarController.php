<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\KomentarModel;
use Session;

class KomentarController extends Controller {

	public function insert(Request $request) {
		// Session stub
		Session::put('role', 'MASYARAKAT');
		Session::put('id_user', '2');
		$id_user = Session::get('id_user');
		$role = Session::get('role');

		$komentar = new KomentarModel;
		$komentar->id_pengaduan = $request->get('id_pengaduan');
		$komentar->id_komentator = $id_user;
		$komentar->komentar = $request->get('komentar');
		$komentar->save();

		return redirect('pengaduan/'.$request->get('slug'));
	}

}
