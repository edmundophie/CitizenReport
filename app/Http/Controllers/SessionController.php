<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\UserModel;
use App\Pengaduan;
use Session;


class SessionController extends Controller {

	public function login(Request $request) {
		$username = $request->get('username');
		$password = $request->get('password');
		$user = UserModel::where('username', $username)->where('password', $password)->first();

		//dd($user)
		//$daftar_pengaduan = "";
		if ($user->role == "MASYARAKAT") {
			$daftar_pengaduan = Pengaduan::where('id_masyarakat',$user->id)->where('id_status',6)->get(); // status rejected
		} else if ($user->role == "SKPD") {
			$daftar_pengaduan = Pengaduan::where('id_masyarakat',$user->id)->where('id_status',2)->get(); // status forwarded
		} else {
			$daftar_pengaduan = "";
		}
		

		if(count($user)<1)
			return redirect('login');
		else {
			Session::put('id_user', $user->id);
			Session::put('username', $user->username);
			Session::put('role', $user->role);
			
			if ($user->role != "ADMIN") {
				$notifikasi = "Maaf, pengaduan Anda dengan rincian berikut<BR>";
				foreach ($daftar_pengaduan as $pengaduan) {
					$notifikasi .= "Judul : ".$pengaduan->judul.".Dikirim pada : ".$pengaduan->created_at."<BR>";
				}
				$notifikasi .= "dengan berbagai pertimbangan tidak kami tindak lanjuti";
				Session::flash('notification',$notifikasi);
			}
			
			return redirect('index');
		}
	}

	public function logout() {
		Session::flush();

		return redirect('login');
	}

}
