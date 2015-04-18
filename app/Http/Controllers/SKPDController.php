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
		$user->save();

		$skpd = new SKPDModel;
		$skpd->id_user = $user->id;
		$skpd->nama = $request->get('nama');
		$skpd->alamat = $request->get('alamat');
		$skpd->telp = $request->get('telepon');
		$skpd->save();

		DB::table('penanggungjawab')
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
		$skpd->telp = $request->get('telepon');
		$skpd->save();

		DB::table('penanggungjawab')
            ->where('id_skpd', $request->get('id_skpd'))
            ->update(array('id_kategori' => $request->get('id_kategori')));
            
		return redirect('manajemen-skpd')->with('message', 'Akun SKPD telah diupdate.');
	}
}
