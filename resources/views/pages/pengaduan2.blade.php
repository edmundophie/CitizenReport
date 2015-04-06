@extends('pages.master')
@section('title')
	{{ $pengaduan->getDataAduan()['judul'] }} - Citizen Report
@stop
@section('css')
	<link rel="stylesheet" href="{{ URL::asset('css/detailpengaduan.css') }}">
@stop
@section('breadcrumb')
	<ol class="breadcrumb">
	  <li><a href="{{ URL::asset('index') }}">Home</a></li>
	  <li><a href="{{ URL::asset('daftar-pengaduan') }}">Daftar Pengaduan</a></li>
	  <li class="">{{ $pengaduan->getDataAduan()['judul'] }}</li>
	</ol>
@stop

@section('body')
	<div class="body-container">
		<div class="row list-pengaduan">
			<div class="row">
				<div class="col-sm-9">
					<h2>{{ $pengaduan->getDataAduan()['judul'] }}</h2>
				</div>
				<div class="col-sm-3 hidden-xs hidden-sm tanggal-pengaduan">{{ $pengaduan->getDate() }}</div>
			</div>
			<div class="row">
				<div class="col-xs-6">
					Pelapor : <a href="#">Ridwan Kamil</a>
				</div>
				<div class="col-xs-6 visible-xs visible-sm tanggal-pengaduan">{{ $pengaduan->getDate() }}</div>
				<div class="col-xs-6 kategori"><span class="hidden-xs hidden-sm label label-primary">{{ $pengaduan->getNamaKategori() }}</span></div>
			</div>
			<div class="row hidden-xs hidden-sm">
				<div class="col-sm-12"><a href="#"><span class="glyphicon glyphicon-paperclip"></span></a> Lampiran tersedia</div>
			</div>
			<div class="row hidden-md hidden-lg">
				<div class="col-xs-6"><a href="#"><span class="glyphicon glyphicon-paperclip"></span></a> Lampiran tersedia</div>
				<div class="col-xs-6 kategori"><span class="label label-primary">{{ $pengaduan->getNamaKategori() }}</span></div>
			</div>
			<br>
			<div class="col-xs-12 col-sm-6 col-md-3 gambar-pengaduan"><img src="{{ URL::asset('pengaduan-gambar/'.$pengaduan->getDataAduan()['gambar']) }}" class="img-responsive img-thumbnail" alt="Gambar pengaduan"></div>
			{!! $pengaduan->getDataAduan()['deskripsi'] !!}
			<hr>
			<div class="progress">
				<div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="{{ $pengaduan->getProgress() }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $pengaduan->getProgress() }}%">
					<span>{{ $pengaduan->getNamaStatus() }}</span>
				</div>
			</div>
			<div class="konfirmasi-section">
				<button class="btn btn-primary col-xs-12 col-sm-3 col-md-2">Ucapkan Terima Kasih</button>
				<div class="col-xs-12 col-sm-9 col-md-4 keluhan">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Keluhan...">
						<span class="input-group-btn">
							<button class="btn btn-warning" type="button">Complaint</button>
						</span>
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
		
		<div class="row keterangan-status">
			<h3>Komentar</h3>
			<div class="beri-komentar">
				<div class="form-group">
					<textarea class="form-control" name="komentar" id="inputKomentar" rows="3"></textarea>
				</div>
				<div class="form-group">
					<button class="btn btn-default col-xs-12 col-sm-3">Beri komentar</button>
				</div>
			</div>
			<div class="clearfix"></div>
			<hr>
			<div class="komentar">
				<img src="{{ URL::asset('images/avatar-dinaspu.png') }}" class="col-xs-1 img-circle" alt="dinas-pu">
				<p class="col-xs-10 bg-warning">Monyet sedang dikejar ke kampus oleh petugas kami</p>
			</div>
			<div class="clearfix"></div>
			<div class= "komentar">
				<p class="col-xs-offset-1 col-xs-10 bg-info">Oke baik pak. Terima kasih atas konfirmasinya.</p>
				<img src="{{ URL::asset('images/avatar-emil.png') }}" class="col-xs-1 img-circle" alt="ridwan-kamil">
			</div>
			<div class="clearfix"></div>
			<div class="komentar">
				<img src="{{ URL::asset('images/avatar-dinaspu.png') }}" class="col-xs-1 img-circle" alt="dinas-pu">
				<p class="col-xs-10 bg-success">Monyet sudah tertangkap pagi ini</p>
			</div>
		</div>
	</div>
@stop