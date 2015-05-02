<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\UserModel;
use App\SKPDModel;
use DB;

class SKPDController extends Controller {

	public function insert(Request $request) {
		$user = new UserModel;
		$user->username = $request->get('username');
		$user->password = $request->get('password');
		// Data asal skpd di tabel dukcapil
		$user->nik = strval(rand(1000000000, 2000000000));
		$user->email = $request->get('username')."@yahoo.com";
		$user->kota_lahir = "Bandung";
		$user->tanggal_lahir = "1994-04-10";
		$user->jenis_kelamin = "laki-laki";
		$user->gol_darah = "O";
		$user->alamat = $request->get('alamat');
		$user->rt = "11";
		$user->rw = "03";
		$user->kel_desa = "Coblong";
		$user->kec = "Cibereum";
		$user->kota_kab = "Bandung Selatan";
		$user->kode_pos = "40121";
		$user->agama = "Islam";
		$user->status = "Belum menikah";
		$user->role = "SKPD";;
		$user->save();

		DB::table('ppl_citizenreport_penanggungjawab')
			->insert(
				array(
					'id_kategori' => $request->get('id_kategori'),
					'id_skpd' => $user->id
				)
			);

		return redirect('manajemen-skpd')->with('message', 'Akun SKPD telah dibuat.');
	}

	public function delete($id_skpd) {
		UserModel::destroy($id_skpd);
		return redirect('manajemen-skpd')->with('message', 'Akun SKPD telah dihapus.');
	}

	public function update(Request $request) {
		$user = UserModel::find($request->get('id_skpd'));
		$user->username = $request->get('username');
		$user->password = $request->get('password');
		$user->save();

		$skpd = SKPDModel::where('id_user', $request->get('id_skpd'))->first();

		$skpd->nama = $request->get('nama');
		$skpd->alamat = $request->get('alamat');
		$skpd->save();

		DB::table('ppl_citizenreport_penanggungjawab')
            ->where('id_skpd', $request->get('id_skpd'))
            ->update(array('id_kategori' => $request->get('id_kategori')));
            
		return redirect('manajemen-skpd')->with('message', 'Akun SKPD telah diupdate.');
	}
}
