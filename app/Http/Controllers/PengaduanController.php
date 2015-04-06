<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Pengaduan;

use Illuminate\Http\Request;

use Symfony\Component\HttpFoundation\Session\Session;
use Input;
use App\Pengaduan;
use App\Kategori;
use App\Status;
use Str;

class PengaduanController extends Controller {

	public function show($pengaduan) {
		// Session stub
		Session::put('role', 'MASYARAKAT');
		$user_role = Session::get('role');

		if($user_role=="SKPD") {
			return view('skpd.pengaduan', compact('pengaduan'));
		} else if ($user_role=="ADMIN") {
			return view('admin.pengaduan', compact('pengaduan'));
		} else { // if logged in as MASYARAKAT
			return view('pages.pengaduan', compact('pengaduan'));
		}
	}

	public function insert(Request $request) {
		// Session stub
		Session::put('id_user', '1');
		$id_user = Session::get('id_user');

		// Form handling
		$judul = $request->get('judul');
		$deskripsi = $request->get('deskripsi');
		$kategori = Kategori::where('nama', $request->get('kategori'))->first();
		$status = Status::where('nama', 'pending')->first();
		
		// lampiran
		date_default_timezone_set("UTC");
		$lampiran = Input::file('lampiran');
		$ext = $lampiran->getClientOriginalExtension();
		$lampiran_filename = $id_user."-".(Date("YmdHis", time())).".". $ext;
		$lampiran->move(public_path().'/pengaduan-lampiran', $lampiran_filename);	
		
		// gambar
		$gambar = Input::file('gambar');+
		$ext = $gambar->getClientOriginalExtension();
		$gambar_filename = $id_user."-".(Date("YmdHis", time())).".".$ext;
		$gambar->move(public_path().'/pengaduan-gambar', $gambar_filename);

		// Save to database
		$pengaduan = new Pengaduan;
		$pengaduan->judul = $judul;
		$pengaduan->id_kategori = $kategori->id;
		$pengaduan->lampiran = $lampiran_filename;
		$pengaduan->gambar = $gambar_filename;
		$pengaduan->deskripsi = $deskripsi;
		$pengaduan->id_masyarakat = $id_user;
		$pengaduan->id_status = $status->id;
		$pengaduan->slug = $this->generateSlug($judul, $pengaduan);
		
		$pengaduan->save();

		return view('pages.buat_pengaduan');
	}

	public function generateSlug($title, $model)
	{
	    $slug = Str::slug($title);
	    $slugCount = count( $model->whereRaw("slug REGEXP '^{$slug}(-[0-9]*)?$'")->get() );
	 
	    return ($slugCount > 0) ? "{$slug}-{$slugCount}" : $slug;
	}
}
