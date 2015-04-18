<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\KomentarModel;
use Session;

class KomentarController extends Controller {

	public function insert(Request $request) {
		$komentar = new KomentarModel;
		$komentar->id_pengaduan = $request->get('id_pengaduan');
		$komentar->id_komentator = Session::get('id_user');;
		$komentar->komentar = $request->get('komentar');
		$komentar->save();

		return redirect('pengaduan/'.$request->get('slug'));
	}

}
