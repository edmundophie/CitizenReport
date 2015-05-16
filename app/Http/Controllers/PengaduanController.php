<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Pengaduan;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
use Input;
use App\Kategori;
use App\KategoriModel;
use App\Status;
use App\StatusModel;
use App\PengaduanModel;
use App\KomentarModel;
use App\Verifier;
use Illuminate\Support\Str;

class PengaduanController extends Controller {

	public function show($slug) {
        $user_role = Session::get('role');

        $pengaduan = new Pengaduan();
        $pengaduan->setAduan($slug);

        $listStatus = Status::getListStatus();
        $listKomentar = KomentarModel::where('id_pengaduan', $pengaduan->getDataAduan()['id'])->get();

		if($user_role=="SKPD") {
			return view('pages.skpd.pengaduan', compact('pengaduan', 'listStatus', 'listKomentar'));
		} else if ($user_role=="ADMIN") {
			return view('pages.admin.pengaduan', compact('pengaduan'));
		} else { // if logged in as MASYARAKAT
                return view('pages.pengaduan', compact('pengaduan', 'listKomentar'));
		}
	}

    public function updateStatus(Request $request){
        $idStatus = $request->get('status');
        $komentarStatus = $request->get('komentar_status');
        $slug = $request->get('slug');
        Pengaduan::updateStatus($slug, $idStatus, $komentarStatus);

        return redirect('pengaduan/'.$slug);
    }

    public function addFeedback(Request $request){
        $feedback = $request->get('feedback');
        $komentar_feedback = $request->get('feedback_comment');
        $slug = $request->get('slug');
        Pengaduan::addFeedback($slug, $feedback, $komentar_feedback);

        return redirect('pengaduan/'.$slug);
    }

    public function uploadReport(Request $request){
        $id_kategori = $request->get('kategori');
        $slug = $request->get('slug');

        // laporan
        date_default_timezone_set("UTC");
        $laporan = Input::file('laporan');
        $ext = $laporan->getClientOriginalExtension();
        $laporan_filename = $id_kategori."-".(Date("YmdHis", time())).".". $ext;
        $laporan->move(public_path().'/pengaduan-laporan', $laporan_filename);

        Pengaduan::addLaporan($slug, $laporan_filename);

        return redirect('pengaduan/'.$slug);
    }

	public function insert(Request $request) {
		$id_user = Session::get('id_user');

		// Form handling
		$judul = $request->get('judul');
		$deskripsi = $request->get('deskripsi');
		$status = StatusModel::where('nama', 'pending')->first();
		$id_kategori = $request->get('id_kategori');

		// lampiran
		date_default_timezone_set("UTC");
		$lampiran = Input::file('lampiran');
		if($lampiran!=null) {
			$ext = $lampiran->getClientOriginalExtension();
			$lampiran_filename = $id_user."-".(Date("YmdHis", time())).".". $ext;
			$lampiran->move(public_path().'/pengaduan-lampiran', $lampiran_filename);	
		} else {
			$lampiran_filename = "NULL";
		}

		// gambar
		$gambar = Input::file('gambar');
		if($gambar!=null) {
			$ext = $gambar->getClientOriginalExtension();
			$gambar_filename = $id_user."-".(Date("YmdHis", time())).".".$ext;
			$gambar->move(public_path().'/pengaduan-gambar', $gambar_filename);
		} else {
			$gambar_filename = "NULL";
		}

		// Save to database
		$pengaduan = new Pengaduan();
		$pengaduan->setJudul($judul);
		$pengaduan->setIdKategori($id_kategori);
		$pengaduan->setLampiran($lampiran_filename);
		$pengaduan->setGambar($gambar_filename);
		$pengaduan->setDeskripsi($deskripsi);
		$pengaduan->setIdMasyarakat($id_user);
		$pengaduan->setIdStatus($status->id);
		$pengaduan->setSlug($this->generateSlug($judul, new PengaduanModel()));
		$pengaduan->savePengaduan();
		return redirect('buat-pengaduan')->with('message', "PENGADUAN INSERTED");
	}

	public function forward($slug) {
		$pengaduan = PengaduanModel::where('slug', $slug)->first();
		$pengaduan->id_status = 2;
		$pengaduan->save();

		return redirect('daftar-pengaduan/default')->with('message', 'FORWARDED');
	}

	public function reject($slug) {
		$pengaduan = PengaduanModel::where('slug', $slug)->first();
		$pengaduan->id_status = 6;
		$pengaduan->save();

		return redirect('daftar-pengaduan/default')->with('message', 'REJECTED');
	}

	public function delete($slug) {
		$pengaduan = PengaduanModel::where('slug', $slug);
		$pengaduan->delete();

		return redirect('daftar-pengaduan/default')->with('message', 'DELETED');
	}

	public function generateSlug($title, $model)
	{
	    $slug = Str::slug($title);
	    $slugCount = count( $model->whereRaw("slug REGEXP '^{$slug}(-[0-9]*)?$'")->get() );
	 
	    return ($slugCount > 0) ? "{$slug}-{$slugCount}" : $slug;
	}
	public function kirim($slug){
		$idStatus = StatusModel::where('nama', 'forwarded')->first()['id'];
		Pengaduan::updateStatus($slug, $idStatus, NULL);

        return redirect('pengaduan/'.$slug)->with('message', 'PENGADUAN TERKIRIM');		
	}
	public function verifikasi(Request $request){
		$slug = $request->get('slug');
		$alamat = $request->get('alamat');
		$listIMB = Verifier::getlistIMB($alamat);

		return redirect('pengaduan/'.$slug)->with('message', 'HASIL VERIFIKASI')->with('listIMB',$listIMB);
	}
}
