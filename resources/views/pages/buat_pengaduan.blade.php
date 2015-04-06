@extends('pages.master')
@section('title')
	Buat Pengaduan - Citizen Report
@stop
@section('css')
	<link rel="stylesheet" href="css/buatpengaduan.css">
@stop
@section('breadcrumb')
	<ol class="breadcrumb">
	  <li><a href="index">Home</a></li>
	  <li class="">Buat Pengaduan</li>
	</ol>
@stop
@section('buat_pengaduan_active')
	class="active"
@stop

@section('body')
	<div class="body-container">
	<div class="col-sm-6 keterangan">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h2 class="panel-title">Keterangan</h2>
			</div>
			<div class="panel-body">		
				<strong>Formulir pengaduan:</strong><br>
				<p>1. Anda dapat mengunggah file lampiran sebagai bukti dan pelengkap pengaduan anda dalam bentuk dokumen, gambar, ataupun video.</p>
				<hr>
				<table class="table">
					<thead>
						<tr>
							<th>Kategori</th>
							<th>Lingkup masalah</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Kriminal dan keamanan</td>
							<td>tindak kejahatan dan gangguan keamanan (e.g. begal, preman)</td>
						</tr>
						<tr>
							<td>Pelayanan publik</td>
							<td>pelayanan masyarakat dan birokrasi instansi</td>
						</tr>
						<tr>
							<td>Infrastruktur kota</td>
							<td>sarana dan prasarana (e.g. jalan, lampu, sungai)</td>
						</tr>
						<tr>
							<td>Kebersihan</td>
							<td>kebersihan dan taman (e.g. sampah, taman rusak)</td>
						</tr>
						<tr>
							<td>Korupsi/pungli</td>
							<td>penyalahgunaan wewenang dan KKN</td>
						</tr>
						<tr>
							<td>Tata ruang dan wilayah</td>
							<td>bangunan, tanah, dan tata kota (e.g. bangunan liar, reklame)</td>
						</tr>
						<tr>
							<td>Sosial</td>
							<td>e.g. gelandangan, pengemis</td>
						</tr>
						<tr>
							<td>Lalu lintas</td>
							<td>e.g. kecelakaan, macet</td>
						</tr>
						<tr>
							<td>Umum</td>
							<td>hal-hal yang tidak termasuk kategori diatas</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="col-sm-6 pengaduan-form">
		<h2 class="title">Buat Pengaduan</h2>
		<hr>
		{!! Form::open(array('url' => 'pengaduan/insert', 'method' => 'post', 'class' => 'form-horizontal', 'files' => 'true')) !!}
			<div class="form-group">
				<label for="inputJudul" class="col-sm-2 control-label">Judul</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="judul" id="inputJudul" placeholder="Judul">
				</div>
			</div>
			<div class="form-group">
				<label for="inputKategori" class="col-sm-2 control-label">Kategori</label>
				<div class="col-sm-10">
					<select class="form-control" name="kategori" id="inputKategori">
						<option value="kriminal dan keamanan">Kriminal dan Keamanan</option>
						<option value="pelayanan publik">Pelayanan Publik</option>
						<option value="infrastruktur">Infrastruktur Kota</option>
						<option value="kebersihan">Kebersihan</option>
						<option value="kriminal">Korupsi/Pungli</option>
						<option value="tata ruang dan wilayah">Tata Ruang dan Wilayah</option>
						<option value="sosial">Sosial</option>
						<option value="lalulintas">Lalu Lintas</option>
						<option value="umum">Umum</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="inputGambar" class="col-sm-2 control-label">Gambar</label>
				<div class="col-sm-10">
					<input type="file" class="form-control" name="gambar" id="inputGambar">
				</div>
			</div>
			<div class="form-group">
				<label for="inputLampiran" class="col-sm-2 control-label">Lampiran</label>
				<div class="col-sm-10">
					<input type="file" class="form-control" name="lampiran" id="inputLampiran">
				</div>
			</div>
			<div class="form-group">
				<label for="inputDeskripsi" class="col-sm-2 control-label">Deskripsi</label>
				<div class="col-sm-10">
					<textarea class="form-control" name="deskripsi" id="inputDeskripsi" cols="30" rows="10"></textarea>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-default">Laporkan</button>
				</div>
			</div>
		{!! Form::close() !!}
	</div>
	</div>
@stop