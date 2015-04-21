<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\KategoriModel;

class KategoriController extends Controller {

	public function insert(Request $request) {
		$kategori = new KategoriModel;
		$kategori->nama = $request->get('nama');
		$kategori->deskripsi = $request->get('deskripsi');
		$kategori->save();

		return redirect('manajemen-kategori')->with('message', 'Kategori telah berhasil dibuat.');
	}

	public function delete($id_kategori) {
		KategoriModel::destroy($id_kategori);
		return redirect('manajemen-kategori')->with('message', 'Kategori telah berhasil dihapus.');
	}
}
