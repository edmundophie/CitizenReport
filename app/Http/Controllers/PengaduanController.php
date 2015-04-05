<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\pengaduan;

class PengaduanController extends Controller {

	public function show($pengaduan) {
		return view('pages.pengaduan', compact('pengaduan'));
	}

}
