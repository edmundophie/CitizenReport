<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\UserModel;
use App\Pengaduan;
use App\PenanggungJawab;
use Session;


class SessionController extends Controller {

	public function login(Request $request) {
		$nik = $request->get('nik');
		$password = $request->get('password');
		$user = UserModel::where('nik', $nik)->where('password', $password)->first();
		$user_role = strtoupper($user->role);

		if ($user_role == "MASYARAKAT") {
			$daftar_pengaduan = Pengaduan::where('id_masyarakat',$user->id)->where('id_status',6)->get(); // status rejected
		} else if ($user_role == "SKPD") {
			$SKPD = PenanggungJawab::where('id_skpd',$user->id)->first();
			$daftar_pengaduan = Pengaduan::where('id_kategori',$SKPD->id_kategori)->where('id_status',2)->get(); // status forwarded
		} else {
			$daftar_pengaduan = "";
		}

		if(count($user)<1)
			return redirect('login');
		else {
			Session::put('id_user', $user->id);
			Session::put('username', $user->username);
			Session::put('role', $user_role);
			
			if (($user_role != "ADMIN") && ($daftar_pengaduan != "[]")) {
				Session::flash('notification',$daftar_pengaduan);
			}
			return redirect('index?id=-99');
		}
	}

	public function logout() {
		Session::flush();
		return redirect('index');
	}

}
